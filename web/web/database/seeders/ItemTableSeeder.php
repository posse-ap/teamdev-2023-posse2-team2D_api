<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemTableSeeder extends Seeder
{
    public function run()
    {
        $users = DB::table('users')->pluck('id');

        for ($i = 0; $i < 20; $i++) {
            $ownerUserId = $users->random();
            // $requestId = rand(0, 1) ? null : rand(1, 10);
            $type = rand(0, 1);
            DB::table('items')->insert([
                'name' => Str::random(10),
                'description' => Str::random(50),
                'status' => rand(0, 2),
                'points' => rand(1, 100),
                'owner_user_id' => $ownerUserId,
                'request_id' => null,
                'type' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
