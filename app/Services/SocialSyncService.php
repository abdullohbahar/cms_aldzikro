<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\SocialPost;
use Illuminate\Support\Facades\Http;

class SocialSyncService
{
    public function syncYouTube()
    {
        $apiKey = Setting::get('youtube_api_key');
        $channelId = Setting::get('youtube_channel_id');

        if (!$apiKey || !$channelId) return 0;

        $response = Http::get("https://www.googleapis.com/youtube/v3/search", [
            'part' => 'snippet',
            'channelId' => $channelId,
            'maxResults' => 10,
            'order' => 'date',
            'type' => 'video',
            'key' => $apiKey,
        ]);

        if ($response->failed()) {
            throw new \Exception("YouTube API Error: " . ($response->json()['error']['message'] ?? 'Unknown Error'));
        }

        $items = $response->json()['items'] ?? [];
        $count = 0;

        foreach ($items as $item) {
            $postId = $item['id']['videoId'];
            SocialPost::updateOrCreate(
                ['platform' => 'youtube', 'post_id' => $postId],
                [
                    'title' => $item['snippet']['title'],
                    'url' => "https://www.youtube.com/watch?v=$postId",
                    'thumbnail' => $item['snippet']['thumbnails']['high']['url'] ?? $item['snippet']['thumbnails']['default']['url'],
                    'posted_at' => \Carbon\Carbon::parse($item['snippet']['publishedAt']),
                ]
            );
            $count++;
        }

        return $count;
    }

    public function syncInstagram()
    {
        $token = Setting::get('instagram_access_token');
        if (!$token) return 0;

        $response = Http::get("https://graph.instagram.com/me/media", [
            'fields' => 'id,caption,media_type,media_url,permalink,timestamp,thumbnail_url',
            'access_token' => $token,
        ]);

        if ($response->failed()) {
            // Handle token refresh logic here if needed or just throw
            throw new \Exception("Instagram API Error: " . ($response->json()['error']['message'] ?? 'Unknown Error'));
        }

        $items = $response->json()['data'] ?? [];
        $count = 0;

        foreach ($items as $item) {
            SocialPost::updateOrCreate(
                ['platform' => 'instagram', 'post_id' => $item['id']],
                [
                    'title' => $item['caption'] ?? null,
                    'url' => $item['permalink'],
                    'thumbnail' => $item['media_type'] === 'VIDEO' ? ($item['thumbnail_url'] ?? $item['media_url']) : $item['media_url'],
                    'posted_at' => \Carbon\Carbon::parse($item['timestamp']),
                ]
            );
            $count++;
        }

        return $count;
    }
}
