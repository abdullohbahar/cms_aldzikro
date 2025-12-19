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

    /**
     * Show the form for editing Chairman's Welcome
     */
    public function chairmanEdit()
    {
        $videoType = Setting::get('chairman_video_type', 'embed');
        $videoUrl = Setting::get('chairman_video_url', '');
        $videoPath = Setting::get('chairman_video_path', null);
        $description = Setting::get('chairman_description', '');

        return view('admin.settings.chairman', compact('videoType', 'videoUrl', 'videoPath', 'description'));
    }

    /**
     * Update Chairman's Welcome
     */
    public function chairmanUpdate(Request $request)
    {
        $validated = $request->validate([
            'chairman_video_type' => 'required|in:embed,upload',
            'chairman_video_url' => 'required_if:chairman_video_type,embed|nullable|url',
            'chairman_video_file' => 'required_if:chairman_video_type,upload|nullable|file|mimes:mp4,mov,avi,wmv|max:51200', // 50MB
            'chairman_description' => 'nullable|string',
        ]);

        // Save video type
        Setting::set('chairman_video_type', $validated['chairman_video_type'], 'text', 'Tipe video sambutan ketua');

        // Handle video based on type
        if ($validated['chairman_video_type'] === 'embed') {
            // Save YouTube URL
            Setting::set('chairman_video_url', $validated['chairman_video_url'] ?? '', 'text', 'URL YouTube untuk sambutan ketua');
            // Clear video path if exists
            $oldVideo = Setting::get('chairman_video_path');
            if ($oldVideo && Storage::disk('public')->exists($oldVideo)) {
                Storage::disk('public')->delete($oldVideo);
            }
            Setting::set('chairman_video_path', null, 'video', 'Path video upload untuk sambutan ketua');
        } else {
            // Handle video upload
            if ($request->hasFile('chairman_video_file')) {
                // Delete old video if exists
                $oldVideo = Setting::get('chairman_video_path');
                if ($oldVideo && Storage::disk('public')->exists($oldVideo)) {
                    Storage::disk('public')->delete($oldVideo);
                }

                // Store new video
                $videoPath = $request->file('chairman_video_file')->store('chairman', 'public');
                Setting::set('chairman_video_path', $videoPath, 'video', 'Path video upload untuk sambutan ketua');
            }
            // Clear YouTube URL
            Setting::set('chairman_video_url', '', 'text', 'URL YouTube untuk sambutan ketua');
        }

        // Save description
        Setting::set('chairman_description', $validated['chairman_description'] ?? '', 'html', 'Keterangan sambutan ketua');

        return redirect()->route('admin.settings.chairman')
            ->with('success', 'Sambutan Ketua berhasil diupdate!');
    }

    /**
     * Show the form for editing Organization Contact
     */
    public function organizationEdit()
    {
        $address = Setting::get('organization_address', '');
        $email = Setting::get('organization_email', '');
        $phone = Setting::get('organization_phone', '');

        return view('admin.settings.organization', compact('address', 'email', 'phone'));
    }

    /**
     * Update Organization Contact
     */
    public function organizationUpdate(Request $request)
    {
        $validated = $request->validate([
            'organization_address' => 'required|string',
            'organization_email' => 'required|email',
            'organization_phone' => 'required|string|max:20',
        ]);

        Setting::set('organization_address', $validated['organization_address'], 'text', 'Alamat organisasi');
        Setting::set('organization_email', $validated['organization_email'], 'text', 'Email organisasi');
        Setting::set('organization_phone', $validated['organization_phone'], 'text', 'Nomor telepon organisasi');

        return redirect()->route('admin.settings.organization')
            ->with('success', 'Kontak Organisasi berhasil diupdate!');
    }
}
