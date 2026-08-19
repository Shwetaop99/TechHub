<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderNotification;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN ORDERS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $orders = Order::with([
            'user',
            'product'
        ])
        ->latest()
        ->get();


        $newOrders = Order::where(
            'is_read',
            false
        )->count();


        return view(
            'admin-orders',
            compact(
                'orders',
                'newOrders'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | MARK ORDER AS READ
    |--------------------------------------------------------------------------
    */

    public function markAsRead(Order $order)
    {
        $order->update([
            'is_read' => true
        ]);


        return back()->with(
            'success',
            'Order marked as read.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE ORDER STATUS
    |--------------------------------------------------------------------------
    */

    public function updateStatus(
        Request $request,
        Order $order
    ) {

        /*
        |--------------------------------------------------------------------------
        | VALIDATE STATUS
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'status' =>
                'required|in:pending,processing,shipped,out_for_delivery,delivered,cancelled',

        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE ORDER
        |--------------------------------------------------------------------------
        */

        $order->update([

            'status' =>
                $request->status,

            'is_read' =>
                true,

        ]);


        /*
        |--------------------------------------------------------------------------
        | NOTIFICATION DETAILS
        |--------------------------------------------------------------------------
        */

        $notificationData = [

            'pending' => [

                'title' =>
                    'Order Pending',

                'message' =>
                    'Your order #' .
                    $order->id .
                    ' is currently pending.',

            ],


            'processing' => [

                'title' =>
                    'Order Confirmed',

                'message' =>
                    'Your order #' .
                    $order->id .
                    ' has been confirmed and is being processed.',

            ],


            'shipped' => [

                'title' =>
                    'Order Shipped',

                'message' =>
                    'Your order #' .
                    $order->id .
                    ' has been shipped.',

            ],


            'out_for_delivery' => [

                'title' =>
                    'Out for Delivery 🚚',

                'message' =>
                    'Your order #' .
                    $order->id .
                    ' is out for delivery and will arrive soon.',

            ],


            'delivered' => [

                'title' =>
                    'Order Delivered 🎉',

                'message' =>
                    'Your order #' .
                    $order->id .
                    ' has been delivered successfully.',

            ],


            'cancelled' => [

                'title' =>
                    'Order Cancelled',

                'message' =>
                    'Your order #' .
                    $order->id .
                    ' has been cancelled.',

            ],

        ];


        /*
        |--------------------------------------------------------------------------
        | CREATE CUSTOMER NOTIFICATION
        |--------------------------------------------------------------------------
        */

        if (
            $order->user_id &&
            isset(
                $notificationData[
                    $request->status
                ]
            )
        ) {

            OrderNotification::create([

                'user_id' =>
                    $order->user_id,

                'order_id' =>
                    $order->id,

                'status' =>
                    $request->status,

                'title' =>
                    $notificationData[
                        $request->status
                    ]['title'],

                'message' =>
                    $notificationData[
                        $request->status
                    ]['message'],

                'is_read' =>
                    false,

            ]);

        }


        /*
        |--------------------------------------------------------------------------
        | SUCCESS
        |--------------------------------------------------------------------------
        */

        return back()->with(
            'success',
            'Order status updated successfully.'
        );
    }
}