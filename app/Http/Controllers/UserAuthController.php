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
            if(Auth::user()->role != "admin") {
                RateLimiter::clear('login.' . $request->ip());
                return redirect()->intended('/');
            }else{
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
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'full_name' => 'required|string',
            'phone_number' => 'required|string',
            'bank_id' => 'required|integer',
            'account_name' => 'required|string',
            'account_number' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
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

            $externalUsername = $this->generateRandomString(12);
            MemberExt::create([
                'user_id' => $newUser->id,
                'ext_name' => $request->input('username'),
            ]);

            MemberBalance::create([
                'user_id' => $newUser->id, 
                'main_balance' => 0,
                'referral_balance' => 0,
            ]);

            if($request->referral_code != "") {
                $network = Network::where('referral', $request->referral_code)
                    ->first();

                if($network) {
                    $userNetwork = new UserNetwork();
                    $userNetwork->network_id = $network->id;
                    $userNetwork->user_id = $newUser->id;
                    $userNetwork->save();
                }
            }
            $this->createNexusMember($request->input('username'));

            DB::commit();
            Auth::login($newUser);

            return redirect('/')->with('success', 'Registration successful!');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Registration failed. Please try again later.'], 500);
        }
    }

    private function generateRandomString($length = 12)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return substr(str_shuffle(str_repeat($characters, ceil($length / strlen($characters)))), 0, $length);
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
