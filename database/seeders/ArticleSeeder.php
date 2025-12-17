<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        if ($users->isEmpty() || $categories->isEmpty()) {
            $this->command->warn('Please run UserSeeder and CategorySeeder first!');
            return;
        }

        $articles = [
            [
                'title' => 'Selamat Datang di CMS Panti',
                'content' => '<h2>Selamat Datang!</h2><p>Ini adalah artikel pertama di CMS Panti. Sistem ini dilengkapi dengan <strong>CKEditor 5</strong> untuk editing yang mudah dan powerful.</p><p>Fitur-fitur yang tersedia:</p><ul><li>Manajemen Artikel dengan kategori</li><li>Galeri foto dengan struktur album</li><li>User management dengan role-based access</li><li>Rich text editor dengan upload gambar</li></ul>',
                'is_published' => true,
            ],
            [
                'title' => 'Panduan Menggunakan CMS',
                'content' => '<h2>Cara Menggunakan CMS</h2><p>CMS ini sangat mudah digunakan. Berikut adalah langkah-langkahnya:</p><ol><li>Login dengan akun yang telah diberikan</li><li>Pilih menu sesuai dengan role Anda</li><li>Buat konten dengan editor yang tersedia</li><li>Publish untuk menampilkan di website</li></ol><p>Untuk bantuan lebih lanjut, hubungi administrator.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Kegiatan Bulan Ini',
                'content' => '<h2>Kegiatan Bulan Ini</h2><p>Berikut adalah rangkaian kegiatan yang akan dilaksanakan bulan ini:</p><ul><li>Workshop Web Development</li><li>Pelatihan CMS</li><li>Gathering Tim</li></ul><p>Jangan lewatkan kegiatan menarik ini!</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Draft Artikel - Belum Dipublikasi',
                'content' => '<p>Ini adalah contoh artikel yang masih dalam status draft. Artikel ini tidak akan muncul di halaman publik sampai dipublikasikan.</p>',
                'is_published' => false,
            ],
        ];

        foreach ($articles as $index => $articleData) {
            Article::create([
                'title' => $articleData['title'],
                'slug' => Str::slug($articleData['title']),
                'content' => $articleData['content'],
                'is_published' => $articleData['is_published'],
                'user_id' => $users->random()->id,
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}
