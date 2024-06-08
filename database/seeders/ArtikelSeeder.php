<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artikel::create([
            'judul' => 'Judul Artikel Satu',
            'slug' => 'judul-artikel-satu',
            'deskripsi_singkat' => 'Deskripsi singkat artikel satu membahas mengenai minuman yang paling populer dan banyak diminati',
            'kategori_artikel_id' => KategoriArtikel::inRandomOrder()->first()->id,
            'deskripsi' => 'kafe yang menghadirkan pengalaman kuliner yang unik dan menyenangkan. Bento Kopi menawarkan lingkungan yang nyaman dan estetis bagi para pengunjung untuk menikmati waktu bersama keluarga dan teman-teman mereka.',
            'gambar' => NULL
        ]);
        Artikel::create([
            'judul' => 'Judul Artikel dua',
            'slug' => 'judul-artikel-dua',
            'deskripsi_singkat' => 'Deskripsi singkat artikel dua membahas mengenai minuman yang paling populer dan banyak diminati',
            'kategori_artikel_id' => KategoriArtikel::inRandomOrder()->first()->id,
            'deskripsi' => 'kafe yang menghadirkan pengalaman kuliner yang unik dan menyenangkan. Bento Kopi menawarkan lingkungan yang nyaman dan estetis bagi para pengunjung untuk menikmati waktu bersama keluarga dan teman-teman mereka.',
            'gambar' => NULL
        ]);
        Artikel::create([
            'judul' => 'Judul Artikel tiga',
            'slug' => 'judul-artikel-tiga',
            'deskripsi_singkat' => 'Deskripsi singkat artikel tiga membahas mengenai minuman yang paling populer dan banyak diminati',
            'kategori_artikel_id' => KategoriArtikel::inRandomOrder()->first()->id,
            'deskripsi' => 'kafe yang menghadirkan pengalaman kuliner yang unik dan menyenangkan. Bento Kopi menawarkan lingkungan yang nyaman dan estetis bagi para pengunjung untuk menikmati waktu bersama keluarga dan teman-teman mereka.',
            'gambar' => NULL
        ]);
        Artikel::create([
            'judul' => 'Judul Artikel empat',
            'slug' => 'judul-artikel-empat',
            'deskripsi_singkat' => 'Deskripsi singkat artikel empat membahas mengenai minuman yang paling populer dan banyak diminati',
            'kategori_artikel_id' => KategoriArtikel::inRandomOrder()->first()->id,
            'deskripsi' => 'kafe yang menghadirkan pengalaman kuliner yang unik dan menyenangkan. Bento Kopi menawarkan lingkungan yang nyaman dan estetis bagi para pengunjung untuk menikmati waktu bersama keluarga dan teman-teman mereka.',
            'gambar' => NULL
        ]);
        Artikel::create([
            'judul' => 'Judul Artikel lima',
            'slug' => 'judul-artikel-lima',
            'deskripsi_singkat' => 'Deskripsi singkat artikel lima membahas mengenai minuman yang paling populer dan banyak diminati',
            'kategori_artikel_id' => KategoriArtikel::inRandomOrder()->first()->id,
            'deskripsi' => 'kafe yang menghadirkan pengalaman kuliner yang unik dan menyenangkan. Bento Kopi menawarkan lingkungan yang nyaman dan estetis bagi para pengunjung untuk menikmati waktu bersama keluarga dan teman-teman mereka.',
            'gambar' => NULL
        ]);
        Artikel::create([
            'judul' => 'Judul Artikel enam',
            'slug' => 'judul-artikel-enam',
            'deskripsi_singkat' => 'Deskripsi singkat artikel enam membahas mengenai minuman yang paling populer dan banyak diminati',
            'kategori_artikel_id' => KategoriArtikel::inRandomOrder()->first()->id,
            'deskripsi' => 'kafe yang menghadirkan pengalaman kuliner yang unik dan menyenangkan. Bento Kopi menawarkan lingkungan yang nyaman dan estetis bagi para pengunjung untuk menikmati waktu bersama keluarga dan teman-teman mereka.',
            'gambar' => NULL
        ]);
        Artikel::create([
            'judul' => 'Judul Artikel tujuh',
            'slug' => 'judul-artikel-tujuh',
            'deskripsi_singkat' => 'Deskripsi singkat artikel tujuh membahas mengenai minuman yang paling populer dan banyak diminati',
            'kategori_artikel_id' => KategoriArtikel::inRandomOrder()->first()->id,
            'deskripsi' => 'kafe yang menghadirkan pengalaman kuliner yang unik dan menyenangkan. Bento Kopi menawarkan lingkungan yang nyaman dan estetis bagi para pengunjung untuk menikmati waktu bersama keluarga dan teman-teman mereka.',
            'gambar' => NULL
        ]);
        Artikel::create([
            'judul' => 'Judul Artikel delapan',
            'slug' => 'judul-artikel-delapan',
            'deskripsi_singkat' => 'Deskripsi singkat artikel delapan membahas mengenai minuman yang paling populer dan banyak diminati',
            'kategori_artikel_id' => KategoriArtikel::inRandomOrder()->first()->id,
            'deskripsi' => 'kafe yang menghadirkan pengalaman kuliner yang unik dan menyenangkan. Bento Kopi menawarkan lingkungan yang nyaman dan estetis bagi para pengunjung untuk menikmati waktu bersama keluarga dan teman-teman mereka.',
            'gambar' => NULL
        ]);
        Artikel::create([
            'judul' => 'Judul Artikel sembilan',
            'slug' => 'judul-artikel-sembilan',
            'deskripsi_singkat' => 'Deskripsi singkat artikel sembilan membahas mengenai minuman yang paling populer dan banyak diminati',
            'kategori_artikel_id' => KategoriArtikel::inRandomOrder()->first()->id,
            'deskripsi' => 'kafe yang menghadirkan pengalaman kuliner yang unik dan menyenangkan. Bento Kopi menawarkan lingkungan yang nyaman dan estetis bagi para pengunjung untuk menikmati waktu bersama keluarga dan teman-teman mereka.',
            'gambar' => NULL
        ]);
    }
}