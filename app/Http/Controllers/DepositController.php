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
            ->with('bankAccount')
            ->get();
    
        $ewallets = Bank::where('bank_type', 'ewallet')
            ->with('bankAccount')
            ->get();
        
        // Fetch promotions
        $promotions = Promotion::with('promotionDetail')->get();  // Assuming the model is named 'Promotion'
        return view('frontend.deposit.index', compact('banks', 'ewallets', 'promotions'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $bankMember = MemberBank::where('user_id', Auth::user()->id)
                ->first();

            $store = new Transaction();
            $store->user_id = Auth::user()->id;
            $store->promotion_id = 0;
            $store->admin_bank_id = $request->admin_bank_id;
            $store->user_bank_id = $bankMember->id;
            $store->amount = $request->amount;
            $store->type = "deposit";
            $store->status = "pending";
            $store->created_ip_address = $request->ip();
            $store->save();

            if($request->promotion_id != 0 || !empty($request->promotion_id)) {
                $promotion = PromotionDetail::where('promotion_id', $request->promotion_id)
                    ->first();

                $amount = $request->amount;
                $bonus = ($request->amount * $promotion->percentage_bonus) / 100;

                $claimPromotion = new ClaimPromotion();
                $claimPromotion->user_id = Auth::user()->id;
                $claimPromotion->promotion_id = $request->promotion_id;
                $claimPromotion->nominal_deposit = $request->amount;
                $claimPromotion->nominal_bonus = ($request->amount * $promotion->percentage_bonus) / 100;
                $claimPromotion->current_target = 0;
                $claimPromotion->target = ($amount + $bonus) * $promotion->target;
                $claimPromotion->status = 0;
                $claimPromotion->save();
            }
            
            DB::commit();
            return redirect()->back();

        }catch(\Exception $e) {
            return response()->json($e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }
    }
}
