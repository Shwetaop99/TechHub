<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [

        'code',

        'type',

        'value',

        'minimum_amount',

        'expires_at',

        'is_active',

        'used_count',

    ];


    protected $casts = [

        'value' => 'decimal:2',

        'minimum_amount' => 'decimal:2',

        'expires_at' => 'datetime',

        'is_active' => 'boolean',

        'used_count' => 'integer',

    ];
}