<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                DB::table('comments')->insert([
                    'item_id' => $i,
                    'comment' => $faker->realText(100),
                    'points' => $faker->numberBetween(1, 5),
                    'commenter_id' => $faker->numberBetween(1, 10),
                    'created_at' => $faker->dateTimeThisMonth,
                    'updated_at' => $faker->dateTimeThisMonth,
                ]);
            }
        }
    }
}