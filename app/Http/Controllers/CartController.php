<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\StoreSetting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Carbon\Carbon;


class CartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADD PRODUCT TO CART
    |--------------------------------------------------------------------------
    */

    public function add(Product $product, Request $request)
    {
        $quantity = max(
            1,
            (int) $request->input('quantity', 1)
        );

        if ($product->stock < $quantity) {

            return back()->with(
                'error',
                'Sorry, only ' . $product->stock . ' item(s) are available.'
            );

        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {

            $newQuantity =
                $cart[$product->id]['quantity'] + $quantity;

            if ($newQuantity > $product->stock) {

                return back()->with(
                    'error',
                    'You cannot add more than the available stock.'
                );

            }

            $cart[$product->id]['quantity'] =
                $newQuantity;

        } else {

            $cart[$product->id] = [

                'name' =>
                    $product->name,

                'category' =>
                    $product->category,

                'price' =>
                    $product->price,

                'image' =>
                    $product->image,

                'quantity' =>
                    $quantity,

            ];

        }

        session()->put(
            'cart',
            $cart
        );

        return redirect('/cart')
            ->with(
                'success',
                'Product added to cart!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW CART
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $cart = session()->get(
            'cart',
            []
        );

        // Admin payment settings
        $settings = StoreSetting::first();

        $total = 0;


        /*
        |--------------------------------------------------------------------------
        | Calculate Total
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $item) {

            $total +=
                $item['price'] *
                $item['quantity'];

        }


        /*
        |--------------------------------------------------------------------------
        | Coupon
        |--------------------------------------------------------------------------
        */

        $coupon = null;

        $discount = 0;

        $finalTotal = $total;

        $couponCode = session(
            'coupon_code'
        );


        if ($couponCode) {

            $coupon = Coupon::where(
                'code',
                strtoupper($couponCode)
            )
                ->where(
                    'is_active',
                    true
                )
                ->first();


            /*
            |--------------------------------------------------------------------------
            | Check Expiry
            |--------------------------------------------------------------------------
            */

            if (
                $coupon &&
                $coupon->expires_at &&
                Carbon::parse(
                    $coupon->expires_at
                )->isPast()
            ) {

                $coupon = null;

                session()->forget([
                    'coupon_code',
                    'coupon_discount'
                ]);

            }


            /*
            |--------------------------------------------------------------------------
            | Apply Coupon
            |--------------------------------------------------------------------------
            */

            if ($coupon) {

                if (
                    $total >=
                    (float) $coupon->minimum_amount
                ) {

                    if (
                        $coupon->type === 'percentage'
                    ) {

                        $discount =
                            $total *
                            (
                                (float) $coupon->value / 100
                            );

                    } else {

                        $discount =
                            (float) $coupon->value;

                    }


                    // Never allow negative total

                    $discount = min(
                        $discount,
                        $total
                    );


                    $finalTotal =
                        $total - $discount;

                } else {

                    $coupon = null;

                    session()->forget([
                        'coupon_code',
                        'coupon_discount'
                    ]);

                }

            }

        }


        /*
        |--------------------------------------------------------------------------
        | DYNAMIC UPI QR
        |--------------------------------------------------------------------------
        |
        | QR contains:
        |
        | Admin UPI ID
        | Final payable amount
        | Currency INR
        |
        */

        $paymentQr = null;

        if (
            $settings &&
            $settings->upi_id &&
            $finalTotal > 0
        ) {

            $upiUrl = 'upi://pay?' . http_build_query([

                'pa' =>
                    $settings->upi_id,

                'pn' =>
                    'TechHub',

                'am' =>
                    number_format(
                        $finalTotal,
                        2,
                        '.',
                        ''
                    ),

                'cu' =>
                    'INR',

                'tn' =>
                    'TechHub Order',

            ]);


            $paymentQr = base64_encode(

                QrCode::format('svg')
                    ->size(300)
                    ->margin(2)
                    ->generate($upiUrl)

            );

        }


        return view(
            'cart',
            compact(
                'cart',
                'total',
                'coupon',
                'discount',
                'finalTotal',
                'settings',
                'paymentQr'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | APPLY COUPON
    |--------------------------------------------------------------------------
    */

    public function applyCoupon(
        Request $request
    ) {

        $request->validate([

            'code' =>
                'required|string|max:50',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Calculate Cart Total
        |--------------------------------------------------------------------------
        */

        $cart = session()->get(
            'cart',
            []
        );


        if (empty($cart)) {

            return back()->with(
                'error',
                'Your cart is empty.'
            );

        }


        $total = 0;


        foreach ($cart as $item) {

            $total +=
                $item['price'] *
                $item['quantity'];

        }


        /*
        |--------------------------------------------------------------------------
        | Find Coupon
        |--------------------------------------------------------------------------
        */

        $code = strtoupper(
            trim($request->code)
        );


        $coupon = Coupon::where(
            'code',
            $code
        )
            ->where(
                'is_active',
                true
            )
            ->first();


        if (!$coupon) {

            return back()->with(
                'error',
                'Invalid or inactive coupon code.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Check Expiry
        |--------------------------------------------------------------------------
        */

        if (
            $coupon->expires_at &&
            Carbon::parse(
                $coupon->expires_at
            )->isPast()
        ) {

            return back()->with(
                'error',
                'This coupon has expired.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Check Minimum Purchase
        |--------------------------------------------------------------------------
        */

        if (
            $total <
            (float) $coupon->minimum_amount
        ) {

            return back()->with(
                'error',
                'This coupon requires a minimum purchase of ₹' .
                number_format(
                    $coupon->minimum_amount
                ) .
                '.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Calculate Discount
        |--------------------------------------------------------------------------
        */

        if (
            $coupon->type === 'percentage'
        ) {

            $discount =
                $total *
                (
                    (float) $coupon->value / 100
                );

        } else {

            $discount =
                (float) $coupon->value;

        }


        $discount = min(
            $discount,
            $total
        );


        /*
        |--------------------------------------------------------------------------
        | Save Coupon In Session
        |--------------------------------------------------------------------------
        */

        session()->put(
            'coupon_code',
            $coupon->code
        );

        session()->put(
            'coupon_discount',
            $discount
        );


        return back()->with(
            'success',
            'Coupon ' .
            $coupon->code .
            ' applied successfully! You saved ₹' .
            number_format(
                $discount,
                2
            ) .
            '.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | REMOVE COUPON
    |--------------------------------------------------------------------------
    */

    public function removeCoupon()
    {
        session()->forget([
            'coupon_code',
            'coupon_discount'
        ]);

        return back()->with(
            'success',
            'Coupon removed.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | REMOVE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function remove($id)
    {
        $cart = session()->get(
            'cart',
            []
        );


        if (isset($cart[$id])) {

            unset(
                $cart[$id]
            );

        }


        session()->put(
            'cart',
            $cart
        );


        return redirect('/cart');
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE QUANTITY
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $id
    ) {

        $cart = session()->get(
            'cart',
            []
        );


        if (isset($cart[$id])) {

            $quantity = max(
                1,
                (int) $request->input(
                    'quantity',
                    1
                )
            );


            $product = Product::find(
                $id
            );


            if ($product) {

                $quantity = min(
                    $quantity,
                    $product->stock
                );

            }


            $cart[$id]['quantity'] =
                $quantity;

        }


        session()->put(
            'cart',
            $cart
        );


        /*
        |--------------------------------------------------------------------------
        | Re-check Coupon After Quantity Change
        |--------------------------------------------------------------------------
        */

        session()->forget([
            'coupon_code',
            'coupon_discount'
        ]);


        return redirect('/cart');
    }


    /*
    |--------------------------------------------------------------------------
    | CHECKOUT / PLACE ORDER
    |--------------------------------------------------------------------------
    */

    public function checkout(
        Request $request
    ) {

        /*
        |--------------------------------------------------------------------------
        | USER MUST BE LOGGED IN
        |--------------------------------------------------------------------------
        */

        if (!auth()->check()) {

            session()->put(
                'checkout_after_login',
                true
            );

            return redirect('/login')
                ->with(
                    'error',
                    'Please login before placing an order.'
                );

        }


        /*
        |--------------------------------------------------------------------------
        | VALIDATE PAYMENT METHOD
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'payment_method' =>
                'required|in:online,cod',

            'payment_type' =>
                'nullable|in:upi,card,cod',

        ]);


        $paymentMethod =
            $request->input(
                'payment_method'
            );


        /*
        |--------------------------------------------------------------------------
        | PAYMENT TYPE
        |--------------------------------------------------------------------------
        */

        if (
            $paymentMethod === 'cod'
        ) {

            $paymentType = 'cod';

        } else {

            $paymentType =
                $request->input(
                    'payment_type',
                    'upi'
                );

        }


        /*
        |--------------------------------------------------------------------------
        | PAYMENT STATUS
        |--------------------------------------------------------------------------
        */

        $paymentStatus =
            'pending';


        /*
        |--------------------------------------------------------------------------
        | CUSTOMER UPI ID
        |--------------------------------------------------------------------------
        */

        $customerUpiId = null;


        if (
            $paymentType === 'upi'
        ) {

            $request->validate([

                'customer_upi_id' =>
                    'required|string|max:100',

            ]);


            $customerUpiId =
                trim(
                    $request->input(
                        'customer_upi_id'
                    )
                );

        }


        /*
        |--------------------------------------------------------------------------
        | GET CART
        |--------------------------------------------------------------------------
        */

        $cart = session()->get(
            'cart',
            []
        );


        if (empty($cart)) {

            return redirect('/cart')
                ->with(
                    'error',
                    'Your cart is empty.'
                );

        }


        /*
        |--------------------------------------------------------------------------
        | CALCULATE SUBTOTAL
        |--------------------------------------------------------------------------
        */

        $coupon = null;

        $discount = 0;

        $subtotal = 0;


        foreach ($cart as $item) {

            $subtotal +=
                $item['price'] *
                $item['quantity'];

        }


        /*
        |--------------------------------------------------------------------------
        | GET COUPON
        |--------------------------------------------------------------------------
        */

        $couponCode = session(
            'coupon_code'
        );


        if ($couponCode) {

            $coupon = Coupon::where(
                'code',
                strtoupper($couponCode)
            )
                ->where(
                    'is_active',
                    true
                )
                ->first();


            if ($coupon) {

                if (
                    $coupon->expires_at &&
                    Carbon::parse(
                        $coupon->expires_at
                    )->isPast()
                ) {

                    $coupon = null;

                }

            }


            if (
                $coupon &&
                $subtotal >=
                (float) $coupon->minimum_amount
            ) {

                if (
                    $coupon->type === 'percentage'
                ) {

                    $discount =
                        $subtotal *
                        (
                            (float) $coupon->value / 100
                        );

                } else {

                    $discount =
                        (float) $coupon->value;

                }


                $discount = min(
                    $discount,
                    $subtotal
                );

            }

        }


        /*
        |--------------------------------------------------------------------------
        | FINAL TOTAL
        |--------------------------------------------------------------------------
        */

        $finalTotal =
            $subtotal - $discount;


        /*
        |--------------------------------------------------------------------------
        | CREATE ORDERS SAFELY
        |--------------------------------------------------------------------------
        */

        try {

            DB::transaction(

                function () use (

                    $cart,

                    $subtotal,

                    $discount,

                    $finalTotal,

                    $coupon,

                    $paymentMethod,

                    $paymentType,

                    $customerUpiId,

                    $paymentStatus

                ) {


                    foreach (
                        $cart
                        as $productId => $item
                    ) {


                        /*
                        |--------------------------------------------------------------------------
                        | GET PRODUCT
                        |--------------------------------------------------------------------------
                        */

                        $product =
                            Product::find(
                                $productId
                            );


                        if (!$product) {

                            throw new \Exception(
                                'One of the products in your cart no longer exists.'
                            );

                        }


                        /*
                        |--------------------------------------------------------------------------
                        | QUANTITY
                        |--------------------------------------------------------------------------
                        */

                        $quantity = max(
                            1,
                            (int) $item['quantity']
                        );


                        /*
                        |--------------------------------------------------------------------------
                        | CHECK STOCK
                        |--------------------------------------------------------------------------
                        */

                        if (
                            $product->stock <
                            $quantity
                        ) {

                            throw new \Exception(

                                $product->name .
                                ' does not have enough stock.'

                            );

                        }


                        /*
                        |--------------------------------------------------------------------------
                        | PRICE
                        |--------------------------------------------------------------------------
                        */

                        $price =
                            (float) $product->price;


                        $lineTotal =
                            $price *
                            $quantity;


                        /*
                        |--------------------------------------------------------------------------
                        | APPLY COUPON PROPORTIONALLY
                        |--------------------------------------------------------------------------
                        */

                        $lineDiscount = 0;


                        if (
                            $discount > 0 &&
                            $subtotal > 0
                        ) {

                            $lineDiscount =
                                $discount *
                                (
                                    $lineTotal /
                                    $subtotal
                                );

                        }


                        $orderTotal =
                            max(
                                0,
                                $lineTotal -
                                $lineDiscount
                            );


                        /*
                        |--------------------------------------------------------------------------
                        | CREATE ORDER
                        |--------------------------------------------------------------------------
                        */

                        Order::create([

    'user_id' =>
        auth()->id(),

    'product_id' =>
        $product->id,

    'quantity' =>
        $quantity,

    'price' =>
        $price,

    'total' =>
        $orderTotal,

    'status' =>
        'pending',

    'payment_method' =>
        $paymentMethod,

    'payment_type' =>
        $paymentType,

    'customer_upi_id' =>
        $customerUpiId,

    'payment_status' =>
        $paymentStatus,

    'is_read' =>
        false,

    /*
    |--------------------------------------------------------------------------
    | INDIA TIME
    |--------------------------------------------------------------------------
    */

    'created_at' =>
        Carbon::now('Asia/Kolkata'),

    'updated_at' =>
        Carbon::now('Asia/Kolkata'),

]);


                        /*
                        |--------------------------------------------------------------------------
                        | REDUCE STOCK
                        |--------------------------------------------------------------------------
                        */

                        $product->decrement(
                            'stock',
                            $quantity
                        );


                        /*
                        |--------------------------------------------------------------------------
                        | INCREASE SOLD COUNT
                        |--------------------------------------------------------------------------
                        */

                        $product->increment(
                            'sold_count',
                            $quantity
                        );

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | INCREASE COUPON USAGE
                    |--------------------------------------------------------------------------
                    */

                    if ($coupon) {

                        $coupon->increment(
                            'used_count'
                        );

                    }

                }

            );


        } catch (\Exception $e) {

            return redirect('/cart')
                ->with(
                    'error',
                    $e->getMessage()
                );

        }


        /*
        |--------------------------------------------------------------------------
        | CLEAR CART + COUPON
        |--------------------------------------------------------------------------
        */

        session()->forget([

            'cart',

            'coupon_code',

            'coupon_discount',

            'checkout_after_login'

        ]);


        /*
        |--------------------------------------------------------------------------
        | SUCCESS
        |--------------------------------------------------------------------------
        */

        return redirect('/cart')
            ->with(

                'success',

                $paymentMethod === 'cod'

                    ? 'Order placed successfully! Cash on Delivery selected. :)'

                    : 'Order placed successfully! Online payment selected. :)'

            );
    }
}