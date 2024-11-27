<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('frontend.setting.profile');
    }

    public function wallet()
    {
        return view('frontend.wallet.index');
    }

    // Fungsi untuk update profile
    public function updateProfile(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil user yang sedang login
        $user = auth()->user();

        // Update data username dan email
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        // Jika password diisi, maka update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman profile dengan pesan sukses
        return redirect()->route('setting.profile')->with('success', 'Profile updated successfully.');
    }
}
