<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Show the form for editing About Us content (without vision/mission)
     */
    public function aboutEdit()
    {
        $content = Setting::get('about_content', '');
        $image = Setting::get('about_image', null);

        return view('admin.settings.about', compact('content', 'image'));
    }

    /**
     * Update About Us content (without vision/mission)
     */
    public function aboutUpdate(Request $request)
    {
        $validated = $request->validate([
            'about_content' => 'required|string',
            'about_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('about_image')) {
            // Delete old image if exists
            $oldImage = Setting::get('about_image');
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }

            // Store new image
            $imagePath = $request->file('about_image')->store('about', 'public');
            Setting::set('about_image', $imagePath, 'image', 'Gambar untuk halaman Tentang Kami');
        }

        // Save settings with default title
        Setting::set('about_title', 'Tentang Kami', 'text', 'Judul halaman Tentang Kami');
        Setting::set('about_content', $validated['about_content'], 'html', 'Konten utama halaman Tentang Kami');

        return redirect()->route('admin.settings.about')
            ->with('success', 'Konten Tentang Kami berhasil diupdate!');
    }

    /**
     * Show the form for editing Vision and Mission
     */
    public function visionMissionEdit()
    {
        $vision = Setting::get('about_vision', '');
        $purpose = Setting::get('about_purpose', '');
        $mission = Setting::get('about_mission', '');

        return view('admin.settings.vision-mission', compact('vision', 'purpose', 'mission'));
    }

    /**
     * Update Vision and Mission
     */
    public function visionMissionUpdate(Request $request)
    {
        $validated = $request->validate([
            'about_vision' => 'nullable|string',
            'about_purpose' => 'nullable|string',
            'about_mission' => 'nullable|string',
        ]);

        Setting::set('about_vision', $validated['about_vision'] ?? '', 'text', 'Visi organisasi');
        Setting::set('about_purpose', $validated['about_purpose'] ?? '', 'text', 'Tujuan organisasi');
        Setting::set('about_mission', $validated['about_mission'] ?? '', 'text', 'Misi organisasi');

        return redirect()->route('admin.settings.vision-mission')
            ->with('success', 'Visi & Misi berhasil diupdate!');
    }
}
