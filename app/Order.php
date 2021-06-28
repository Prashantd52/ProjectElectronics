<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    public function inventories()
    {
        
        return $this->belongsToMany(Inventory::class, 'order_items')
        ->withPivot(['inventory_id','item_description', 'quantity', 'unit_price'])->withTimestamps();
    }
}
