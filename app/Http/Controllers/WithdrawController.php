<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClaimPromotion;
use App\Models\MemberBalance;
use App\Models\MemberBank;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class WithdrawController extends Controller
{
    public function index()
    {
        $memberbanks = MemberBank::where('user_id', Auth::user()->id)
            ->get();
        return view('frontend.withdraw.index', compact('memberbanks'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $pendingTransaction = Transaction::where('user_id', Auth::user()->id)
                ->where('type', 'withdraw')
                ->where('status', 'pending')
                ->first();
    
            if ($pendingTransaction) {
                session()->flash('error', 'Anda memiliki transaksi penarikan yang masih pending. Harap tunggu hingga transaksi tersebut diproses.');
                return redirect()->back();
            }

            $claimPromotion = ClaimPromotion::where('user_id', Auth::user()->id)
                ->where('status', 0)
                ->first();

            if($claimPromotion) {
                session()->flash('error', 'Promosi anda masih berjalan, mohon selesaikan promosi terlebih dahulu');
                return redirect()->back();
            }
    
            $postData = [
                'method' => 'user_withdraw',
                'agent_code' => env('NEXUS_AGENT_CODE'),
                'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                'user_code' => Auth::user()->memberExt->ext_name,
                'amount' => (int) $request->amount
            ];
    
            $response = Http::post(env('NEXUS_URL'), $postData);
    
            $responseData = $response->json();
    
            if ($responseData['status'] == 1 && $responseData['msg'] == 'SUCCESS') {
                $bankMember = MemberBank::where('user_id', Auth::user()->id)->first();
                $memberBalance = MemberBalance::where('user_id', Auth::user()->id)->first();
    
                $store = new Transaction();
                $store->user_id = Auth::user()->id;
                $store->promotion_id = 0;
                $store->admin_bank_id = 0;
                $store->user_bank_id = $bankMember->id;
                $store->amount = $request->amount;
                $store->type = "withdraw";
                $store->status = "pending";
                $store->created_ip_address = $request->ip();
                $store->save();

                $memberBalance->main_balance -= $request->amount;
                $memberBalance->save();
    
                DB::commit();
                session()->flash('success', 'Withdraw berhasil dilakukan, silahkan tunggu admin untuk memproses.');
    
                return redirect()->back();
            } else {
                DB::rollBack();
                if ($responseData['status'] == 0 && $responseData['msg'] == 'Insufficient user funds.') {
                    session()->flash('error', 'Saldo anda tidak cukup untuk melakukan penarikan.');
                } else {
                    session()->flash('error', 'Terjadi kesalahan saat memproses permintaan penarikan, harap coba lagi atau hubungi customer service.');
                }
    
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan, silahkan hubungi customer service.');
            return redirect()->back();
        }
    }
    




}
