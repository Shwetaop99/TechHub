<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| HOME & PRODUCTS
|--------------------------------------------------------------------------
*/

Route::get('/', [ProductController::class, 'index']);

Route::get('/category/{category}', [ProductController::class, 'category']);


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

    $upload = (new \Cloudinary\Api\Upload\UploadApi())->upload(
        public_path('test.jpg')
    );

    return $upload['secure_url'];
});


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {

    $products = Product::all();

    $totalProducts = Product::count();

    $totalSold = Product::sum('sold_count');

    $totalCategories = Product::distinct('category')->count('category');

    $totalStock = Product::sum('stock');

    return view('admin', compact(
        'products',
        'totalProducts',
        'totalSold',
        'totalCategories',
        'totalStock'
    ));
});


/*
|--------------------------------------------------------------------------
| ADD PRODUCT PAGE
|--------------------------------------------------------------------------
*/

Route::get('/admin/products/create', function () {

    return view('admin-products-create');

});


/*
|--------------------------------------------------------------------------
| ADD PRODUCT
|--------------------------------------------------------------------------
*/

Route::post('/admin/products', function (Request $request) {

    /*
    |--------------------------------------------------------------------------
    | Validate Product
    |--------------------------------------------------------------------------
    */

    $request->validate([

        'name' => 'required',

        'category' => 'required',

        'price' => 'required|numeric',

        'stock' => 'required|integer',

        'description' => 'required',

        'image' => 'required|image|max:5120',

    ]);


    /*
    |--------------------------------------------------------------------------
    | Upload Image To Cloudinary
    |--------------------------------------------------------------------------
    */

    $imagePath = $request->file('image')->getRealPath();

    $uploadedImage = (new \Cloudinary\Api\Upload\UploadApi())->upload(
        $imagePath
    );

    $image = $uploadedImage['secure_url'];


    /*
    |--------------------------------------------------------------------------
    | Save Product
    |--------------------------------------------------------------------------
    */

    Product::create([

        'name' => $request->name,

        'category' => $request->category,

        'price' => $request->price,

        'description' => $request->description,

        'image' => $image,

        'stock' => $request->stock,

        'sold_count' => 0,

    ]);


    return redirect('/admin')
        ->with(
            'success',
            'Product added successfully!'
        );

});


/*
|--------------------------------------------------------------------------
| DELETE PRODUCT
|--------------------------------------------------------------------------
*/

Route::delete('/admin/products/{product}', function (Product $product) {

    $product->delete();

    return redirect('/admin')
        ->with(
            'success',
            'Product removed successfully!'
        );

});


/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index']);

Route::post('/cart/add/{product}', [CartController::class, 'add']);

Route::post('/cart/remove/{id}', [CartController::class, 'remove']);

Route::post('/cart/update/{id}', [CartController::class, 'update']);


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

        'name' => 'required',

        'email' => 'required|email|unique:users,email',

        'password' => 'required|min:6|confirmed',

    ]);


    $user = User::create([

        'name' => $request->name,

        'email' => $request->email,

        'password' => Hash::make($request->password),

    ]);


    Auth::login($user);


    return redirect('/')

        ->with(
            'welcome',
            'Welcome, ' . $user->name . '!'
        );

});


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {

    return view('login');

});


Route::post('/login', function (Request $request) {

    $credentials = $request->validate([

        'email' => 'required|email',

        'password' => 'required',

    ]);


    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        $user = Auth::user();

        return redirect('/')

            ->with(
                'welcome',
                'Welcome back, ' . $user->name . '!'
            );

    }


    return back()

        ->withErrors([

            'email' => 'The email or password is incorrect.',

        ])

        ->withInput();

});