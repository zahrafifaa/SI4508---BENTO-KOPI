<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    public function run()
    {
        Branch::create([
            'name' => 'Bento Kopi Telkom Bandung',
            'address' => '2JJH+PM8, Jl. Mengger, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40267',
            'phone_number' => '0895335021186',
            'operational_hours' => '9.00 am - 1.00 am', 
            'facilities' => 'Musholla, Toilet, Ac Area, Smoking Area, Live Music, Card Games, Views'
        ]);

        Branch::create([
            'name' => 'Bento Kopi Jatinangor',
            'address' => 'Jl. Kolonel Ahmad Syam, Cikeruh, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363',
            'phone_number' => '081295107361',
            'operational_hours' => '9.00 am - 2.30 am', 
            'facilities' => 'Musholla, Toilet, Ac Area, Smoking Area, Live Music, Self Photo, Views'
        ]);

        Branch::create([
            'name' => 'Bento Kopi Cibiru',
            'address' => 'Jl. Panghegar No.34, Mekar Mulya, Kec. Panyileukan, Kota Bandung, Jawa Barat 40292',
            'phone_number' => '081215308205',
            'operational_hours' => '9.00 am - 12.30 am', 
            'facilities' => 'Musholla, Toilet, Ac Area, Smoking Area, Live Music, Views'
        ]);

        Branch::create([
            'name' => 'Bento Kopi Cimahi',
            'address' => '4H85+J39, Jl. HR. Danurasmaya, Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40513',
            'phone_number' => '081215308205',
            'operational_hours' => '9.00 am - 12.30 am', 
            'facilities' => 'Musholla, Toilet, Ac Area, Smoking Area, Live Music, Views'
        ]);
    }
}
