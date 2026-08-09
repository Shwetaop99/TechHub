<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {

            $cart[$product->id]['quantity']++;

        } else {

            $cart[$product->id] = [

                'name' => $product->name,

                'category' => $product->category,

                'price' => $product->price,

                'image' => $product->image,

                'quantity' => 1,

            ];
        }

        session()->put('cart', $cart);

        return redirect('/cart')
            ->with('success', 'Product added to cart!');
    }


    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;

        foreach ($cart as $item) {

            $total += $item['price'] * $item['quantity'];

        }

        return view('cart', compact('cart', 'total'));
    }


    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

        }

        session()->put('cart', $cart);

        return redirect('/cart');
    }


    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity'] = max(
                1,
                (int) $request->quantity
            );

        }

        session()->put('cart', $cart);

        return redirect('/cart');
    }
}