<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SocialSyncService;

class SyncSocialMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'social:sync';
    protected $description = 'Sync YouTube videos and Instagram posts';

    public function handle(SocialSyncService $syncService)
    {
        $this->info('Starting Social Media Sync...');

        try {
            $youtubeCount = $syncService->syncYouTube();
            $this->comment("YouTube Sync: $youtubeCount videos added/updated.");

            $instagramCount = $syncService->syncInstagram();
            $this->comment("Instagram Sync: $instagramCount posts added/updated.");

            $this->info('Sync completed successfully!');
        } catch (\Exception $e) {
            $this->error('Sync failed: ' . $e->getMessage());
        }
    }
}
