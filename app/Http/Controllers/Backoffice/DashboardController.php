<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {
            $totalMembers = User::where('role', 'member')
                ->count();
            
            $totalUserBanned = User::where('role', 'member')
                ->where('status', 0)
                ->count();

            $totalTransactions = DB::table('transactions')
                ->where('status', 'approved')
                ->sum('amount');
            
            $totalClaimBonus = DB::table('transactions')
                ->where('type', 'bonus')
                ->sum('amount');


            $totalDeposit = DB::table('transactions')
                ->where('type', 'deposit')
                ->where('status', 'approved')
                ->sum('amount');

            $totalWithdraw = DB::table('transactions')
                ->where('type', 'withdraw')
                ->where('status', 'approved')
                ->sum('amount');

            $totalDepositToday = DB::table('transactions')
                ->where('type', 'deposit')
                ->where('status', 'approved')
                ->whereDate('created_at', Carbon::today())
                ->sum('amount');

            $totalWithdrawToday = DB::table('transactions')
                ->where('type', 'withdraw')
                ->where('status', 'approved')
                ->whereDate('created_at', Carbon::today())
                ->sum('amount');

            $transactionData = DB::table('transactions')
                ->select(DB::raw('type, SUM(amount) as total_amount'))
                ->whereIn('type', ['deposit', 'withdraw', 'bonus', 'rolling', 'cashback'])
                ->groupBy('type')
                ->get();


            $postArray = [
                'method' => 'money_info',
                'agent_code' => env('NEXUS_AGENT_CODE'),
                'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
            ];

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(5)->post('https://api.nexusggr.com', $postArray);

            $agentBalance = 0;

            if ($response->successful()) {
                $responseData = $response->json();
                if ($responseData['status'] == 1 && isset($responseData['agent']['balance'])) {
                    $agentBalance = $responseData['agent']['balance'];
                }
            }

            $transactions = DB::table('transactions')
                ->select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw("SUM(CASE WHEN type = 'deposit' AND status = 'approved' THEN amount ELSE 0 END) as total_deposit"),
                    DB::raw("SUM(CASE WHEN type = 'withdraw' AND status = 'approved' THEN amount ELSE 0 END) as total_withdraw")
                )
                ->whereDate('created_at', '>=', Carbon::today()->subDays(6))
                ->groupBy(DB::raw('DATE(created_at)'))
                ->orderBy(DB::raw('DATE(created_at)'), 'ASC')
                ->get();

            $labels = [];
            $depositData = [];
            $withdrawData = [];

            foreach ($transactions as $transaction) {
                $labels[] = $transaction->date;
                $depositData[] = $transaction->total_deposit;
                $withdrawData[] = $transaction->total_withdraw;
            }

            return view('backend.dashboard.index', compact(
                'totalMembers',
                'totalTransactions',
                'transactionData',
                'totalWithdraw',
                'totalDeposit',
                'totalWithdrawToday',
                'totalDepositToday',
                'agentBalance',
                'depositData',
                'withdrawData',
                'labels',
                'totalUserBanned', 
                'totalClaimBonus'
            ));
        } catch (\Exception $e) {
            return redirect()->route('member')->withErrors(['error' => 'Invalid access.']);
        }
    }

    public function getTransactionData(Request $request)
    {
        $period = $request->get('period', 'month');
        $startDate = null;
        $endDate = Carbon::now();

        if ($period == 'day') {
            $startDate = Carbon::now()->startOfDay();
        } elseif ($period == 'week') {
            $startDate = Carbon::now()->startOfWeek();
        } else {
            $startDate = Carbon::now()->startOfMonth();
        }

        $transactions = DB::table('transactions')
            ->select(DB::raw('type, SUM(amount) as total_amount, DATE(created_at) as date'))
            ->whereDate('created_at', '>=', $startDate->format('Y-m-d'))
            ->whereDate('created_at', '<=', $endDate->format('Y-m-d'))
            ->where('status', 'approved')
            ->groupBy(DB::raw('type, DATE(created_at)'))
            ->get()
            ->groupBy('type');

        $chartData = [
            'labels' => [],
            'deposit' => [],
            'withdraw' => [],
            'bonus' => [],
            'rolling' => [],
            'cashback' => [],
        ];

        foreach ($transactions as $type => $data) {
            foreach ($data as $item) {
                $chartData['labels'][] = Carbon::parse($item->date)->format('Y-m-d');
                $chartData[$type][] = $item->total_amount;
            }
        }

        return response()->json($chartData);
    }

    public function getTransactionSummary(Request $request)
    {
        $period = $request->query('period', 'month');

        switch ($period) {
            case 'month':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'last_month':
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                $endDate = Carbon::now()->subMonth()->endOfMonth();
                break;
            case 'today':
                $startDate = Carbon::today();
                $endDate = Carbon::today();
                break;
            case 'yesterday':
                $startDate = Carbon::yesterday();
                $endDate = Carbon::yesterday();
                break;
            case 'last_week':
                $startDate = Carbon::now()->subWeek();
                $endDate = Carbon::now();
                break;
            case 'this_week':
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            default:
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
        }

        $transactionTypes = DB::table('transactions')
            ->select('type', DB::raw('COUNT(*) as count'))
            ->whereDate('created_at', '>=', $startDate->format('Y-m-d'))
            ->whereDate('created_at', '<=', $endDate->format('Y-m-d'))
            ->groupBy('type')
            ->get();

        $transactionData = [
            'labels' => $transactionTypes->pluck('type')->toArray(),
            'data' => $transactionTypes->pluck('count')->toArray(),
        ];

        return response()->json($transactionData);
    }
}