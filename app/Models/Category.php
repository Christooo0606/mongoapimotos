<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'categories';

    protected $fillable = [
        'name', 'slug', 'description', 'image', 'meta_title', 'meta_keyword',
        'meta_description', 'status', 'popular', 'created_at', 'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'cate_id');
    }
}
