<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(12);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        // Handle photo upload
        $photoPath = $request->file('photo')->store('testimonials', 'public');

        Testimonial::create([
            'photo_path' => $photoPath,
            'name' => $validated['name'],
            'position' => $validated['position'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        // Handle photo upload if new photo provided
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($testimonial->photo_path && Storage::disk('public')->exists($testimonial->photo_path)) {
                Storage::disk('public')->delete($testimonial->photo_path);
            }

            // Store new photo
            $photoPath = $request->file('photo')->store('testimonials', 'public');
            $validated['photo_path'] = $photoPath;
        }

        $testimonial->update([
            'photo_path' => $validated['photo_path'] ?? $testimonial->photo_path,
            'name' => $validated['name'],
            'position' => $validated['position'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete photo
        if ($testimonial->photo_path && Storage::disk('public')->exists($testimonial->photo_path)) {
            Storage::disk('public')->delete($testimonial->photo_path);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil dihapus!');
    }
}
