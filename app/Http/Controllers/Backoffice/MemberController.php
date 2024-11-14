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

class MemberController extends Controller
{
    public function index()
    {
        try {
            $banks = Bank::all();
            $users = User::where('role', 'member')
                ->get();
            return view('backend.member.index', compact('users', 'banks'));
        } catch (\Exception $e) {
            return abort(413, 'Failed to load bank accounts.');
        }
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->fresh();

        $member = new Member();
        $member->user_id = $user->id;
        $member->full_name = $request->full_name;
        $member->phone_number = $request->phone_number;
        $member->save();

        $memberBank = new MemberBank();
        $memberBank->user_id = $user->id;
        $memberBank->bank_id = $request->bank_id;
        $memberBank->account_name = $request->account_name;
        $memberBank->account_number = $request->account_numbers;
        $memberBank->account_status = 1;
        $memberBank->save();

        return response()->json([
            'success' => true,
            'message' => 'Member created successfully',
        ]);
    }


    public function edit($accountId)
    {
        try {
            $user = User::where('id', $accountId)
                ->with(['member', 'memberBank'])
                ->first();
            return response()->json(['user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Account not found.'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:0,1', // 0 = Inactive, 1 = Active
            'lock_game' => 'required|in:0,1', // 0 = Unlocked, 1 = Locked
        ]);
    
        // Find the user by ID
        $user = User::find($id);
    
        // If the user does not exist, return an error response
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }
    
        // Update the user details
        $user->update([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'status' => $validated['status'],
        ]);
    
        // Find the associated member record
        $member = Member::where('user_id', $user->id)->first();
    
        // If the member does not exist, return an error response
        if (!$member) {
            return response()->json([
                'success' => false,
                'message' => 'Member details not found',
            ], 404);
        }
    
        // Update the member details
        $member->update([
            'full_name' => $validated['full_name'],
            'phone_number' => $validated['phone_number'],
            'lock_game' => $validated['lock_game'],
        ]);
    
        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
        ]);
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();
    
            $user = User::findOrFail($id);
            
            $member = Member::where('user_id', $user->id)->first();
            if ($member) {
                MemberBank::where('user_id', $user->id)->delete();
                MemberExt::where('user_id', $user->id)->delete();
                $member->delete();
            }
    
            $user->delete();
    
            DB::commit();
    
            return response()->json(['success' => true, 'message' => 'User and associated records deleted successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Failed to delete user and associated records.'], 400);
        }
    }
}
