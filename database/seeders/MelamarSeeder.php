<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MelamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'lowongan_id' => 1,
                'user_id' => 1,
                'nama' => 'John Doe',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-05-15',
                'alamat' => 'Jl. Contoh No. 123',
                'nomor_hp' => '081234567890',
                'email' => 'john.doe@example.com',
                'pengalaman_kerja' => 5,
                'cv' => 'cv_john_doe.pdf',
                'foto' => 'foto_john_doe.jpg',
                'status' => 'Belum ditinjau',
            ],
            [
                'lowongan_id' => 2,
                'user_id' => 2,
                'nama' => 'Jane Doe',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1992-10-20',
                'alamat' => 'Jl. Contoh No. 456',
                'nomor_hp' => '081234567891',
                'email' => 'jane.doe@example.com',
                'pengalaman_kerja' => 3,
                'cv' => 'cv_jane_doe.pdf',
                'foto' => 'foto_jane_doe.jpg',
                'status' => 'Belum ditinjau',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Insert data into melamar table
        DB::table('melamar')->insert($data);
    }
}
