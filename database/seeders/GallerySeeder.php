<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create albums
        $album1 = Gallery::create([
            'title' => 'Kegiatan 2024',
            'description' => 'Dokumentasi kegiatan tahun 2024',
            'parent_id' => null,
        ]);

        $album2 = Gallery::create([
            'title' => 'Workshop',
            'description' => 'Foto-foto workshop dan pelatihan',
            'parent_id' => null,
        ]);

        $album3 = Gallery::create([
            'title' => 'Event',
            'description' => 'Event dan acara spesial',
            'parent_id' => null,
        ]);

        // Create items in albums (without actual images for now)
        // In real usage, users will upload actual images
        $this->command->info('Gallery albums created. Upload images through admin panel.');
    }
}
