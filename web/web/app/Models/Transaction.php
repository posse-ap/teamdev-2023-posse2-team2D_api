<?php

// app/Models/Transaction.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id', 'id');
    }
}

