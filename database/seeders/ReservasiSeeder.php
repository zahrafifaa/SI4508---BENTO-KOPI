<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'John Doe',
                'nomor_telepon' => '081234567890',
                'tanggal' => '2024-06-15',
                'jam' => '13:00:00',
                'jumlah_pengunjung' => 4,
                'status' => 'Pending',
                'user_id' => 1,
            ],
            [
                'nama' => 'Jane Doe',
                'nomor_telepon' => '081234567891',
                'tanggal' => '2024-06-20',
                'jam' => '15:00:00',
                'jumlah_pengunjung' => 6,
                'status' => 'Confirmed',
                'user_id' => 2,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Insert data into reservasi table
        DB::table('reservasi')->insert($data);
    }
}
