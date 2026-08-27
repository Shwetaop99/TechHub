<?php

namespace App\Http\Controllers;

use App\Models\SupportConversation;
use App\Models\SupportMessage;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CUSTOMER SUPPORT PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if (!auth()->check()) {

            return view('contact', [
                'conversations' => collect()
            ]);
        }

        $conversations = SupportConversation::with([
            'messages' => function ($query) {
                $query->orderBy('created_at', 'asc');
            },

            'latestMessage'
        ])
        ->where(
            'user_id',
            auth()->id()
        )
        ->latest('last_message_at')
        ->get();

        return view(
            'contact',
            compact('conversations')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SEND NEW CUSTOMER INQUIRY
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        if (!auth()->check()) {

            return redirect('/login')
                ->with(
                    'error',
                    'Please login before sending a support message.'
                );
        }

        $request->validate([

            'name' =>
                'required|string|max:100',

            'email' =>
                'required|email|max:255',

            'subject' =>
                'required|string|max:200',

            'message' =>
                'required|string|max:2000',

        ]);

        /*
        |--------------------------------------------------------------------------
        | CREATE CONVERSATION
        |--------------------------------------------------------------------------
        */

        $conversation = SupportConversation::create([

            'user_id' =>
                auth()->id(),

            'inquiry_type' =>
                $request->subject,

            'status' =>
                'open',

            'last_message_at' =>
                now(),

        ]);


        /*
        |--------------------------------------------------------------------------
        | CREATE FIRST CUSTOMER MESSAGE
        |--------------------------------------------------------------------------
        */

        SupportMessage::create([

            'conversation_id' =>
                $conversation->id,

            'user_id' =>
                auth()->id(),

            'admin_id' =>
                null,

            'sender_type' =>
                'customer',

            'message' =>
                $request->message,

            'is_read' =>
                false,

        ]);


        return redirect('/contact')
            ->with(
                'success',
                'Your message has been sent successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER REPLY
    |--------------------------------------------------------------------------
    */

    public function reply(
        Request $request,
        SupportConversation $conversation
    ) {

        if (!auth()->check()) {

            return redirect('/login');
        }


        /*
        |--------------------------------------------------------------------------
        | SECURITY CHECK
        |--------------------------------------------------------------------------
        */

        if (
            $conversation->user_id !==
            auth()->id()
        ) {

            abort(403);
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDATE MESSAGE
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'message' =>
                'required|string|max:2000',

        ]);


        /*
        |--------------------------------------------------------------------------
        | SAVE CUSTOMER REPLY
        |--------------------------------------------------------------------------
        */

        SupportMessage::create([

            'conversation_id' =>
                $conversation->id,

            'user_id' =>
                auth()->id(),

            'admin_id' =>
                null,

            'sender_type' =>
                'customer',

            'message' =>
                $request->message,

            'is_read' =>
                false,

        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE CONVERSATION
        |--------------------------------------------------------------------------
        */

        $conversation->update([

            'last_message_at' =>
                now(),

            'status' =>
                'open',

        ]);


        return back()
            ->with(
                'success',
                'Message sent successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | MARK ADMIN REPLIES AS READ
    |--------------------------------------------------------------------------
    */

    public function markAsRead(
        SupportConversation $conversation
    ) {

        if (!auth()->check()) {

            return redirect('/login');
        }


        /*
        |--------------------------------------------------------------------------
        | SECURITY CHECK
        |--------------------------------------------------------------------------
        */

        if (
            $conversation->user_id !==
            auth()->id()
        ) {

            abort(403);
        }


        /*
        |--------------------------------------------------------------------------
        | MARK ONLY ADMIN MESSAGES AS READ
        |--------------------------------------------------------------------------
        */

        $conversation
            ->messages()
            ->where(
                'sender_type',
                'admin'
            )
            ->where(
                'is_read',
                false
            )
            ->update([
                'is_read' => true
            ]);


        return back();
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE CONVERSATION
    |--------------------------------------------------------------------------
    */

    public function destroy(
        SupportConversation $conversation
    ) {

        if (!auth()->check()) {

            return redirect('/login');
        }


        /*
        |--------------------------------------------------------------------------
        | SECURITY CHECK
        |--------------------------------------------------------------------------
        */

        if (
            $conversation->user_id !==
            auth()->id()
        ) {

            abort(403);
        }


        /*
        |--------------------------------------------------------------------------
        | DELETE CONVERSATION
        |--------------------------------------------------------------------------
        */

        $conversation->delete();


        return back()
            ->with(
                'success',
                'Conversation deleted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN SUPPORT NOTIFICATION CHECK
    |--------------------------------------------------------------------------
    |
    | Used by BOTH:
    |
    | 1. Super Admin
    | 2. Normal Admin
    |
    */

    public function checkAdminNotifications()
    {

        /*
        |--------------------------------------------------------------------------
        | CHECK ADMIN LOGIN
        |--------------------------------------------------------------------------
        */

        if (
            !session('admin_logged_in') &&
            !session('normal_admin_logged_in')
        ) {

            return response()->json([
                'success' => false,
                'message' => null
            ], 403);
        }


        /*
        |--------------------------------------------------------------------------
        | FIND LATEST UNREAD CUSTOMER MESSAGE
        |--------------------------------------------------------------------------
        */

        $message = SupportMessage::with([
            'user'
        ])
        ->where(
            'sender_type',
            'customer'
        )
        ->where(
            'is_read',
            false
        )
        ->latest('id')
        ->first();


        /*
        |--------------------------------------------------------------------------
        | NO NEW MESSAGE
        |--------------------------------------------------------------------------
        */

        if (!$message) {

            return response()->json([

                'success' =>
                    true,

                'message' =>
                    null,

            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | RETURN NEW MESSAGE
        |--------------------------------------------------------------------------
        */

        return response()->json([

            'success' =>
                true,

            'message' => [

                'id' =>
                    $message->id,

                'text' =>
                    'New message from ' .
                    (
                        $message->user->name
                        ?? 'Customer'
                    ) .
                    ': ' .
                    $message->message,

                'conversation_id' =>
                    $message->conversation_id,

            ],

        ]);
    }
}