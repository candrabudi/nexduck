<?php

namespace App\Http\Controllers\Backoffice;

use App\Helpers\AesEncryptionHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;
class AuthController extends Controller
{
    public function login($a)
    {
        $setting = Setting::first();
        if (!$setting || $a !== $setting->web_token) {
           abort(403);
        }

        $token = $a;
        return view('backend.auth.login', compact('token'));
    }

    public function authenticate(Request $request, $token)
    {
        $setting = Setting::first();
        if (!$setting || $token !== $setting->web_token) {
            return back()->withErrors(['token' => 'Invalid token.']);
        }
    
        $ip = $request->ip();
        $blockedKey = 'blocked.' . $ip;
        
        if (Cache::has($blockedKey)) {
            return response()->json(['error' => 'Your device is temporarily blocked due to multiple failed login attempts.'], 403);
        }
    
        $key = 'login.' . $ip;
        if (RateLimiter::tooManyAttempts($key, 3)) {
            RateLimiter::clear($key);
            Cache::put($blockedKey, true, now()->addMinutes(60));
            abort(429, 'Too many login attempts. Please try again in 1 hour.');
        }
    
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            RateLimiter::clear($key);
            return redirect()->route('backoffice.dashboard');
        }
    
        RateLimiter::hit($key, 60);
    
        return back()->withErrors(['username' => 'Invalid credentials.']);
    }
}
