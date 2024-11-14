<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\AesEncryptionHelper;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {
            $totalMembers = User::where('role', 'member')
                ->count();

            $totalTransactions = DB::table('transactions')
                ->where('status', 'approved')
                ->sum('amount');

            $totalDeposit = DB::table('transactions')
                ->where('type', 'deposit')
                ->where('status', 'approved')
                ->sum('amount');

            $totalWithdraw = DB::table('transactions')
                ->where('type', 'withdraw')
                ->where('status', 'approved')
                ->sum('amount');

            $transactionData = DB::table('transactions')
                ->select(DB::raw('type, SUM(amount) as total_amount'))
                ->whereIn('type', ['deposit', 'withdraw', 'bonus', 'rolling', 'cashback'])
                ->groupBy('type')
                ->get();
            return view('backend.dashboard.index', compact(
                'totalMembers',
                'totalTransactions',
                'transactionData',
                'totalWithdraw',
                'totalDeposit'
            ));
        } catch (\Exception $e) {
            return redirect()->route('member')->withErrors(['error' => 'Invalid access.']);
        }
    }

    public function getTransactionData(Request $request)
    {
        // Default periode adalah bulan
        $period = $request->get('period', 'month');
        $startDate = null;
        $endDate = Carbon::now();

        // Mengatur rentang tanggal berdasarkan periode yang dipilih
        if ($period == 'day') {
            $startDate = Carbon::now()->startOfDay();
        } elseif ($period == 'week') {
            $startDate = Carbon::now()->startOfWeek();
        } else {
            // Default ke bulan
            $startDate = Carbon::now()->startOfMonth();
        }

        // Ambil data transaksi berdasarkan periode dengan menggunakan whereDate
        $transactions = DB::table('transactions')
            ->select(DB::raw('type, SUM(amount) as total_amount, DATE(created_at) as date'))
            ->whereDate('created_at', '>=', $startDate->format('Y-m-d'))  // Menggunakan whereDate
            ->whereDate('created_at', '<=', $endDate->format('Y-m-d'))    // Menggunakan whereDate
            ->where('status', 'approved')
            ->groupBy(DB::raw('type, DATE(created_at)'))
            ->get()
            ->groupBy('type');

        // Data untuk chart
        $chartData = [
            'labels' => [],
            'deposit' => [],
            'withdraw' => [],
            'bonus' => [],
            'rolling' => [],
            'cashback' => [],
        ];

        // Organisir data ke dalam format chart
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
        // Ambil parameter period dari request
        $period = $request->query('period', 'month'); // Default 'month'

        // Tentukan tanggal berdasarkan periode yang dipilih
        switch ($period) {
            case 'month':
                // Bulan ini
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'last_month':
                // Bulan lalu
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                $endDate = Carbon::now()->subMonth()->endOfMonth();
                break;
            case 'today':
                // Hari ini
                $startDate = Carbon::today();
                $endDate = Carbon::today();
                break;
            case 'yesterday':
                // Kemarin
                $startDate = Carbon::yesterday();
                $endDate = Carbon::yesterday();
                break;
            case 'last_week':
                // 1 minggu terakhir
                $startDate = Carbon::now()->subWeek();
                $endDate = Carbon::now();
                break;
            case 'this_week':
                // Minggu ini
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            default:
                // Default ke bulan ini
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
        }

        // Ambil jumlah transaksi per tipe dalam periode yang ditentukan
        $transactionTypes = DB::table('transactions')
            ->select('type', DB::raw('COUNT(*) as count'))
            ->whereDate('created_at', '>=', $startDate->format('Y-m-d'))  // Menggunakan whereDate
            ->whereDate('created_at', '<=', $endDate->format('Y-m-d'))    // Menggunakan whereDate
            ->groupBy('type')
            ->get();

        // Ubah hasil menjadi array yang bisa digunakan di frontend
        $transactionData = [
            'labels' => $transactionTypes->pluck('type')->toArray(),
            'data' => $transactionTypes->pluck('count')->toArray(),
        ];

        return response()->json($transactionData);
    }
}