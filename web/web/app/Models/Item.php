<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    
    public function itemImages()
    {
        return $this->hasMany(ItemImage::class);
    }
    public function owner()
{
    return $this->belongsTo(User::class, 'owner_user_id');
}
    public function toArray()
{
    $itemImages = $this->itemImages()->select('id', 'item_id', 'image_url')->get();
    $image = count($itemImages) ? $itemImages[0]->image_url : '';
    $owner = $this->owner_user_id ? '@' . $this->owner->name : '';
    $state = $this->status === 0 ? 0 : 1;

    return [
        'id' => $this->id,
        'price' => $this->points,
        'img' => $image,
        'title' => $this->name,
        'owner' => $owner,
        'is_bookmark' => false,
        'state' => $state,
    ];
}
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'item_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'item_id', 'id');
    }
}
