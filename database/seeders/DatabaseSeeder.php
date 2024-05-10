<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

<<<<<<< HEAD
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            MenuSeeder::class,
            DashboardKollabSeeder::class,
            LowonganSeeder::class
        ]);

        User::create([
            'name' => 'user ',
            'username' => 'User1 ',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('123456')
        ]);
        
        User::create([
            'name' => 'adminCashier ',
            'username' => 'Cashier ',
            'email' => 'adminCashier@gmail.com',
            'password' => bcrypt('123456')
        ]);
        
        User::create([
            'name' => 'Super Admin ',
            'username' => 'SuperAdmin',
            'email' => 'adminApp@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'faqih ',
            'username' => 'faqih',
            'email' => 'faqih@mail.com',
            'password' => bcrypt('123456')
=======
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
        ]);
    }
}
