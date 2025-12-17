<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileManagerController extends Controller
{
    /**
     * Upload file for TinyMCE
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('editor', 'public');
            
            return response()->json([
                'location' => asset('storage/' . $path)
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    /**
     * List uploaded files for file manager
     */
    public function list()
    {
        $files = Storage::disk('public')->files('editor');
        
        $fileList = array_map(function($file) {
            return [
                'title' => basename($file),
                'value' => asset('storage/' . $file),
            ];
        }, $files);

        return response()->json($fileList);
    }
}
