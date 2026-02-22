<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\SocialPost;
use App\Services\SocialSyncService;

class SocialMediaController extends Controller
{
    public function index()
    {
        $posts = SocialPost::latest('posted_at')->paginate(12);
        return view('admin.social-media.index', compact('posts'));
    }

    public function settings()
    {
        $settings = [
            'youtube_channel_id' => Setting::get('youtube_channel_id'),
            'youtube_api_key' => Setting::get('youtube_api_key'),
            'instagram_access_token' => Setting::get('instagram_access_token'),
            'instagram_user_id' => Setting::get('instagram_user_id'),
        ];
        return view('admin.social-media.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'youtube_channel_id' => 'nullable|string',
            'youtube_api_key' => 'nullable|string',
            'instagram_access_token' => 'nullable|string',
            'instagram_user_id' => 'nullable|string',
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->back()->with('success', 'Pengaturan media sosial berhasil diperbarui.');
    }

    public function sync(SocialSyncService $syncService)
    {
        try {
            $youtubeCount = $syncService->syncYouTube();
            $instagramCount = $syncService->syncInstagram();

            return redirect()->back()->with('success', "Sinkronisasi berhasil! Tarik $youtubeCount video YouTube dan $instagramCount postingan Instagram.");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal sinkronisasi: ' . $e->getMessage());
        }
    }

    public function toggle(SocialPost $post)
    {
        $post->update(['is_active' => !$post->is_active]);
        return redirect()->back()->with('success', 'Status postingan berhasil diubah.');
    }

    public function destroy(SocialPost $post)
    {
        $post->delete();
        return redirect()->back()->with('success', 'Postingan berhasil dihapus.');
    }
}
