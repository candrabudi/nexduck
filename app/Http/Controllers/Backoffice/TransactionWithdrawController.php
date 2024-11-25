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
        try {
            $transaction = Transaction::findOrFail($id);

            if (!in_array($request->transaction_status, ['approved', 'rejected', 'process'])) {
                return redirect()->back()->with('error', 'Gagal melakukan update status transasksi withdraw.');
            }

            if ($request->transaction_status == 'rejected' && !$request->has('reason')) {
                return redirect()->back()->with('error', 'Jika status di tolak, maka isi alasannya');
            }

            $transaction->update([
                'status' => $request->transaction_status,
                'reason' => $request->transaction_status == 'rejected' ? $request->reason : null,
                'updated_by' => auth()->id(),
                'updated_ip_address' => $request->ip(),
            ]);

            if ($request->transaction_status == 'rejected') {
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

            return redirect()->back()->with('success', 'Status Withdraw Berhasil Di Rubah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('Maaf ada kesalahan sistem, silahkan hubungi developer.');
        }
    }

}
