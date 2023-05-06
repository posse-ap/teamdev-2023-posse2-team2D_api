<?php

// app/Models/Comment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id', 'id');
    }
}

