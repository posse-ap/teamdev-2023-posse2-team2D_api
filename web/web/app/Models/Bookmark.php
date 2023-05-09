<?php
// Book.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'item_id'];


    // ブックマークしたユーザーを取得する関係を定義
    public function bookmarks()
    {
        return $this->belongsToMany(User::class, 'bookmarks');
    }
}

