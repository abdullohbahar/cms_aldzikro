<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StudentRegistration;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration_form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:L,P',
            'address' => 'required|string',
            'guardian_name' => 'required|string|max:255',
            'guardian_phone' => 'required|string|max:20',
        ]);

        StudentRegistration::create($validated);

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim. Kami akan segera menghubungi Anda.');
    }
}
