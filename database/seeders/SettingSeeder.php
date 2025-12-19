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
            [
                'key' => 'chairman_video_type',
                'value' => 'embed',
                'type' => 'text',
                'description' => 'Tipe video sambutan ketua: embed atau upload',
            ],
            [
                'key' => 'chairman_video_url',
                'value' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'type' => 'text',
                'description' => 'URL YouTube untuk sambutan ketua',
            ],
            [
                'key' => 'chairman_video_path',
                'value' => null,
                'type' => 'video',
                'description' => 'Path video upload untuk sambutan ketua',
            ],
            [
                'key' => 'chairman_description',
                'value' => '<p>Selamat datang di website kami. Saya sebagai ketua menyampaikan terima kasih atas kunjungan Anda.</p>',
                'type' => 'html',
                'description' => 'Keterangan sambutan ketua',
            ],
            [
                'key' => 'organization_address',
                'value' => 'Jl. Contoh No. 123, Jakarta Selatan',
                'type' => 'text',
                'description' => 'Alamat organisasi',
            ],
            [
                'key' => 'organization_email',
                'value' => 'info@example.com',
                'type' => 'text',
                'description' => 'Email organisasi',
            ],
            [
                'key' => 'organization_phone',
                'value' => '021-12345678',
                'type' => 'text',
                'description' => 'Nomor telepon organisasi',
            ],
            [
                'key' => 'qris_image',
                'value' => null,
                'type' => 'image',
                'description' => 'Gambar QRIS untuk pembayaran',
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
