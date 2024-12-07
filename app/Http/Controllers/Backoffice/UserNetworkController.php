<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Network; // Assuming your model is Network
use App\Models\User;
use App\Models\UserNetwork;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserNetworkController extends Controller
{
    public function index()
    {
        $networks = Network::with('user')->get();
        $users = User::where('role', 'member')
            ->get();
        return view('backend.networks.index', compact('networks', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'referral' => 'required|string|max:255',
            // 'photo_id_card' => 'nullable|string',
            'status' => 'required|integer',
        ]);

        Network::create($validated);
        return response()->json(['message' => 'Network added successfully.'], 200);
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        $network = Network::findOrFail($id);

        $userNetworks = UserNetwork::where('network_id', $id)
            ->get();
        return view('backend.networks.detail', compact('network', 'userNetworks'));
    }

    public function edit($id)
    {
        $network = Network::findOrFail($id);
        return response()->json($network);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'referral' => 'required|string|max:255',
            'photo_id_card' => 'nullable|string',
            'status' => 'required|integer',
        ]);

        $network = Network::findOrFail($id);
        $network->update($validated);
        return response()->json(['message' => 'Network updated successfully.'], 200);
    }

    public function destroy($id)
    {
        Network::findOrFail($id)->delete();
        return response()->json(['message' => 'Network deleted successfully.'], 200);
    }

    public function generateReferralCode()
    {
        $referral = strtoupper(Str::random(8));

        while (Network::where('referral', $referral)->exists()) {
            $referral = strtoupper(Str::random(8));
        }

        return $referral;
    }
}
