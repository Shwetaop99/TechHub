<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'name',

        'category',

        'price',

        'description',

        'image',

        'stock',

        'stock_received',

        'sold_count',

    ];


    protected $casts = [

        'price' => 'decimal:2',

        'stock' => 'integer',

        'stock_received' => 'integer',

        'sold_count' => 'integer',

    ];


    /*
    |--------------------------------------------------------------------------
    | PRODUCT IMAGES
    |--------------------------------------------------------------------------
    */

    public function images()
    {
        return $this->hasMany(ProductImage::class)
            ->orderBy('sort_order');
    }
}