<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'device',
        'browser',
        'visits',
        'first_visited_at',
        'last_visited_at',
    ];

    protected $casts = [
        'first_visited_at' => 'datetime',
        'last_visited_at' => 'datetime',
        'visits' => 'integer',
    ];
}