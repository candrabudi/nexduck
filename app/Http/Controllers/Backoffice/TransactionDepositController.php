<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MemberBalance;
use App\Models\MemberExt;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionDepositController extends Controller
{
    public function index()
    {
        return view('backend.deposit.index');
    }

    public function loadData(Request $request)
    {
        $query = Transaction::with('user', 'adminBank', 'userBank', 'userUpdate')
            ->select('transactions.*')
            ->where('transactions.type', 'deposit')
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
                $memberExt = MemberExt::where('user_id', $transaction->user_id)
                    ->first();
                $memberBalance = MemberBalance::where('user_id', $transaction->user_id)
                    ->first();
    
                $postData = [
                    'method' => 'user_deposit',
                    'agent_code' => env('NEXUS_AGENT_CODE'),
                    'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                    'user_code' => $memberExt->ext_name,
                    'amount' => $transaction->amount
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
