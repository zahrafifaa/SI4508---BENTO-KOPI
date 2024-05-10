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
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
=======
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
>>>>>>> 2fd7998b261c423801df0cf4ef1a18af34189db7
        ]);
    }
}
