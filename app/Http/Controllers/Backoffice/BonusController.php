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
        $claimPromotions = ClaimPromotion::all();
        return view('backend.bonus.index', compact('claimPromotions'));
    }

    public function updateStatus(Request $request)
    {
        $claim = ClaimPromotion::find($request->claim_id);
        $claim->status = $request->bonus_status;
        $claim->save();

        if($request->bonus_status == 1) {

            $memberExt = MemberExt::where('user_id', $claim->user_id)
                ->first();

            $memberBalance = MemberBalance::where('user_id', $claim->user_id)
                ->first();

            $memberBalance->main_balance = $memberBalance->main_balance + $claim->nominal_bonus;
            $memberBalance->save();


            $store = new Transaction();
            $store->user_id = $claim->user_id;
            $store->promotion_id = $claim->promotion_id;
            $store->admin_bank_id = 0;
            $store->user_bank_id = 0;
            $store->amount = $claim->nominal_bonus;
            $store->type = "deposit";
            $store->status = "approved";
            $store->created_ip_address = $request->ip();
            $store->save();

            $postData = [
                'method' => 'user_deposit',
                'agent_code' => env('NEXUS_AGENT_CODE'),
                'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                'user_code' => $memberExt->ext_name,
                'amount' => $claim->nominal_bonus
            ];

            Http::post(env('NEXUS_URL'), $postData);
        }

        return response()->json(['success' => true]);
    }
}
