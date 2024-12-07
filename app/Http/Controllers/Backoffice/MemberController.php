<?php

namespace App\Http\Controllers\Backoffice;

use App\Helpers\AesEncryptionHelper;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Member;
use App\Models\MemberBank;
use App\Models\MemberExt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    // Show the list of users
    public function index()
    {
        $users = User::where('role', 'member')->with('member')->get(); // Eager load the member details

        return view('backend.members.index', compact('users'));
    }

    // Lock a user (change their status to 'locked')
    public function lock($userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 0; // Lock the user (0 means locked)
        $user->save();

        return response()->json(['message' => 'User locked successfully!']);
    }

    public function updatePassword(Request $request, $id)
    {
        // $request->validate([
        //     'current_password' => 'required',
        //     'new_password' => 'required|min:8|confirmed',
        // ]);

        $user = User::find($id);

        // if (!Hash::check($request->current_password, $user->password)) {
        //     return back()->withErrors(['current_password' => 'Password saat ini salah']);
        // }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Password berhasil diperbarui!');
    }

    // Show user details
    public function show(Request $request)
    {
        $userId = $request->user_id;
        // if(!$userId) {
        //     return redirect('/backoffice/members');
        // }
        $user = User::with('member')->findOrFail($userId);

        return view('backend.members.show', compact('user'));
    }
}
