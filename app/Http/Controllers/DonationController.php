<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donations = Donation::latest()->paginate(15);
        return view('admin.donations.index', compact('donations'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        return view('admin.donations.show', compact('donation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,verified,cancelled',
        ]);

        $donation->update($validated);

        return redirect()->route('admin.donations.show', $donation)
            ->with('success', 'Status donasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        $donation->delete();

        return redirect()->route('admin.donations.index')
            ->with('success', 'Data donasi berhasil dihapus!');
    }
}
