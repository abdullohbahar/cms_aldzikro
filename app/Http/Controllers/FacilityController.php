<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::latest()->paginate(12);
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('facilities', 'public');

        Facility::create([
            'name' => $validated['name'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            // Delete old image
            if ($facility->image_path && Storage::disk('public')->exists($facility->image_path)) {
                Storage::disk('public')->delete($facility->image_path);
            }

            // Store new image
            $imagePath = $request->file('image')->store('facilities', 'public');
            $validated['image_path'] = $imagePath;
        }

        $facility->update([
            'name' => $validated['name'],
            'image_path' => $validated['image_path'] ?? $facility->image_path,
        ]);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        // Delete image
        if ($facility->image_path && Storage::disk('public')->exists($facility->image_path)) {
            Storage::disk('public')->delete($facility->image_path);
        }

        $facility->delete();

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil dihapus!');
    }
}
