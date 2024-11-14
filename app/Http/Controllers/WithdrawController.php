<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MemberBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function index()
    {
        $memberbanks = MemberBank::where('user_id', Auth::user()->id)
            ->get();
        return view('frontend.withdraw.index', compact('memberbanks'));
    }
}
