<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $deposits = Transaction::where('type', 'deposit')
            ->where('user_id', Auth::user()->id)
            ->with('userBank')
            ->get();
            
        $withdraws = Transaction::where('type', 'withdraw')
            ->where('user_id', Auth::user()->id)
            ->with('userBank')
            ->get();
    
        return view('frontend.transaction.index', compact('deposits', 'withdraws'));
    }
    
}
