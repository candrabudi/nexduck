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
        try {
            // Check if the user already has a pending transaction
            $pendingTransaction = Transaction::where('user_id', Auth::user()->id)
                ->where('type', 'deposit')
                ->where('status', 'pending')
                ->first();

            if ($pendingTransaction) {
                // If there's a pending transaction, return a message saying they can't deposit again
                return response()->json(['success' => false, 'message' => 'You have a pending transaction. Please wait until it is processed.']);
            }

            // Retrieve the bank member
            $bankMember = MemberBank::where('user_id', Auth::user()->id)
                ->first();

            // Create a new transaction record
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

            // If there's a promotion, handle it
            if ($request->promotion_id != 0 && !empty($request->promotion_id)) {
                $promotion = PromotionDetail::where('promotion_id', $request->promotion_id)
                    ->first();

                $amount = $request->amount;
                $bonus = ($request->amount * $promotion->percentage_bonus) / 100;

                $claimPromotion = new ClaimPromotion();
                $claimPromotion->user_id = Auth::user()->id;
                $claimPromotion->promotion_id = $request->promotion_id;
                $claimPromotion->nominal_deposit = $request->amount;
                $claimPromotion->nominal_bonus = $bonus;
                $claimPromotion->current_target = 0;
                $claimPromotion->target = ($amount + $bonus) * $promotion->target;
                $claimPromotion->status = 0;
                $claimPromotion->save();
            }

            // Commit the transaction if everything goes well
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Deposit successfully processed.']);

        } catch (\Exception $e) {
            DB::rollBack();
            // Return a JSON response with error message
            return response()->json(['success' => false, 'message' => 'Something went wrong. Please try again.']);
        }
    }

}
