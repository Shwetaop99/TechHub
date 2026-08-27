<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportConversation extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'inquiry_type',
        'status',
        'last_message_at',
    ];


    protected $casts = [
        'last_message_at' => 'datetime',
    ];


    /*
    | Customer
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /*
    | Related order
    */

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    /*
    | Messages
    */

    public function messages()
    {
        return $this->hasMany(
            SupportMessage::class,
            'conversation_id'
        );
    }


    /*
    | Latest message
    */

    public function latestMessage()
    {
        return $this->hasOne(
            SupportMessage::class,
            'conversation_id'
        )->latestOfMany();
    }
}