<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\SubProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::withCount('subPrograms')->latest()->paginate(12);
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'sub_programs' => 'nullable|array',
            'sub_programs.*' => 'required|string|max:255',
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('programs', 'public');

        // Create program
        $program = Program::create([
            'name' => $validated['name'],
            'image_path' => $imagePath,
        ]);

        // Create sub programs if provided
        if (isset($validated['sub_programs'])) {
            foreach ($validated['sub_programs'] as $subProgramName) {
                if (!empty($subProgramName)) {
                    SubProgram::create([
                        'program_id' => $program->id,
                        'name' => $subProgramName,
                    ]);
                }
            }
        }

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program Unggulan berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $program->load('subPrograms');
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'sub_programs' => 'nullable|array',
            'sub_programs.*' => 'required|string|max:255',
        ]);

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            // Delete old image
            if ($program->image_path && Storage::disk('public')->exists($program->image_path)) {
                Storage::disk('public')->delete($program->image_path);
            }

            // Store new image
            $imagePath = $request->file('image')->store('programs', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Update program
        $program->update([
            'name' => $validated['name'],
            'image_path' => $validated['image_path'] ?? $program->image_path,
        ]);

        // Delete all existing sub programs and create new ones
        $program->subPrograms()->delete();
        
        if (isset($validated['sub_programs'])) {
            foreach ($validated['sub_programs'] as $subProgramName) {
                if (!empty($subProgramName)) {
                    SubProgram::create([
                        'program_id' => $program->id,
                        'name' => $subProgramName,
                    ]);
                }
            }
        }

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program Unggulan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        // Delete image
        if ($program->image_path && Storage::disk('public')->exists($program->image_path)) {
            Storage::disk('public')->delete($program->image_path);
        }

        // Delete program (sub programs will be cascade deleted)
        $program->delete();

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program Unggulan berhasil dihapus!');
    }
}
