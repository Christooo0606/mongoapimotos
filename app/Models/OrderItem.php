<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class OrderItem extends Eloquent
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'order_id', 'prod_id', 'qty', 'price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}
