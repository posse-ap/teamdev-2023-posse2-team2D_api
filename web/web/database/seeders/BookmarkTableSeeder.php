<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Bookmark;
use App\Models\Item;
use App\Models\User;

class BookmarkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 10件のブックマークを生成する
        for ($i = 1; $i <= 10; $i++) {
            // ランダムなユーザーIDを取得する
            $user = User::inRandomOrder()->first();
            // ランダムなアイテムIDを取得する
            $item = Item::inRandomOrder()->first();

            // ブックマークを生成する
            DB::table('bookmarks')->insert([
                'item_id' => $item->id,
                'user_id' => $user->id,
                'created_at' => now(),
            ]);
        }
    }
}

