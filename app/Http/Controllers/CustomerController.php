<?php

namespace App\Http\Controllers;

use App\Models\User;

class CustomerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SHOW CUSTOMERS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $customers = User::withCount('orders')
            ->withSum('orders', 'total')
            ->latest()
            ->get();

        return view(
            'admin-customers',
            compact('customers')
        );
    }
}