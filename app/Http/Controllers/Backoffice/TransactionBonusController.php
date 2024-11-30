<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\ClaimPromotion;
use App\Models\MemberBalance;
use App\Models\MemberExt;
use App\Models\PromotionDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TransactionBonusController extends Controller
{
    public function index()
    {
        return view('backend.bonus.index');
    }

    public function loadData(Request $request)
    {
        $query = Transaction::with('user', 'adminBank', 'userBank', 'userUpdate')
            ->select('transactions.*')
            ->where('transactions.type', 'bonus')
            ->join('users', 'transactions.user_id', '=', 'users.id');

        if ($request->has('search') && $request->search) {
            $query->where('users.username', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status') && $request->status && $request->status != "Semua Status") {
            $query->where('transactions.status', $request->status);
        }

        $transactions = $query->orderBy('transactions.created_at', 'desc')->paginate(10);

        $response = [
            'transactions' => $transactions->items(),
            'pagination' => [
                'current_page' => $transactions->currentPage(),
                'last_page' => $transactions->lastPage(),
                'per_page' => $transactions->perPage(),
                'total' => $transactions->total(),
            ]
        ];

        return response()->json($response);
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        try {
            $transaction = Transaction::findOrFail($request->transaction_id);

            $transaction->status = $request->status;
            $transaction->save();

            if($request->status == "approved") {
                $transactionDeposit = Transaction::where('id', $transaction->transaction_id)
                    ->first();

                $promotion = PromotionDetail::where('promotion_id', $transaction->promotion_id)
                    ->first();

                $bonus = ($transactionDeposit->amount * $promotion->percentage_bonus) / 100;

                $claimPromotion = new ClaimPromotion();
                $claimPromotion->user_id = $transaction->user_id;
                $claimPromotion->transaction_id = $transactionDeposit->id;
                $claimPromotion->promotion_id = $transaction->promotion_id;
                $claimPromotion->nominal_deposit = $transactionDeposit->amount;
                $claimPromotion->nominal_bonus = $bonus;
                $claimPromotion->current_target = 0;
                $claimPromotion->target = ($transactionDeposit->amount + $bonus) * $promotion->target;
                $claimPromotion->status = 0;
                $claimPromotion->save();

                $memberExt = MemberExt::where('user_id', $transaction->user_id)
                    ->first();
                $memberBalance = MemberBalance::where('user_id', $transaction->user_id)
                    ->first();
    
                $postData = [
                    'method' => 'user_deposit',
                    'agent_code' => env('NEXUS_AGENT_CODE'),
                    'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                    'user_code' => $memberExt->ext_name,
                    'amount' => (int)round($bonus)
                ];
    
                Http::post(env('NEXUS_URL'), $postData);

                $memberBalance->main_balance = $memberBalance->main_balance + $transaction->amount;
                $memberBalance->save();
            }
            return response()->json([
                'success' => true,
                'message' => 'Transaction status updated successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update transaction status. ' . $e->getMessage(),
            ], 500);
        }
    }
}
