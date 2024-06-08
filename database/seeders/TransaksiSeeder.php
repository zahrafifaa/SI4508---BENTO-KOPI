<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'ordertable_id' => 1,
                'cartitemorder_id' => 1,
                'qty' => 2,
                'total_price' => 20000,
                'status' => 'Unpaid',
                'status_pemesanan' => 'Belum diproses',
            ],
            [
                'ordertable_id' => 2,
                'cartitemorder_id' => 2,
                'qty' => 1,
                'total_price' => 15000,
                'status' => 'Paid',
                'status_pemesanan' => 'Dalam proses',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Insert data into dashboard_cashiers table
        DB::table('dashboard_cashiers')->insert($data);
    }
}
