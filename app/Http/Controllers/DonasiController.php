<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BankAccount;
use App\Models\Setting;

class DonasiController extends Controller
{
    public function panduan()
    {
        $bankAccounts = BankAccount::all();
        $phone = Setting::get('organization_phone', '[Nomor Kontak]');
        $address = Setting::get('organization_address', 'Manggung, Wukirsari, Imogiri, Bantul');
        
        return view('donation_guide', compact('bankAccounts', 'phone', 'address'));
    }
}
