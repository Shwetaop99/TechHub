<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\StoreSetting;
use App\Models\Visitor;
use App\Models\Admin;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminVisitorController;
use App\Models\OrderNotification;


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN PERMISSION CHECK
|--------------------------------------------------------------------------
*/

function normalAdminCan(string $permission): bool
{
    return session('normal_admin_logged_in') &&
           session($permission, false);
}

/*
|--------------------------------------------------------------------------
| HOME & PRODUCTS
|--------------------------------------------------------------------------
*/

Route::get('/', [ProductController::class, 'index']);

Route::get('/category/{category}', [
    ProductController::class,
    'category'
]);

Route::get('/product/{product}', [
    ProductController::class,
    'show'
]);


/*
|--------------------------------------------------------------------------
| ABOUT & CONTACT
|--------------------------------------------------------------------------
*/

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


/*
|--------------------------------------------------------------------------
| CLOUDINARY TEST
|--------------------------------------------------------------------------
*/

Route::get('/cloudinary-test', function () {

    $upload = (new \Cloudinary\Api\Upload\UploadApi())
        ->upload(public_path('test.jpg'));

    return $upload['secure_url'];
});


/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
|
| One login page for both Super Admin and Normal Admin.
|
*/

Route::get('/admin/login', function () {

    return view('admin-login');

})->name('admin.login');


Route::post('/admin/login', function (Request $request) {

    $request->validate([
        'admin_id' => 'required',
        'password' => 'required',
    ]);


    /*
    |--------------------------------------------------------------------------
    | SUPER ADMIN CREDENTIALS
    |--------------------------------------------------------------------------
    */

    $superAdminId =
        'shwetashinde1331@gmail.com';

    $superAdminPassword =
        'shweta1331@';


    /*
    |--------------------------------------------------------------------------
    | NORMAL ADMIN
    |--------------------------------------------------------------------------
    | Normal admins are created by the Super Admin from
    | Manage Admins. Their credentials and permissions
    | come from the admins table.
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ENTERED CREDENTIALS
    |--------------------------------------------------------------------------
    */

    $enteredId =
        trim(
            (string) $request->input('admin_id')
        );

    $enteredPassword =
        (string) $request->input('password');


    /*
    |--------------------------------------------------------------------------
    | SUPER ADMIN LOGIN
    |--------------------------------------------------------------------------
    */

    if (
        $enteredId === $superAdminId &&
        $enteredPassword === $superAdminPassword
    ) {

        // Make sure the Normal Admin session is not active.
        $request->session()->forget(
            'normal_admin_logged_in'
        );

        $request->session()->regenerate();

        $request->session()->put(
            'admin_logged_in',
            true
        );

        return redirect('/admin');
    }


    /*
    |--------------------------------------------------------------------------
    | NORMAL ADMIN LOGIN
    |--------------------------------------------------------------------------
    */

    $admin = Admin::where(
        'email',
        $enteredId
    )->first();

    if (
        $admin &&
        Hash::check(
            $enteredPassword,
            $admin->password
        )
    ) {

        // Make sure the Super Admin session is not active.
        $request->session()->forget(
            'admin_logged_in'
        );

        $request->session()->regenerate();

        /*
        |--------------------------------------------------------------------------
        | NORMAL ADMIN SESSION
        |--------------------------------------------------------------------------
        */

        $request->session()->put([

            'normal_admin_logged_in' => true,

            'normal_admin_id' =>
                $admin->id,

            'normal_admin_email' =>
                $admin->email,

            'can_view_dashboard' =>
                (bool) $admin->can_view_dashboard,

            'can_view_website' =>
                (bool) $admin->can_view_website,

            'can_view_products' =>
                (bool) $admin->can_view_products,

            'can_add_products' =>
                (bool) $admin->can_add_products,

            'can_view_orders' =>
                (bool) $admin->can_view_orders,

            'can_view_customers' =>
                (bool) $admin->can_view_customers,

            'can_view_inventory' =>
                (bool) $admin->can_view_inventory,

            'can_view_coupons' =>
                (bool) $admin->can_view_coupons,

            'can_view_settings' =>
                (bool) $admin->can_view_settings,

            'can_view_visitors' =>
                (bool) $admin->can_view_visitors,
        ]);

        return redirect('/admin-user');
    }


    /*
    |--------------------------------------------------------------------------
    | INVALID LOGIN
    |--------------------------------------------------------------------------
    */

    return back()
        ->withInput(
            $request->only('admin_id')
        )
        ->with(
            'error',
            'Invalid Admin ID or Password.'
        );

});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    $products = Product::all();

    $totalProducts = Product::count();

    $totalSold = Product::sum('sold_count');

    $totalCategories = Product::distinct('category')
        ->count('category');

    $totalStock = Product::sum('stock');

    $totalVisitors = Visitor::count();

    $newOrders = Order::where(
        'is_read',
        false
    )->count();

    return view(
        'admin',
        compact(
            'products',
            'totalProducts',
            'totalSold',
            'totalCategories',
            'totalStock',
            'totalVisitors',
            'newOrders'
        )
    );
});

/*
|--------------------------------------------------------------------------
| SUPER ADMIN - MANAGE ADMINS
|--------------------------------------------------------------------------
*/

Route::get('/admin/manage-admins', [
    \App\Http\Controllers\AdminManagementController::class,
    'index'
])->name('admin.manage');


Route::post('/admin/manage-admins', [
    \App\Http\Controllers\AdminManagementController::class,
    'store'
]);


Route::delete('/admin/manage-admins/{admin}', [
    \App\Http\Controllers\AdminManagementController::class,
    'destroy'
]);

Route::get('/admin/manage-admins/{admin}/edit', [
    \App\Http\Controllers\AdminManagementController::class,
    'edit'
])->name('admin.manage.edit');

Route::put('/admin/manage-admins/{admin}', [
    \App\Http\Controllers\AdminManagementController::class,
    'update'
])->name('admin.manage.update');


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin-user', function () {

    $normalAdmin = Admin::find(session('normal_admin_id'));

if (!$normalAdmin) {
    return redirect('/admin/login');
}

    /*
    |--------------------------------------------------------------------------
    | NORMAL ADMIN PERMISSIONS
    |--------------------------------------------------------------------------
    | The dashboard receives exactly the permissions assigned
    | to this admin by the Super Admin.
    |--------------------------------------------------------------------------
    */

    $permissions = [

        'dashboard' =>
            session('can_view_dashboard', false),

        'website' =>
            session('can_view_website', false),

        'products' =>
            session('can_view_products', false),

        'add_products' =>
            session('can_add_products', false),

        'orders' =>
            session('can_view_orders', false),

        'customers' =>
            session('can_view_customers', false),

        'inventory' =>
            session('can_view_inventory', false),

        'coupons' =>
            session('can_view_coupons', false),

        'settings' =>
            session('can_view_settings', false),

        'visitors' =>
            session('can_view_visitors', false),
    ];

    return view(
        'admin-user',
        compact('permissions')
    );
});


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN - ADD PRODUCT PAGE
|--------------------------------------------------------------------------
*/

Route::get('/admin-user/products/create', function () {

    if (!session('normal_admin_logged_in')) {
        return redirect('/admin/login');
    }

    if (!session('can_add_products')) {
        abort(403, 'You do not have permission to add products.');
    }

    return view('admin-products-create');

});


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN - ADD PRODUCT
|--------------------------------------------------------------------------
*/

Route::post('/admin-user/products', function (Request $request) {

    if (!session('normal_admin_logged_in')) {
        return redirect('/admin/login');
    }

    if (!session('can_add_products')) {
        abort(403, 'You do not have permission to add products.');
    }

    $request->validate([

        'name' =>
            'required',

        'category' =>
            'required',

        'price' =>
            'required|numeric',

        'stock' =>
            'required|integer',

        'description' =>
            'required',

        'image' =>
            'required|image|max:5120',

    ]);

    $imagePath = $request
        ->file('image')
        ->getRealPath();

    $uploadedImage =
        (new \Cloudinary\Api\Upload\UploadApi())
        ->upload($imagePath);

    $image =
        $uploadedImage['secure_url'];

    Product::create([

        'name' =>
            $request->name,

        'category' =>
            $request->category,

        'price' =>
            $request->price,

        'description' =>
            $request->description,

        'image' =>
            $image,

        'stock' =>
            $request->stock,

        'stock_received' =>
            $request->stock,

        'sold_count' =>
            0,

    ]);

    return redirect('/admin-user/products/create')
        ->with(
            'success',
            'Product added successfully!'
        );

});


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN - VIEW WEBSITE
|--------------------------------------------------------------------------
*/

Route::get('/admin-user/website', function () {

    if (!session('normal_admin_logged_in')) {
        return redirect('/admin/login');
    }

    if (!session('can_view_website')) {
        abort(403);
    }

    return redirect('/');

});


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN - PRODUCTS
|--------------------------------------------------------------------------
*/

Route::get('/admin-user/products', function () {

    if (!session('normal_admin_logged_in')) {
        return redirect('/admin/login');
    }

    if (!session('can_view_products')) {
        abort(403);
    }

    return app(
        AdminProductController::class
    )->index();

});


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN - CUSTOMERS
|--------------------------------------------------------------------------
*/

Route::get('/admin-user/customers', function () {

    if (!session('normal_admin_logged_in')) {
        return redirect('/admin/login');
    }

    if (!session('can_view_customers')) {
        abort(403);
    }

    return app(
        CustomerController::class
    )->index();

});


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN - INVENTORY
|--------------------------------------------------------------------------
*/

Route::get('/admin-user/inventory', function () {

    if (!session('normal_admin_logged_in')) {
        return redirect('/admin/login');
    }

    if (!session('can_view_inventory')) {
        abort(403);
    }

    $products =
        Product::orderBy('name')->get();

    $totalProducts =
        Product::count();

    $totalStock =
        Product::sum('stock');

    $totalSold =
        Product::sum('sold_count');

    return view(
        'admin-inventory',
        compact(
            'products',
            'totalProducts',
            'totalStock',
            'totalSold'
        )
    );

});


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN - COUPONS
|--------------------------------------------------------------------------
*/

Route::get('/admin-user/coupons', function () {

    if (!session('normal_admin_logged_in')) {
        return redirect('/admin/login');
    }

    if (!session('can_view_coupons')) {
        abort(403);
    }

    $coupons =
        \App\Models\Coupon::latest()->get();

    return view(
        'admin-coupons',
        compact('coupons')
    );

});


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN - SETTINGS
|--------------------------------------------------------------------------
*/

Route::get('/admin-user/settings', function () {

    if (!session('normal_admin_logged_in')) {
        return redirect('/admin/login');
    }

    if (!session('can_view_settings')) {
        abort(403);
    }

    $settings =
        StoreSetting::first();

    return view(
        'admin-settings',
        compact('settings')
    );

});


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN - WEBSITE VISITORS
|--------------------------------------------------------------------------
*/

Route::get('/admin-user/visitors', function () {

    if (!session('normal_admin_logged_in')) {
        return redirect('/admin/login');
    }

    if (!session('can_view_visitors')) {
        abort(403);
    }

    return app(
        AdminVisitorController::class
    )->index();

});


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN - CUSTOMER ORDERS
|--------------------------------------------------------------------------
*/

Route::get('/admin-user/orders', function () {

    if (!session('normal_admin_logged_in')) {
        return redirect('/admin/login');
    }

    if (!session('can_view_orders')) {
        abort(403);
    }

    $orders = Order::with([
        'user',
        'product'
    ])
    ->latest('id')
    ->get();

    return view(
        'admin-customer-orders',
        compact('orders')
    );
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN ORDERS
|--------------------------------------------------------------------------
*/

Route::get('/admin/orders', function () {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    return app(
        OrderController::class
    )->index();
});


Route::post(
    '/admin/orders/{order}/read',
    function (Order $order) {

        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        return app(
            OrderController::class
        )->markAsRead($order);
    }
);


Route::post(
    '/admin/orders/{order}/status',
    function (
        Request $request,
        Order $order
    ) {

        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        return app(
            OrderController::class
        )->updateStatus(
            $request,
            $order
        );
    }
);


/*
|--------------------------------------------------------------------------
| SUPER ADMIN PAYMENT STATUS
|--------------------------------------------------------------------------
*/

Route::post(
    '/admin/orders/{order}/payment-status',
    function (
        Request $request,
        Order $order
    ) {

        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $request->validate([
            'payment_status' =>
                'required|in:pending,paid,failed,refunded',
        ]);

        $order->update([
            'payment_status' =>
                $request->payment_status,
        ]);

        return back()->with(
            'success',
            'Payment status updated successfully!'
        );
    }
);


/*
|--------------------------------------------------------------------------
| SUPER ADMIN CUSTOMERS
|--------------------------------------------------------------------------
*/

Route::get('/admin/customers', function () {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    return app(
        CustomerController::class
    )->index();
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN ADD PRODUCT PAGE
|--------------------------------------------------------------------------
*/

Route::get('/admin/products/create', function () {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    return view('admin-products-create');
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN WEBSITE VISITORS
|--------------------------------------------------------------------------
*/

Route::get('/admin/visitors', function () {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    return app(
        AdminVisitorController::class
    )->index();
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN ADD PRODUCT
|--------------------------------------------------------------------------
*/

Route::post('/admin/products', function (Request $request) {

    /*
    |--------------------------------------------------------------------------
    | SUPER ADMIN CHECK
    |--------------------------------------------------------------------------
    */

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

    $request->validate([

        'name' =>
            'required',

        'category' =>
            'required',

        'price' =>
            'required|numeric',

        'stock' =>
            'required|integer',

        'description' =>
            'required',

        'images' =>
            'required|array|min:1|max:5',

        'images.*' =>
            'required|image|max:5120',

    ]);


    /*
    |--------------------------------------------------------------------------
    | CREATE PRODUCT FIRST
    |--------------------------------------------------------------------------
    */

    $product = Product::create([

        'name' =>
            $request->name,

        'category' =>
            $request->category,

        'price' =>
            $request->price,

        'description' =>
            $request->description,

        'stock' =>
            $request->stock,

        'stock_received' =>
            $request->stock,

        'sold_count' =>
            0,

        // Main image will be added below
        'image' =>
            null,

    ]);


    /*
    |--------------------------------------------------------------------------
    | UPLOAD IMAGES
    |--------------------------------------------------------------------------
    */

    $images =
        $request->file('images');


    foreach (
        $images as $index => $uploadedFile
    ) {

        $imagePath =
            $uploadedFile->getRealPath();


        $uploadedImage =
            (new \Cloudinary\Api\Upload\UploadApi())
            ->upload($imagePath);


        $imageUrl =
            $uploadedImage['secure_url'];


        /*
        |--------------------------------------------------------------------------
        | SAVE IMAGE
        |--------------------------------------------------------------------------
        */

        \App\Models\ProductImage::create([

            'product_id' =>
                $product->id,

            'image' =>
                $imageUrl,

            'sort_order' =>
                $index,

        ]);


        /*
        |--------------------------------------------------------------------------
        | FIRST IMAGE = MAIN PRODUCT IMAGE
        |--------------------------------------------------------------------------
        */

        if ($index === 0) {

            $product->update([

                'image' =>
                    $imageUrl,

            ]);

        }

    }


    /*
    |--------------------------------------------------------------------------
    | SUCCESS
    |--------------------------------------------------------------------------
    */

    return redirect(
        '/admin/products'
    )->with(
        'success',
        'Product added successfully with multiple images!'
    );

});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN PRODUCTS
|--------------------------------------------------------------------------
*/

Route::get('/admin/products', function () {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    return app(
        AdminProductController::class
    )->index();
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN INVENTORY
|--------------------------------------------------------------------------
*/

Route::get('/admin/inventory', function () {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    $products =
        Product::orderBy('name')->get();

    $totalProducts =
        Product::count();

    $totalStock =
        Product::sum('stock');

    $totalSold =
        Product::sum('sold_count');

    return view(
        'admin-inventory',
        compact(
            'products',
            'totalProducts',
            'totalStock',
            'totalSold'
        )
    );
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN ADD STOCK
|--------------------------------------------------------------------------
*/

Route::post(
    '/admin/inventory/{product}/stock',
    function (
        Request $request,
        Product $product
    ) {

        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $request->validate([
            'quantity' =>
                'required|integer|min:1',
        ]);

        $quantity =
            (int) $request->quantity;

        $product->increment(
            'stock',
            $quantity
        );

        $product->increment(
            'stock_received',
            $quantity
        );

        return back()->with(
            'success',
            $quantity .
            ' new stock added successfully to ' .
            $product->name .
            '!'
        );
    }
);


/*
|--------------------------------------------------------------------------
| SUPER ADMIN COUPONS
|--------------------------------------------------------------------------
*/

Route::get('/admin/coupons', function () {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    $coupons =
        \App\Models\Coupon::latest()->get();

    return view(
        'admin-coupons',
        compact('coupons')
    );
});


Route::post('/admin/coupons', function (Request $request) {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    $request->validate([

        'code' =>
            'required|string|max:50|unique:coupons,code',

        'type' =>
            'required|in:percentage,fixed',

        'value' =>
            'required|numeric|min:1',

        'minimum_amount' =>
            'required|numeric|min:10000',

        'expires_at' =>
            'nullable|date',

    ]);

    if (
        $request->type === 'percentage' &&
        (float) $request->value > 100
    ) {

        return back()
            ->withErrors([
                'value' =>
                    'Percentage discount cannot exceed 100%.'
            ])
            ->withInput();
    }

    $code =
        strtoupper(
            trim($request->code)
        );

    \App\Models\Coupon::create([

        'code' =>
            $code,

        'type' =>
            $request->type,

        'value' =>
            $request->value,

        'minimum_amount' =>
            $request->minimum_amount,

        'expires_at' =>
            $request->expires_at ?: null,

        'is_active' =>
            true,

        'used_count' =>
            0,

    ]);

    return redirect('/admin/coupons')
        ->with(
            'success',
            'Coupon "' .
            $code .
            '" created successfully!'
        );
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN SETTINGS
|--------------------------------------------------------------------------
*/

Route::post('/admin/settings', function (Request $request) {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    $request->validate([

        'upi_id' =>
            'required|string|max:100',

        'payment_qr' =>
            'nullable|image|max:5120',

    ]);

    $settings =
        StoreSetting::first();

    if (!$settings) {
        $settings =
            new StoreSetting();
    }

    $settings->upi_id =
        $request->upi_id;

    if ($request->hasFile('payment_qr')) {

        $qrPath =
            $request
                ->file('payment_qr')
                ->getRealPath();

        $uploadedQr =
            (new \Cloudinary\Api\Upload\UploadApi())
            ->upload($qrPath);

        $settings->payment_qr =
            $uploadedQr['secure_url'];
    }

    $settings->save();

    return back()->with(
        'success',
        'Payment settings saved successfully!'
    );
});


Route::get('/admin/settings', function () {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    $settings =
        StoreSetting::first();

    return view(
        'admin-settings',
        compact('settings')
    );
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN DELETE PRODUCT
|--------------------------------------------------------------------------
*/

Route::delete(
    '/admin/products/{product}',
    function (Product $product) {

        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $product->delete();

        return redirect('/admin')
            ->with(
                'success',
                'Product removed successfully!'
            );
    }
);


/*
|--------------------------------------------------------------------------
| NORMAL ADMIN LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/admin-user/logout', function (Request $request) {

    $request->session()->forget(
        'normal_admin_logged_in'
    );

    $request->session()->regenerateToken();

    return redirect('/');

});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/admin/logout', function () {

    session()->forget(
        'admin_logged_in'
    );

    return redirect('/');

});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN NEW ORDER CHECK
|--------------------------------------------------------------------------
*/

Route::get('/admin/check-new-order', function () {

    if (!session('admin_logged_in')) {

        return response()->json([
            'success' => false
        ], 403);
    }

    $latestOrder =
        Order::with([
            'user',
            'product'
        ])
        ->latest('id')
        ->first();

    $newOrders =
        Order::where(
            'is_read',
            false
        )->count();

    if (!$latestOrder) {

        return response()->json([

            'success' =>
                true,

            'latest_order_id' =>
                0,

            'new_orders' =>
                $newOrders

        ]);
    }

    return response()->json([

        'success' =>
            true,

        'latest_order_id' =>
            $latestOrder->id,

        'new_orders' =>
            $newOrders,

        'order' => [

            'id' =>
                $latestOrder->id,

            'customer' =>
                $latestOrder->user
                    ? $latestOrder->user->name
                    : 'Guest',

            'total' =>
                number_format(
                    $latestOrder->total
                ),

        ],

    ]);
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN CUSTOMER ORDERS
|--------------------------------------------------------------------------
*/

Route::get('/admin/customer-orders', function () {

    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    $orders =
        Order::with([
            'user',
            'product'
        ])
        ->latest('id')
        ->get();

    return view(
        'admin-customer-orders',
        compact('orders')
    );
});


/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::get('/cart', [
    CartController::class,
    'index'
]);

Route::post('/cart/add/{product}', [
    CartController::class,
    'add'
]);

Route::post('/cart/remove/{id}', [
    CartController::class,
    'remove'
]);

Route::post('/cart/update/{id}', [
    CartController::class,
    'update'
]);

Route::post('/cart/apply-coupon', [
    CartController::class,
    'applyCoupon'
]);

Route::post('/cart/remove-coupon', [
    CartController::class,
    'removeCoupon'
]);

Route::post('/cart/checkout', [
    CartController::class,
    'checkout'
]);


/*
|--------------------------------------------------------------------------
| SIGN UP
|--------------------------------------------------------------------------
*/

Route::get('/signup', function () {

    return view('signup');

});


Route::post('/signup', function (Request $request) {

    $request->validate([

        'name' =>
            'required',

        'email' =>
            'required|email|unique:users,email',

        'password' =>
            'required|min:6|confirmed',

    ]);

    $user =
        User::create([

            'name' =>
                $request->name,

            'email' =>
                $request->email,

            'password' =>
                Hash::make(
                    $request->password
                ),

        ]);

    Auth::login($user);

    return redirect('/')
        ->with(
            'welcome',
            'Welcome, ' .
            $user->name .
            '!'
        );

});


/*
|--------------------------------------------------------------------------
| CUSTOMER LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {

    return view('login');

})->name('login');


Route::post('/login', function (Request $request) {

    $credentials =
        $request->validate([

            'email' =>
                'required|email',

            'password' =>
                'required',

        ]);

    if (Auth::attempt($credentials)) {

        $request
            ->session()
            ->regenerate();

        $user =
            Auth::user();

        if (
            session('checkout_after_login')
        ) {

            session()->forget(
                'checkout_after_login'
            );

            return redirect('/cart')
                ->with(
                    'success',
                    'Login successful! You can now place your order.'
                );
        }

        return redirect('/')
            ->with(
                'welcome',
                'Welcome back, ' .
                $user->name .
                '!'
            );
    }

    return back()
        ->withErrors([
            'email' =>
                'The email or password is incorrect.',
        ])
        ->withInput();
});


/*
|--------------------------------------------------------------------------
| MY ORDERS
|--------------------------------------------------------------------------
*/

Route::get('/my-orders', function () {

    if (!auth()->check()) {

        return redirect('/login')
            ->with(
                'error',
                'Please login to view your orders.'
            );
    }

    $orders =
        Order::with('product')
            ->where(
                'user_id',
                auth()->id()
            )
            ->latest()
            ->get();

    return view(
        'my-orders',
        compact('orders')
    );

})->name('my.orders');

Route::get('/customer/notifications', function () {

    if (!auth()->check()) {
        return response()->json([
            'notifications' => []
        ]);
    }

    $notifications = OrderNotification::where(
        'user_id',
        auth()->id()
    )
    ->where(
        'is_read',
        false
    )
    ->latest()
    ->get();

    return response()->json([
        'notifications' => $notifications
    ]);

});

Route::get('/admin/check-order-status-update', function () {

    if (!session('admin_logged_in')) {

        return response()->json([
            'success' => false
        ], 403);

    }


    $notification = \App\Models\OrderNotification::with([
        'order.user'
    ])
    ->latest()
    ->first();


    if (!$notification) {

        return response()->json([
            'success' => true,
            'notification' => null
        ]);

    }


    return response()->json([

        'success' => true,

        'notification' => [

            'id' =>
                $notification->id,

            'order_id' =>
                $notification->order_id,

            'status' =>
                $notification->status,

            'title' =>
                $notification->title,

            'message' =>
                $notification->message,

            'customer' =>
                optional(
                    $notification->order->user
                )->name ?? 'Customer',

        ],

    ]);

});