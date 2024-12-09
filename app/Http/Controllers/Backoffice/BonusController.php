<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\ClaimPromotion;
use App\Models\MemberBalance;
use App\Models\MemberExt;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BonusController extends Controller
{
    public function index()
    {
        return view('backend.bonus.index');
    }

    public function loadData(Request $request)
    {
        $query = Transaction::with('user', 'adminBank', 'userBank', 'userUpdate')
            ->select('transactions.*')
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
}
