<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionWithdrawController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::where('type', 'withdraw')
            ->with(['adminBank', 'userBank', 'userUpdate', 'user']);

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereDate('created_at', '>=', $request->start_date)
                  ->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->updated_by) {
            $query->where('updated_by', $request->updated_by);
        }

        $transactions = $query->get();

        $users = User::whereIn('role', ['admin', 'cs', 'promotor'])
            ->get();

        return view('backend.withdraws.index', compact('transactions', 'users'));
    }


    public function show($id)
    {
        $transaction = Transaction::with(['adminBank', 'userBank', 'userUpdate', 'user'])
            ->findOrFail($id);

        return response()->json($transaction);
    }

    public function updateStatus(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        if (!in_array($request->transaction_status, ['approved', 'rejected', 'process'])) {
            return response()->json(['message' => 'Invalid status update.'], 400);
        }

        if ($request->status == 'rejected' && !$request->has('reason')) {
            return response()->json(['message' => 'Reason is required when status is rejected.'], 400);
        }

        $transaction->update([
            'status' => $request->transaction_status,
            'reason' => $request->transaction_status == 'rejected' ? $request->reason : null,
            'updated_by' => auth()->id(),
            'updated_ip_address' => $request->ip(),
        ]);

        return response()->json(['message' => 'Transaction status updated successfully.']);
    }
}
