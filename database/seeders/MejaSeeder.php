<?php

namespace Database\Seeders;


use App\Models\Meja;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meja::create([
            'jenis' => 'No Smoking Area',
            'kode' => 'M001',
            'status' => '0',
            'jumlah_maksimal' => 4
        ]);
        Meja::create([
            'jenis' => 'No Smoking Area',
            'kode' => 'M002',
            'status' => '0',
            'jumlah_maksimal' => 4
        ]);
        Meja::create([
            'jenis' => 'No Smoking Area',
            'kode' => 'M003',
            'status' => '0',
            'jumlah_maksimal' => 6
        ]);
        Meja::create([
            'jenis' => 'No Smoking Area',
            'kode' => 'M004',
            'status' => '0',
            'jumlah_maksimal' => 10
        ]);
        Meja::create([
            'jenis' => 'No Smoking Area',
            'kode' => 'M005',
            'status' => '0',
            'jumlah_maksimal' => 2
        ]);

    }
}
