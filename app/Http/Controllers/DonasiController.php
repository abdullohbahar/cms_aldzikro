<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BankAccount;
use App\Models\Setting;

use App\Models\Donation;

class DonasiController extends Controller
{
    public function index()
    {
        $bankAccounts = BankAccount::all();
        $qrisImage = Setting::get('qris_image');
        return view('donation_form', compact('bankAccounts', 'qrisImage'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'amount' => 'required|string',
            'items' => 'nullable|string',
        ]);

        Donation::create($validated);

        return redirect()->back()->with('success', 'Terima kasih! Konfirmasi donasi Anda telah kami terima.');
    }

    public function panduan()
    {
        $bankAccounts = BankAccount::all();
        $phone = Setting::get('organization_phone', '[Nomor Kontak]');
        $address = Setting::get('organization_address', 'Manggung, Wukirsari, Imogiri, Bantul');
        
        return view('donation_guide', compact('bankAccounts', 'phone', 'address'));
    }
}
