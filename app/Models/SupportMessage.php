<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{
    protected $fillable = [
        'conversation_id',
        'user_id',
        'admin_id',
        'sender_type',
        'message',
        'is_read',
    ];


    /*
    | Conversation
    */

    public function conversation()
    {
        return $this->belongsTo(
            SupportConversation::class,
            'conversation_id'
        );
    }


    /*
    | Customer
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /*
    | Admin
    */

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}