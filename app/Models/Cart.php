<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Cart extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'carts';

    protected $fillable = [
        'user_id', 'prod_id', 'prod_qty', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}
