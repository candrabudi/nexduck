<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BankAccountController extends Controller
{
    // Menampilkan daftar bank account
    public function index()
    {
        $bankAccounts = BankAccount::with('bank')->get(); // Mengambil semua bank account beserta bank terkait
        $banks = Bank::all(); // Mengambil semua bank untuk dropdown
        return view('backend.bank_accounts.index', compact('bankAccounts', 'banks'));
    }

    // Menampilkan form untuk menambah bank account baru
    public function create()
    {
        $banks = Bank::all(); // Mengambil semua bank untuk dropdown
        return view('backend.bank_accounts.create', compact('banks'));
    }

    // Menyimpan bank account baru
    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'bank_id' => 'required|exists:banks,id',
            'account_status' => 'required|in:0,1',
            'account_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan file gambar jika ada
        if ($request->hasFile('account_image')) {
            $imagePath = $request->file('account_image')->store('bank_account_images', 'public');
        } else {
            $imagePath = null;
        }

        // Menyimpan data bank account ke database
        BankAccount::create([
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'bank_id' => $request->bank_id,
            'account_status' => $request->account_status,
            'account_image' => $imagePath,
        ]);

        return redirect()->route('backoffice.bank-accounts.index')->with('success', 'Bank Account created successfully');
    }

    // Menampilkan form untuk mengedit bank account
    public function edit(BankAccount $bankAccount)
    {
        $banks = Bank::all(); // Mengambil semua bank untuk dropdown
        return view('backend.bank_accounts.edit', compact('bankAccount', 'banks'));
    }

    // Memperbarui bank account yang sudah ada
    public function update(Request $request, BankAccount $bankAccount)
    {
        $request->validate([
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'bank_id' => 'required|exists:banks,id',
            'account_status' => 'required|in:0,1',
            'account_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan gambar baru jika ada
        if ($request->hasFile('account_image')) {
            // Menghapus gambar lama jika ada
            if ($bankAccount->account_image && Storage::exists('public/' . $bankAccount->account_image)) {
                Storage::delete('public/' . $bankAccount->account_image);
            }
            // Menyimpan gambar baru
            $imagePath = $request->file('account_image')->store('bank_account_images', 'public');
        } else {
            $imagePath = $bankAccount->account_image; // Jika tidak ada gambar baru, gunakan gambar lama
        }

        // Memperbarui data bank account
        $bankAccount->update([
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'bank_id' => $request->bank_id,
            'account_status' => $request->account_status,
            'account_image' => $imagePath,
        ]);

        return redirect()->route('backoffice.bank-accounts.index')->with('success', 'Bank Account updated successfully');
    }

    // Menghapus bank account
    public function destroy(BankAccount $bankAccount)
    {
        // Menghapus gambar terkait jika ada
        if ($bankAccount->account_image && Storage::exists('public/' . $bankAccount->account_image)) {
            Storage::delete('public/' . $bankAccount->account_image);
        }

        // Menghapus data bank account
        $bankAccount->delete();

        return redirect()->route('backoffice.bank-accounts.index')->with('success', 'Bank Account deleted successfully');
    }
}
