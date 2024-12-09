<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PromotorController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'promotor')
            ->get();

        return view('backend.promotors.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'status' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role' => 'promotor',
            'status' => $request->status,
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'status' => 'required',
            'password' => 'nullable',
        ]);

        $user = User::find($id);

        $userData = [
            'username' => $request->username,
            'email' => $request->email,
            'status' => $request->status,
            'role' => 'promotor',
        ];

        if ($request->password) {
            $userData['password'] = bcrypt($request->password);
        }

        $user->update($userData);

        $user->member->update([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
        ]);

        return response()->json(['success' => true]);
    }
}
