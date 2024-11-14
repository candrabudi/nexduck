<?php

namespace App\Http\Controllers\Backoffice;

use App\Helpers\AesEncryptionHelper;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    public function index()
    {
        try {
            $banks = Bank::all();
            return view('backend.bank.index', compact('banks'));
        } catch (\Exception $e) {
            abort(413);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_code' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
        ]);

        $c = Bank::where('bank_code', $request->bank_code)
            ->orWhere('bank_name', $request->bank_name)
            ->first();
        if($c) {
            return response()->json(['success' => false, 'message' => 'Bank created failed'], 400);
        }
        Bank::create($request->all());

        return response()->json(['success' => true, 'message' => 'Bank created successfully']);
    }


    public function edit($b)
    {
        $apiCredential = Bank::findOrFail($b);
        return response()->json(['apiCredential' => $apiCredential]);
    }

    public function update(Request $request, $id)
    {
        $apiCredential = Bank::findOrFail($id);

        if ($request->agent_status == 1) {
            Bank::where('agent_status', 1)->update(['agent_status' => 0]);
        }

        $apiCredential->update([
            'bank_code' => $request->bank_code,
            'bank_name' => $request->bank_name,
            'bank_status' => $request->bank_status,
        ]);

        return response()->json(['success' => true, 'message' => 'Bank updated successfully']);
    }

    public function destroy($id)
    {
        Bank::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Bank deleted successfully']);
    }
}
