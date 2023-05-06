<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'name' => 'Admin',
            'is_admin' => true,
            'slack_id' => Str::random(10),
            'supply_points' => 1000,
            'get_points' => 500,
            'pending_points' => 100,
            'position' => 'Manager',
            'hobby' => 'Reading',
            'profile' => 'Hello, I am the administrator of this system.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'email' => "user{$i}@example.com",
                'password' => Hash::make('password'),
                'name' => "User{$i}",
                'is_admin' => false,
                'slack_id' => Str::random(10),
                'supply_points' => rand(100, 1000),
                'get_points' => rand(50, 500),
                'pending_points' => rand(0, 200),
                'position' => null,
                'hobby' => 'Swimming',
                'profile' => 'Hello, I am a regular user of this system.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
