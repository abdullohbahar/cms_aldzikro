<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentRegistration;

class StudentRegistrationController extends Controller
{
    public function index()
    {
        $registrations = StudentRegistration::latest()->paginate(10);
        return view('admin.registrations.index', compact('registrations'));
    }

    public function show(StudentRegistration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }

    public function update(Request $request, StudentRegistration $registration)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $registration->update($validated);

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function destroy(StudentRegistration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.registrations.index')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
