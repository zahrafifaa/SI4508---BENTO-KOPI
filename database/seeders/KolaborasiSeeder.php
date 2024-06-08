<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KolaborasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kolaborasi')->insert([
            [
                'nama' => 'adminCashier',
                'organisasi' => 'PT Teknologi Bersama',
                'jabatan' => 'Manager Proyek',
                'deskripsi_singkat' => 'Bertanggung jawab atas manajemen proyek IT',
                'tanggal' => '2024-06-03',
                'surat' => '12345',
                'email' => 'andi.pratama@example.com',
                'nomor' => '08123456789',
                'user_id' => 1,
                'status' => 1,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
