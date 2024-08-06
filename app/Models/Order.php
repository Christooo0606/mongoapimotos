<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Order extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'orders';

    protected $fillable = [
        'user_id', 'fname', 'lname', 'email', 'phone', 'address1', 'address2',
        'city', 'state', 'country', 'pincode', 'total_price', 'status', 'message',
        'tracking_no', 'created_at', 'updated_at', 'order_items'
    ];

    protected $casts = [
        'order_items' => 'array', // Order items serán almacenados como un array embebido
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
