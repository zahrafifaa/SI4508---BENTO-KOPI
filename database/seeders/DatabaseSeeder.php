<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\MenuSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            MenuSeeder::class,
            DashboardKollabSeeder::class,
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
        ]);
    }

    
}
