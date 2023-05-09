<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;

class ItemImageTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            $itemCount = DB::table('items')->where('id', $i)->count();

            if ($itemCount > 0) {
                for ($j = 0; $j < 3; $j++) {
                    DB::table('item_images')->insert([
                        'image_url' => $faker->imageUrl(),
                        'item_id' => $i,
                        'created_at' => $faker->dateTimeThisMonth,
                        'updated_at' => $faker->dateTimeThisMonth,
                    ]);
                }
            }
        }
    }
}

