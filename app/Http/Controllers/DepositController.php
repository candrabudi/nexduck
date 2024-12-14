<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\ClaimPromotion;
use App\Models\MemberBank;
use App\Models\Promotion;
use App\Models\PromotionDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    public function index()
    {
        $banks = Bank::where('bank_type', 'bank')
            ->select('banks.*')
            ->join('bank_accounts as ba', 'ba.bank_id', '=', 'banks.id')
            ->with('bankAccount')
            ->get();

        $ewallets = Bank::where('bank_type', 'ewallet')
            ->select('banks.*')
            ->join('bank_accounts as ba', 'ba.bank_id', '=', 'banks.id')
            ->with('bankAccount')
            ->get();
        
        $qris = Bank::where('bank_type', 'qris')
            ->select('banks.*')
            ->join('bank_accounts as ba', 'ba.bank_id', '=', 'banks.id')
            ->with('bankAccount')
            ->get();

        $user = auth()->user();

        $claimPromotion = ClaimPromotion::where('user_id', Auth::user()->id)
            ->where('status', 0)
            ->first();

        $promotions = array();
        if (!$claimPromotion) {
            $promotions = Promotion::with('promotionDetail')
                ->where('status', 'active')
                ->whereDoesntHave('claimPromotions', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->get();
        }

        return view('frontend.deposit.index', compact('banks', 'ewallets', 'promotions', 'qris'));
    }



    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $pendingTransaction = Transaction::where('user_id', Auth::user()->id)
                ->where('type', 'deposit')
                ->where('status', 'pending')
                ->first();

            if ($pendingTransaction) {
                session()->flash('error', 'Kamu masih memiliki transaksi deposit pending!');
                return redirect()->back();
            }

            if(!$request->admin_bank_id && !$request->admin_ewallet_id && !$request->admin_qris_id) {
                session()->flash('error', 'Pilih salah satu metode pembayaran!');
                return redirect()->back();
            }
    
            if(!$request->amount) {
                session()->flash('error', 'Tolong masukan nominal deposit anda!');
                return redirect()->back();
            }


            $bankMember = MemberBank::where('user_id', Auth::user()->id)->first();

            if(!$bankMember) {
                session()->flash('error', 'Maaf, kamu tidak memiliki akun Bank / Ewallet!');
                return redirect()->back();
            }

            $storeTransaction = new Transaction();
            $storeTransaction->user_id = Auth::user()->id;
            $storeTransaction->promotion_id = 0;
            if($request->admin_bank_id) {
                $storeTransaction->admin_bank_id = $request->admin_bank_id;
            }else if($request->admin_ewallet_id) {
                $storeTransaction->admin_bank_id = $request->admin_ewallet_id;
            }else if($request->admin_qris_id) {
                $storeTransaction->admin_bank_id = $request->admin_qris_id;
            }
            $storeTransaction->user_bank_id = $bankMember->id;
            $storeTransaction->amount = $request->amount;
            $storeTransaction->type = "deposit";
            $storeTransaction->status = "pending";
            $storeTransaction->created_ip_address = $request->ip();
            $storeTransaction->save();
            $storeTransaction->fresh();

            if ($request->promotion_id != 0 && !empty($request->promotion_id)) {
                $promotion = PromotionDetail::where('promotion_id', $request->promotion_id)
                    ->first();

                if(!$promotion) {
                    session()->flash('error', 'Silahkan cek apakah promosi masih aktif atau tidak!');
                    return redirect()->back();
                }
                $bonus = ($request->amount * $promotion->percentage_bonus) / 100;
                $store = new Transaction();
                $store->user_id = Auth::user()->id;
                $store->transaction_id = $storeTransaction->id;
                $store->promotion_id = $request->promotion_id;
                $store->admin_bank_id = 0;
                $store->user_bank_id = $bankMember->id;
                $store->amount = $bonus;
                $store->type = "bonus";
                $store->status = "pending";
                $store->created_ip_address = $request->ip();
                $store->save();
            }

            DB::commit();
            session()->flash('good', 'Berhasil melakukan deposit, silahkan cek secara berkala!');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Hubungi ke CS untuk kendala deposit!');
            return redirect()->back();
        }
    }
}
