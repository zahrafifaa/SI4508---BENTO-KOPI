<?php

namespace Database\Seeders;

use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'nama' => 'Cabang 1',
            'alamat' => 'Bandung',
            'gambar' => NULL,
            'jam_buka' => Carbon::now()->format('H'),
            'jam_tutup' => Carbon::now()->format('H')
        ]);

        Location::create([
            'nama' => 'Cabang 2',
            'alamat' => 'Jakarta',
            'gambar' => NULL,
            'jam_buka' => Carbon::now()->format('H'),
            'jam_tutup' => Carbon::now()->format('H')
        ]);
        Location::create([
            'nama' => 'Cabang 3',
            'alamat' => 'Makasar',
            'gambar' => NULL,
            'jam_buka' => Carbon::now()->format('H'),
            'jam_tutup' => Carbon::now()->format('H')
        ]);
    }
}
