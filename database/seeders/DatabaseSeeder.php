<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'user'
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'name' => Str::random(10),
                'price' => random_int(1.99 , 999.99),
                'quantity' => random_int(1, 50),
                'description' => Str::random(250),
            ]);
        }
    }
}
