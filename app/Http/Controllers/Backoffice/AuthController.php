<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role === 'admin' || $user->role === 'promotor') {
                return redirect()->route('backoffice.dashboard');
            }

            Auth::logout();
            return back()->withErrors(['username' => 'You do not have permission to access this page.']);
        }

        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('member');
    }
}
