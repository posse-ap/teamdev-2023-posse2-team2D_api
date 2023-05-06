<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            DB::table('requests')->insert([
                'name' => "Request from user {$user->name}",
                'description' => "This is a request from user {$user->name}.",
                'is_admin' => false,
                'status' => rand(0, 2),
                'request_user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
