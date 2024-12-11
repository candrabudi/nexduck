<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\MemberExt;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionWithdrawController extends Controller
{
    public function index()
    {
        return view('backend.withdraw.index');
    }

    public function loadData(Request $request)
    {
        $query = Transaction::with('user', 'adminBank', 'userBank', 'userUpdate')
            ->select('transactions.*')
            ->where('transactions.type', 'withdraw')
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
        try {
            $transaction = Transaction::findOrFail($request->transaction_id);

            if (!in_array($request->status, ['approved', 'rejected', 'process'])) {
                return response()->json([
                    'status' => 'failed', 
                    'code' => 400, 
                    'message' => 'Gagal melakukan update status transasksi withdraw.'
                ], 400);
            }

            // if ($request->status == 'rejected' && !$request->has('reason')) {
            //     return response()->json([
            //         'status' => 'failed', 
            //         'code' => 422, 
            //         'message' => 'Jika status di tolak, maka isi alasannya'
            //     ], 422);
            // }

            $transaction->update([
                'status' => $request->status,
                'reason' => $request->status == 'rejected' ? $request->reason : null,
                'updated_by' => auth()->id(),
                'updated_ip_address' => $request->ip(),
            ]);

            if ($request->status == 'rejected') {
                $memberExt = MemberExt::where('user_id', $transaction->user_id)->first();
                $postData = [
                    'method' => 'user_deposit',
                    'agent_code' => env('NEXUS_AGENT_CODE'),
                    'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                    'user_code' => $memberExt->ext_name,
                    'amount' => (int) $transaction->amount
                ];
                Http::post(env('NEXUS_URL'), $postData);
            }

            return response()->json([
                'success' => true,
                'message' => 'Transaction status updated successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed', 
                'code' => 500, 
                'message' => 'Internal server error. '.$e->getMessage()
            ], 500);
        }
    }

}
