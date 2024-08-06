<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Contact extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'contacts';

    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'message', 'created_at', 'updated_at'
    ];
}
