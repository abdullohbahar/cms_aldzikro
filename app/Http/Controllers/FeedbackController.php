<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(15);
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Feedback::create($validated);

        return redirect()->route('admin.feedbacks.index')
            ->with('success', 'Kritik & Saran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        return view('admin.feedbacks.show', compact('feedback'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('admin.feedbacks.index')
            ->with('success', 'Kritik & Saran berhasil dihapus!');
    }
}
