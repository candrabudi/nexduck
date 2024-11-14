<?php

namespace App\Http\Controllers\Backoffice;

use App\Helpers\AesEncryptionHelper;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function index()
    {
        try {
            $accounts = BankAccount::all();
            $banks = Bank::all();
            return view('backend.bankaccount.index', compact('accounts', 'banks'));
        } catch (\Exception $e) {
            // Return a better error message for debugging
            return abort(413, 'Failed to load bank accounts.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'account_status' => 'required|in:0,1',
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255|unique:bank_accounts,account_number',
            'account_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi gambar
        ]);

        // Cek jika ada akun lain dengan nama atau nomor yang sama
        $existingAccount = BankAccount::where('account_name', $request->account_name)
            ->orWhere('account_number', $request->account_number)
            ->first();

        if ($existingAccount) {
            return response()->json(['success' => false, 'message' => 'Account with the same name or number already exists.'], 400);
        }

        // Simpan data akun
        $bankAccount = BankAccount::create($request->all());

        // Jika ada gambar yang diupload
        if ($request->hasFile('account_image')) {
            // Simpan gambar
            $imagePath = $request->file('account_image')->store('account_images', 'public');
            $imageUrl = asset('storage/' . $imagePath);

            // Update gambar di bankAccount
            $bankAccount->account_image = $imageUrl;
            $bankAccount->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'BankAccount created successfully',
            'account_image' => $bankAccount->account_image // Kembalikan URL gambar
        ]);
    }


    public function edit($accountId)
    {
        try {
            $bankAccount = BankAccount::findOrFail($accountId);
            return response()->json(['apiCredential' => $bankAccount]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Account not found.'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'account_status' => 'required|in:0,1',
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255|unique:bank_accounts,account_number,' . $id,
            'account_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi gambar
        ]);

        // Cek jika ada akun lain dengan nama atau nomor yang sama
        $existingAccount = BankAccount::where('id', '!=', $id)
            ->where(function ($query) use ($request) {
                $query->where('account_name', $request->account_name)
                    ->orWhere('account_number', $request->account_number);
            })
            ->first();

        if ($existingAccount) {
            return response()->json(['success' => false, 'message' => 'Account with the same name or number already exists.'], 400);
        }

        $bankAccount = BankAccount::findOrFail($id);

        // Update field yang diperlukan
        $bankAccount->update($request->only(['bank_id', 'account_name', 'account_number', 'account_status']));

        // Jika ada gambar yang diupload
        if ($request->hasFile('account_image')) {
            // Simpan gambar
            $imagePath = $request->file('account_image')->store('account_images', 'public');
            $imageUrl = asset('storage/' . $imagePath);

            // Update gambar di bankAccount
            $bankAccount->account_image = $imageUrl;
            $bankAccount->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'BankAccount updated successfully',
            'account_image' => $bankAccount->account_image // Kembalikan URL gambar
        ]);
    }


    public function destroy($id)
    {
        try {
            $bankAccount = BankAccount::findOrFail($id);
            $bankAccount->delete();
            return response()->json(['success' => true, 'message' => 'BankAccount deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete BankAccount.'], 400);
        }
    }
}
