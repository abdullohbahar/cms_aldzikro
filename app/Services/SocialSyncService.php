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
        $rssUrl = Setting::get('instagram_rss_url');
        if (!$rssUrl) return 0;

        return $this->syncFromRSS($rssUrl, 'instagram');
    }

    public function syncFacebook()
    {
        $rssUrl = Setting::get('facebook_rss_url');
        if (!$rssUrl) return 0;

        return $this->syncFromRSS($rssUrl, 'facebook');
    }

    protected function syncFromRSS($url, $platform)
    {
        try {
            $response = Http::get($url);
            if ($response->failed()) return 0;

            $xml = simplexml_load_string($response->body());
            $items = $xml->channel->item ?? [];
            $count = 0;

            foreach ($items as $item) {
                // Parse media/thumbnail from media namespace or description
                $thumbnail = '';
                $description = (string)$item->description;
                if (preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $description, $matches)) {
                    $thumbnail = $matches['src'];
                }

                SocialPost::updateOrCreate(
                    ['platform' => $platform, 'post_id' => md5((string)$item->link)],
                    [
                        'title' => (string)$item->title,
                        'url' => (string)$item->link,
                        'thumbnail' => $thumbnail,
                        'posted_at' => \Carbon\Carbon::parse((string)$item->pubDate),
                    ]
                );
                $count++;
            }
            return $count;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function scrapeMetaData($url)
    {
        $response = Http::get($url);
        if ($response->failed()) throw new \Exception("Gagal mengakses link.");

        $html = $response->body();
        $title = '';
        $image = '';
        $platform = str_contains($url, 'instagram.com') ? 'instagram' : 'facebook';

        // Extract title (og:title, twitter:title, or title tag)
        if (preg_match('/<meta property="?og:title"? content="(?P<title>[^"]+)"/i', $html, $matches)) {
            $title = $matches['title'];
        } elseif (preg_match('/<meta name="?twitter:title"? content="(?P<title>[^"]+)"/i', $html, $matches)) {
            $title = $matches['title'];
        } elseif (preg_match('/<title>(?P<title>.+?)<\/title>/i', $html, $matches)) {
            $title = $matches['title'];
        }

        // Extract image (og:image or twitter:image)
        if (preg_match('/<meta property="?og:image"? content="(?P<image>[^"]+)"/i', $html, $matches)) {
            $image = $matches['image'];
        } elseif (preg_match('/<meta name="?twitter:image"? content="(?P<image>[^"]+)"/i', $html, $matches)) {
            $image = $matches['image'];
        }

        // Clean up title
        $title = html_entity_decode(strip_tags($title));
        $title = trim($title);

        return SocialPost::updateOrCreate(
            ['platform' => $platform, 'post_id' => md5($url)],
            [
                'title' => $title ?: ($platform == 'instagram' ? 'Postingan Instagram' : 'Postingan Facebook'),
                'url' => $url,
                'thumbnail' => $image,
                'posted_at' => now(),
            ]
        );
    }
}
