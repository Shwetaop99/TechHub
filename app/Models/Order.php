<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Order extends Model
{
    protected $fillable = [

        'user_id',
        'product_id',
        'quantity',
        'price',
        'total',
        'status',

        // Payment information
        'payment_method',
        'payment_type',
        'customer_upi_id',
        'payment_status',

        'is_read',

    ];


    protected $casts = [

        'price' =>
            'decimal:2',

        'total' =>
            'decimal:2',

        'is_read' =>
            'boolean',

        'created_at' =>
            'datetime',

        'updated_at' =>
            'datetime',

    ];


    /*
    |--------------------------------------------------------------------------
    | FORCE ORDER TIME TO INDIA TIME
    |--------------------------------------------------------------------------
    */

    public function getCreatedAtAttribute($value)
    {
        if (!$value) {
            return null;
        }

        return Carbon::parse($value)
            ->timezone('Asia/Kolkata');
    }


    public function getUpdatedAtAttribute($value)
    {
        if (!$value) {
            return null;
        }

        return Carbon::parse($value)
            ->timezone('Asia/Kolkata');
    }


    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    */

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Product
    |--------------------------------------------------------------------------
    */

    public function product(): BelongsTo
    {
        return $this->belongsTo(
            Product::class
        );
    }

    public function notifications()
{
    return $this->hasMany(OrderNotification::class);
}
}