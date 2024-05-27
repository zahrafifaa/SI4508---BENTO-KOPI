<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
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
        ]);

        $user = User::create([
            'name' => 'user ',
            'username' => 'User1 ',
            'email' => 'user1@gmail.com',
            'phone' => '08211117828',
            'password' => bcrypt('123456')
        ]);
        $cartData = [
            'user_id' => $user->id
        ];

        
        $user = User::create([
            'name' => 'adminCashier ',
            'username' => 'Cashier',
            'email' => 'adminCashier@gmail.com',
            'phone' => '08211117827',
            'password' => bcrypt('123456')
        ]);
        $cartData = [
            'user_id' => $user->id
        ];

        
        $user = User::create([
            'name' => 'adminApp ',
            'username' => 'App',
            'email' => 'adminApp@gmail.com',
            'phone' => '08211117826',
            'password' => bcrypt('123456')
        ]);
        $cartData = [
            'user_id' => $user->id
        ];

    }

    
}