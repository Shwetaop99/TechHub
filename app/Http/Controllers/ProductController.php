<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('home', compact('products'));
    }

    public function category($category)
    {
        $products = Product::where('category', $category)->get();

        return view('home', compact('products'));
    }
}