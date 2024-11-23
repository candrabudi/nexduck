<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\MemberBank;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    public function index()
    {
        $banks = Bank::where('bank_type', 'bank')
            ->with('bankAccount')
            ->get();
       
        $ewallets = Bank::where('bank_type', 'ewallet')
            ->with('bankAccount')
            ->get();


        return view('frontend.deposit.index', compact('banks', 'ewallets'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $bankMember = MemberBank::where('user_id', Auth::user()->id)
                ->first();

            $store = new Transaction();
            $store->user_id = Auth::user()->id;
            $store->promotion_id = 0;
            $store->admin_bank_id = $request->admin_bank_id;
            $store->user_bank_id = $bankMember->id;
            $store->amount = $request->amount;
            $store->type = "deposit";
            $store->status = "pending";
            $store->created_ip_address = $request->ip();
            $store->save();
            
            DB::commit();
            return redirect()->back();

        }catch(\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }
}
