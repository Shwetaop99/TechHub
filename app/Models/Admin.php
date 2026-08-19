<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [

        'email',
        'password',

        // Permissions
        'can_view_dashboard',
        'can_view_website',
        'can_view_products',
        'can_add_products',
        'can_view_orders',
        'can_view_customers',
        'can_view_inventory',
        'can_view_coupons',
        'can_view_settings',
        'can_view_visitors',

    ];


    protected $casts = [

        'can_view_dashboard' => 'boolean',
        'can_view_website' => 'boolean',
        'can_view_products' => 'boolean',
        'can_add_products' => 'boolean',
        'can_view_orders' => 'boolean',
        'can_view_customers' => 'boolean',
        'can_view_inventory' => 'boolean',
        'can_view_coupons' => 'boolean',
        'can_view_settings' => 'boolean',
        'can_view_visitors' => 'boolean',

    ];
}