<?php

namespace App\Http\Controllers;

use App\Models\BoardMember;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boardMembers = BoardMember::ordered()->paginate(12);
        return view('admin.board-members.index', compact('boardMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.board-members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        BoardMember::create([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return redirect()->route('admin.board-members.index')
            ->with('success', 'Pengurus berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoardMember $boardMember)
    {
        return view('admin.board-members.edit', compact('boardMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoardMember $boardMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $boardMember->update([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return redirect()->route('admin.board-members.index')
            ->with('success', 'Pengurus berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardMember $boardMember)
    {
        $boardMember->delete();

        return redirect()->route('admin.board-members.index')
            ->with('success', 'Pengurus berhasil dihapus!');
    }
}
