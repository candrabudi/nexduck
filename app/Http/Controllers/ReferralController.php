<?php


namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\UserNetwork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function index()
    {
        $network = Network::where('user_id', Auth::user()->id)
            ->first();

        $referrals = [];
        
        if($network) {
            $referrals = UserNetwork::with('user')
                ->where('network_id', $network->id)
                ->paginate(10);
        }


        return view('frontend.setting.referral', compact('referrals', 'network'));
    }
}
