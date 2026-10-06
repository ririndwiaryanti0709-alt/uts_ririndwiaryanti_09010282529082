<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // DATA KATEGORI
        // =========================

        $novel = Category::create([
            'name' => 'Novel',
            'description' => 'Kategori buku cerita dan novel.',
        ]);

        $teknologi = Category::create([
            'name' => 'Teknologi',
            'description' => 'Kategori buku tentang teknologi dan pemrograman.',
        ]);

        $pendidikan = Category::create([
            'name' => 'Pendidikan',
            'description' => 'Kategori buku untuk pembelajaran dan pendidikan.',
        ]);

        // =========================
        // 5 BUKU KATEGORI NOVEL
        // =========================

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'year' => 2005,
            'stock' => 10,
        ]);

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Bumi',
            'author' => 'Tere Liye',
            'publisher' => 'Gramedia Pustaka Utama',
            'year' => 2014,
            'stock' => 8,
        ]);

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Negeri 5 Menara',
            'author' => 'Ahmad Fuadi',
            'publisher' => 'Gramedia Pustaka Utama',
            'year' => 2009,
            'stock' => 7,
        ]);

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Ayat-Ayat Cinta',
            'author' => 'Habiburrahman El Shirazy',
            'publisher' => 'Republika',
            'year' => 2004,
            'stock' => 6,
        ]);

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Perahu Kertas',
            'author' => 'Dee Lestari',
            'publisher' => 'Bentang Pustaka',
            'year' => 2009,
            'stock' => 9,
        ]);

        // =========================
        // 5 BUKU KATEGORI TEKNOLOGI
        // =========================

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Dasar Pemrograman Web',
            'author' => 'Abdul Kadir',
            'publisher' => 'Andi',
            'year' => 2020,
            'stock' => 6,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Belajar PHP Dasar',
            'author' => 'Rosa A.S.',
            'publisher' => 'Informatika',
            'year' => 2021,
            'stock' => 7,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Pemrograman Java',
            'author' => 'Budi Raharjo',
            'publisher' => 'Informatika',
            'year' => 2020,
            'stock' => 8,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Dasar-Dasar Database',
            'author' => 'Fathansyah',
            'publisher' => 'Informatika',
            'year' => 2019,
            'stock' => 5,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Pengantar Sistem Informasi',
            'author' => 'Kusrini',
            'publisher' => 'Andi',
            'year' => 2021,
            'stock' => 6,
        ]);

        // =========================
        // 5 BUKU KATEGORI PENDIDIKAN
        // =========================

        Book::create([
            'category_id' => $pendidikan->id,
            'title' => 'Belajar dan Pembelajaran',
            'author' => 'Dimyati',
            'publisher' => 'Rineka Cipta',
            'year' => 2019,
            'stock' => 5,
        ]);

        Book::create([
            'category_id' => $pendidikan->id,
            'title' => 'Strategi Pembelajaran',
            'author' => 'Wina Sanjaya',
            'publisher' => 'Kencana',
            'year' => 2018,
            'stock' => 7,
        ]);

        Book::create([
            'category_id' => $pendidikan->id,
            'title' => 'Psikologi Pendidikan',
            'author' => 'Muhibbin Syah',
            'publisher' => 'Remaja Rosdakarya',
            'year' => 2020,
            'stock' => 6,
        ]);

        Book::create([
            'category_id' => $pendidikan->id,
            'title' => 'Metodologi Penelitian Pendidikan',
            'author' => 'Sugiyono',
            'publisher' => 'Alfabeta',
            'year' => 2021,
            'stock' => 8,
        ]);

        Book::create([
            'category_id' => $pendidikan->id,
            'title' => 'Dasar-Dasar Pendidikan',
            'author' => 'Hasbullah',
            'publisher' => 'Rajawali Pers',
            'year' => 2019,
            'stock' => 5,
        ]);

        // =========================
        // AKUN LOGIN
        // =========================

        User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'ririndwiaryanti@gmail.com',
            'password' => Hash::make('adminperpus'),
        ]);
    }
}