<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'cate_id', 'name', 'slug', 'small_description', 'description',
        'original_price', 'selling_price', 'image', 'qty', 'tax', 'status',
        'trending', 'meta_title', 'meta_keyword', 'meta_description', 'created_at', 'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }
}
