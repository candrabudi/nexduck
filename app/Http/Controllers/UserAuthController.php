<?php

namespace App\Http\Controllers;

use App\Models\ApiCredential;
use App\Models\Member;
use App\Models\MemberBalance;
use App\Models\MemberBank;
use App\Models\MemberExt;
use App\Models\Network;
use App\Models\User;
use App\Models\UserNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;

class UserAuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (RateLimiter::tooManyAttempts('login.' . $request->ip(), 5)) {
            return response()->json(['error' => 'Too many login attempts. Please try again later.'], 429);
        }

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role != "admin") {
                RateLimiter::clear('login.' . $request->ip());
                return redirect()->intended('/');
            } else {
                RateLimiter::hit('login.' . $request->ip(), 60);
                return back()->withErrors([
                    'username' => 'These credentials do not match our records.',
                ]);
            }
        }

        RateLimiter::hit('login.' . $request->ip(), 60);
        return back()->withErrors([
            'username' => 'These credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        if (empty($request->input('username')) || !is_string($request->input('username')) || User::where('username', $request->input('username'))->exists()) {
            return redirect()->back()->with('error', 'Username is required, must be a string, and must be unique.')->withInput();
        }

        if (empty($request->input('email')) || !filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) || User::where('email', $request->input('email'))->exists()) {
            return redirect()->back()->with('error', 'Email is required, must be a valid email address, and must be unique.')->withInput();
        }

        if (empty($request->input('password')) || strlen($request->input('password')) < 8) {
            return redirect()->back()->with('error', 'Password is required and must be at least 8 characters long.')->withInput();
        }

        if (empty($request->input('full_name')) || !is_string($request->input('full_name'))) {
            return redirect()->back()->with('error', 'Full name is required and must be a string.')->withInput();
        }

        if (empty($request->input('phone_number')) || !is_string($request->input('phone_number'))) {
            return redirect()->back()->with('error', 'Phone number is required and must be a string.')->withInput();
        }

        if (empty($request->input('bank_id')) || !is_numeric($request->input('bank_id'))) {
            return redirect()->back()->with('error', 'Bank ID is required and must be an integer.')->withInput();
        }

        if (empty($request->input('account_name')) || !is_string($request->input('account_name'))) {
            return redirect()->back()->with('error', 'Account name is required and must be a string.')->withInput();
        }

        if (empty($request->input('account_number')) || !is_string($request->input('account_number'))) {
            return redirect()->back()->with('error', 'Account number is required and must be a string.')->withInput();
        }

        DB::beginTransaction();

        try {
            $newUser = User::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => 'member',
                'register_ip_address' => $request->ip(),
            ]);

            Member::create([
                'user_id' => $newUser->id,
                'full_name' => $request->input('full_name'),
                'phone_number' => $request->input('phone_number'),
                'ip_address' => $request->ip(),
            ]);

            MemberBank::create([
                'user_id' => $newUser->id,
                'bank_id' => $request->input('bank_id'),
                'account_name' => $request->input('account_name'),
                'account_number' => $request->input('account_number'),
                'account_status' => 1,
            ]);

            MemberExt::create([
                'user_id' => $newUser->id,
                'ext_name' => $request->input('username'),
            ]);

            MemberBalance::create([
                'user_id' => $newUser->id,
                'main_balance' => 0,
                'referral_balance' => 0,
            ]);

            if ($request->input('referral_code')) {
                $network = Network::where('referral', $request->input('referral_code'))->first();

                if ($network) {
                    UserNetwork::create([
                        'network_id' => $network->id,
                        'user_id' => $newUser->id,
                    ]);
                }
            }
            $this->createNexusMember($request->input('username'));
            DB::commit();
            Auth::login($newUser);
            return redirect('/')->with('success', 'Registration successful!');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Registration failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Registration failed. Please try again later.');
        }
    }


    private function createNexusMember($externalUsername)
    {
        $postData = [
            'method' => 'user_create',
            'agent_code' => env('NEXUS_AGENT_CODE'),
            'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
            'user_code' => $externalUsername,
        ];

        Http::post(env('NEXUS_URL'), $postData);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
