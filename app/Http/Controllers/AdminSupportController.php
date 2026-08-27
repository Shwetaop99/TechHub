<?php

namespace App\Http\Controllers;

use App\Models\SupportConversation;
use App\Models\SupportMessage;
use Illuminate\Http\Request;

class AdminSupportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CUSTOMER MESSAGES
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $conversations = SupportConversation::with([
            'user',
            'order',
            'latestMessage',
            'messages',
        ])
        ->latest('last_message_at')
        ->get();

        $newMessages = SupportMessage::where(
            'sender_type',
            'customer'
        )
        ->where(
            'is_read',
            false
        )
        ->count();

        return view(
            'admin-customer-messages',
            compact(
                'conversations',
                'newMessages'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | OPEN CONVERSATION
    |--------------------------------------------------------------------------
    */

    public function show(
        SupportConversation $conversation
    ) {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $conversation->load([
            'user',
            'order',
            'messages.user',
            'messages.admin',
        ]);

        /*
        | Mark customer messages as read
        | when admin opens the conversation.
        */

        $conversation
            ->messages()
            ->where(
                'sender_type',
                'customer'
            )
            ->where(
                'is_read',
                false
            )
            ->update([
                'is_read' => true
            ]);

        return view(
            'admin-customer-chat',
            compact('conversation')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN REPLY
    |--------------------------------------------------------------------------
    */

    public function reply(
        Request $request,
        SupportConversation $conversation
    ) {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $request->validate([
            'message' => [
                'required',
                'string',
                'max:2000',
            ],
        ]);

        SupportMessage::create([

            'conversation_id' =>
                $conversation->id,

            'user_id' =>
                $conversation->user_id,

            'admin_id' =>
                session('admin_id'),

            'sender_type' =>
                'admin',

            'message' =>
                $request->message,

            'is_read' =>
                false,

        ]);

        $conversation->update([

            'last_message_at' =>
                now(),

            'status' =>
                'open',

        ]);

        return back()->with(
            'success',
            'Reply sent successfully.'
        );
    }
}