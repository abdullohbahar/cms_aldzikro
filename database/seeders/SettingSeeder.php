<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'about_title',
                'value' => 'Tentang Kami',
                'type' => 'text',
                'description' => 'Judul halaman Tentang Kami',
            ],
            [
                'key' => 'about_content',
                'value' => '<p>Selamat datang di website kami. Kami adalah organisasi yang berkomitmen untuk memberikan pelayanan terbaik.</p>',
                'type' => 'html',
                'description' => 'Konten utama halaman Tentang Kami',
            ],
            [
                'key' => 'about_vision',
                'value' => 'Menjadi lembaga terdepan yang memberikan dampak positif bagi masyarakat.',
                'type' => 'text',
                'description' => 'Visi organisasi',
            ],
            [
                'key' => 'about_purpose',
                'value' => 'Memberikan pelayanan terbaik dan menciptakan lingkungan yang kondusif untuk pertumbuhan dan perkembangan.',
                'type' => 'text',
                'description' => 'Tujuan organisasi',
            ],
            [
                'key' => 'about_mission',
                'value' => "1. Memberikan pelayanan terbaik kepada masyarakat\n2. Meningkatkan kualitas sumber daya manusia\n3. Menjalin kerjasama dengan berbagai pihak",
                'type' => 'text',
                'description' => 'Misi organisasi',
            ],
            [
                'key' => 'about_image',
                'value' => null,
                'type' => 'image',
                'description' => 'Gambar untuk halaman Tentang Kami',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
