<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MemberBalance;
use App\Models\MemberBank;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class WithdrawController extends Controller
{
    public function index()
    {
        $memberbanks = MemberBank::where('user_id', Auth::user()->id)
            ->get();
        return view('frontend.withdraw.index', compact('memberbanks'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $bankMember = MemberBank::where('user_id', Auth::user()->id)
                ->first();

            $memberBalance = MemberBalance::where('user_id', Auth::user()->id)
                ->first();

            $store = new Transaction();
            $store->user_id = Auth::user()->id;
            $store->promotion_id = 0;
            $store->admin_bank_id = 0;
            $store->user_bank_id = $bankMember->id;
            $store->amount = $request->amount;
            $store->type = "withdraw";
            $store->status = "pending";
            $store->created_ip_address = $request->ip();
            $store->save();

            $memberBalance->main_balance = $memberBalance->main_balance - $request->amount;
            $memberBalance->save();

            $postData = [
                'method' => 'user_withdraw',
                'agent_code' => env('NEXUS_AGENT_CODE'),
                'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                'user_code' => Auth::user()->memberExt->ext_name,
                'amount' => (int)$request->amount
            ];

            Http::post(env('NEXUS_URL'), $postData);

            DB::commit();
            return redirect()->back();

        }catch(\Exception $e) {
            return response()->json($e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }
    }
}
