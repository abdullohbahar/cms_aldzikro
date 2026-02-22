<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Beneficiary;

class BeneficiaryController extends Controller
{
    /** Admin Area **/

    public function index()
    {
        $beneficiaries = Beneficiary::latest()->paginate(10);
        return view('admin.beneficiaries.index', compact('beneficiaries'));
    }

    public function create()
    {
        return view('admin.beneficiaries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:L,P',
            'type' => 'required|string|in:santri_dalam,santri_luar,lansia',
        ]);

        Beneficiary::create($validated);

        return redirect()->route('admin.beneficiaries.index')->with('success', 'Data penerima santunan berhasil ditambahkan.');
    }

    public function edit(Beneficiary $beneficiary)
    {
        return view('admin.beneficiaries.edit', compact('beneficiary'));
    }

    public function update(Request $request, Beneficiary $beneficiary)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:L,P',
            'type' => 'required|string|in:santri_dalam,santri_luar,lansia',
        ]);

        $beneficiary->update($validated);

        return redirect()->route('admin.beneficiaries.index')->with('success', 'Data penerima santunan berhasil diperbarui.');
    }

    public function destroy(Beneficiary $beneficiary)
    {
        $beneficiary->delete();
        return redirect()->route('admin.beneficiaries.index')->with('success', 'Data penerima santunan berhasil dihapus.');
    }

    /** Public Area **/

    public function publicIndex()
    {
        $santriDalam = Beneficiary::where('type', 'santri_dalam')->orderBy('name')->paginate(10, ['*'], 'panti_page');
        $santriLuar = Beneficiary::where('type', 'santri_luar')->orderBy('name')->paginate(10, ['*'], 'luar_page');
        $lansia = Beneficiary::where('type', 'lansia')->orderBy('name')->paginate(10, ['*'], 'lansia_page');

        return view('beneficiaries', compact('santriDalam', 'santriLuar', 'lansia'));
    }
}
