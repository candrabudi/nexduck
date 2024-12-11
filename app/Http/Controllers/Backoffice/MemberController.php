<?php

namespace App\Http\Controllers\Backoffice;

use App\Helpers\AesEncryptionHelper;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Bank;
use App\Models\LogGameActivity;
use App\Models\Member;
use App\Models\MemberBank;
use App\Models\MemberExt;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class MemberController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'member')->with('member')->get();

        return view('backend.members.index', compact('users'));
    }
    public function lock($userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 0;
        $user->save();

        return response()->json(['message' => 'User locked successfully!']);
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Password berhasil diperbarui!');
    }

    public function show(Request $request)
    {
        $userId = $request->user_id;
        if (!$userId) {
            return redirect('/backoffice/members');
        }
        $user = User::with('member')->findOrFail($userId);
        $transactions = Transaction::where('user_id', $user->id)
            ->get();

        $logGames = LogGameActivity::where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(5);
        
        $totalGamePlay = LogGameActivity::where('user_id', $user->id)
            ->distinct('game_id') 
            ->count('game_id');
        


        $totalDeposit = DB::table('transactions')
            ->where('user_id', $userId)
            ->where('type', 'deposit')
            ->where('status', 'approved')
            ->sum('amount');

        $totalWithdraw = DB::table('transactions')
            ->where('user_id', $userId)
            ->where('type', 'withdraw')
            ->where('status', 'approved')
            ->sum('amount');

            $logActivities = ActivityLog::where('user_id', $userId)
            ->paginate(5); 
            
        return view('backend.members.show', compact('user', 'transactions', 'logGames', 'totalWithdraw', 'totalDeposit', 'totalGamePlay', 'logActivities'));
    }
    
    public function getGameHistoryPlayer(Request $request, $a)
    {
        $startDate = Carbon::now()->subDays(7)->startOfDay()->format('Y-m-d H:i:s');
        $endDate = Carbon::now()->endOfDay()->format('Y-m-d H:i:s');
        $user = User::with('member')->findOrFail($a);
        $page = (int)$request->page == 1 ? 0 : (int)$request->page;
        $perPage = 10;
        $postArray = [
            'method' => 'get_game_log',
            'agent_code' => env('NEXUS_AGENT_CODE'),
            'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
            'user_code' => $user->memberExt->ext_name,
            'game_type' => 'slot',
            'start' => $startDate,
            'end' => $endDate,
            'page' => $page,
            'perPage' => $perPage,
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->timeout(5)->post('https://api.nexusggr.com', $postArray);

        $gameLogs = [];

        if ($response->successful()) {
            $responseData = $response->json();
            $gameLogs = $responseData['slot'] ?? [];

            usort($gameLogs, function ($a, $b) {
                return strtotime($b['created_at']) - strtotime($a['created_at']);
            });
            $totalCount = $responseData['total_count'] ?? 0;
        } else {
            $gameLogs = [];
            $totalCount = 0;
        }

        $totalPages = ceil($totalCount / $perPage);

        return response()->json([
            'status' => 'success',
            'game_logs' => $gameLogs,
            'total_count' => $totalCount,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'per_page' => $perPage,
        ]);
    }
}
