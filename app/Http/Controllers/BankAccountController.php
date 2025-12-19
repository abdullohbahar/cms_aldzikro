<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankAccounts = BankAccount::latest()->paginate(15);
        return view('admin.bank-accounts.index', compact('bankAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bank-accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_holder' => 'required|string|max:255',
            'account_number' => 'required|string|max:50',
        ]);

        BankAccount::create($validated);

        return redirect()->route('admin.bank-accounts.index')
            ->with('success', 'Data rekening berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankAccount $bankAccount)
    {
        return view('admin.bank-accounts.edit', compact('bankAccount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankAccount $bankAccount)
    {
        $validated = $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_holder' => 'required|string|max:255',
            'account_number' => 'required|string|max:50',
        ]);

        $bankAccount->update($validated);

        return redirect()->route('admin.bank-accounts.index')
            ->with('success', 'Data rekening berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();

        return redirect()->route('admin.bank-accounts.index')
            ->with('success', 'Data rekening berhasil dihapus!');
    }
}
