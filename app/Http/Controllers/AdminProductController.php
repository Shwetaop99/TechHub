<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SHOW ALL PRODUCTS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::latest()->get();

        return view(
            'admin-products',
            compact('products')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/admin/products')
            ->with(
                'success',
                'Product deleted successfully!'
            );
    }
}