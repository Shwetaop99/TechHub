<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HOME
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
{
    $query = Product::query();

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('category', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%');

        });
    }

    $products = $query->latest()->get();

    return view('home', compact('products'));
}


    /*
    |--------------------------------------------------------------------------
    | CATEGORY
    |--------------------------------------------------------------------------
    */

    public function category($category)
    {
        $products = Product::where(
            'category',
            $category
        )->get();

        return view('home', compact('products'));
    }


    /*
    |--------------------------------------------------------------------------
    | PRODUCT DETAILS
    |--------------------------------------------------------------------------
    */

    public function show(Product $product)
    {
        return view(
            'product-details',
            compact('product')
        );
    }
}