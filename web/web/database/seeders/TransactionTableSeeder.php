<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('transactions')->insert([
                'owner_user_id' => $faker->numberBetween(1, 10),
                'borrower_user_id' => $faker->numberBetween(1, 10),
                'item_id' => $faker->numberBetween(1, 10),
                'points' => $faker->numberBetween(10, 100),
                'start_date' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
                'end_date' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'status' => $faker->numberBetween(0, 1),
                'created_at' => $faker->dateTimeThisMonth,
                'updated_at' => $faker->dateTimeThisMonth,
            ]);
        }
    }
}

