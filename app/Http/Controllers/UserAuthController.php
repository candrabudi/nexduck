<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApiCredential;
use App\Models\Member;
use App\Models\MemberBank;
use App\Models\MemberExt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'These credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Create a new user
            $newUser = User::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'superadmin' => 'member',
                'register_ip_address' => $request->ip(),
            ]);

            // Create member details
            Member::create([
                'user_id' => $newUser->id,
                'full_name' => $request->input('full_name'),
                'phone_number' => $request->input('phone_number'),
                'ip_address' => $request->ip(),
            ]);

            // Create bank account details
            MemberBank::create([
                'user_id' => $newUser->id,
                'bank_id' => $request->input('bank_id'),
                'account_name' => $request->input('account_name'),
                'account_number' => $request->input('account_number'),
                'account_status' => 1, // active status
            ]);

            // Generate a random string for external username
            $externalUsername = $this->generateRandomString(12);

            // Get all API credentials
            $apiCredentials = ApiCredential::all();

            // Handle member extension creation for each API credential
            foreach ($apiCredentials as $apiCredential) {
                $this->createMemberExtension($newUser->id, $apiCredential, $externalUsername);
            }

            // Commit the transaction
            DB::commit();

            // Log in the newly registered user
            Auth::login($newUser);

            // Redirect to the home page
            return redirect('/');

        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Generate a random string.
     *
     * @param int $length
     * @return string
     */
    private function generateRandomString($length = 12)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return substr(str_shuffle(str_repeat($characters, ceil($length / strlen($characters)))), 0, $length);
    }

    /**
     * Create a member extension based on API credentials.
     *
     * @param int $userId
     * @param ApiCredential $apiCredential
     * @param string $externalUsername
     * @return void
     */
    private function createMemberExtension($userId, $apiCredential, $externalUsername)
    {
        // Create and save the member extension
        MemberExt::create([
            'api_credential_id' => $apiCredential->id,
            'user_id' => $userId,
            'ext_name' => $externalUsername,
        ]);

        // Handle API-specific requests
        if ($apiCredential->agent_type === 'sg') {
            $this->createSgMember($apiCredential, $externalUsername);
        } elseif ($apiCredential->agent_type === 'nexus') {
            $this->createNexusMember($apiCredential, $externalUsername);
        }
    }

    /**
     * Create a member on SG platform.
     *
     * @param ApiCredential $apiCredential
     * @param string $externalUsername
     * @return void
     */
    private function createSgMember($apiCredential, $externalUsername)
    {
        $url = $apiCredential->agent_url . 'CreateMember.aspx';

        Http::withHeaders([
            'Accept' => 'application/json',
        ])->get($url, [
                    'agent_code' => $apiCredential->agent_code,
                    'signature' => $apiCredential->agent_signature,
                    'username' => $externalUsername,
                ]);
    }

    /**
     * Create a member on Nexus platform.
     *
     * @param ApiCredential $apiCredential
     * @param string $externalUsername
     * @return void
     */
    private function createNexusMember($apiCredential, $externalUsername)
    {
        $postData = [
            'method' => 'user_create',
            'agent_code' => $apiCredential->agent_code,
            'agent_token' => $apiCredential->agent_signature,
            'user_code' => $externalUsername,
        ];

        Http::post($apiCredential->agent_url, $postData);
    }


    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
