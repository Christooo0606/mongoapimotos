<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Laravel\Sanctum\HasApiTokens;

class User extends Eloquent
{
    use HasApiTokens;

    protected $connection = 'mongodb';
    protected $collection = 'users';

    protected $fillable = [
        'name', 'lname', 'fname', 'email', 'phonenumber', 'address1', 'address2',
        'city', 'state', 'country', 'pincode', 'password', 'role_as', 'remember_token',
        'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
