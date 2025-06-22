<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthentication;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;


// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('layouts.home');

// Shop
Route::get('/shop', [ProductController::class, 'index'])->name('shop');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CartController::class, 'placeOrder'])->name('checkout.placeOrder');

// Các trang tĩnh
Route::get('/ourstory', [PageController::class, 'ourstory'])->name('ourstory');
Route::get('/services', [PageController::class, 'services'])->name('services');

// Dashboard (yêu cầu đăng nhập)
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



// middleware check 
Route::middleware(['auth',AdminAuthentication::class])->group(function () {
    // Route::get('/admin/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
});



// Profile (yêu cầu đăng nhập)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Thêm route đổi mật khẩu nếu dùng blade @include('profile.partials.update-password-form')
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});

// Orders
// Route::get('/orders/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
// Route::get('/orders/{order}/track', [App\Http\Controllers\OrderController::class, 'track'])->name('orders.track');


// login các thứ 

    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');
    


    Route::get('/register',[App\Http\Controllers\Auth\Register::class,'showForm'])->name('register');
    Route::post('/register',[App\Http\Controllers\Auth\Register::class,'register']);



// logout
Route::middleware('auth')->group(function () {
    Route::get('/confirm-logout', [LogoutController::class, 'confirmLogout'])->name('confirm.logout');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
// Route cho user
Route::middleware('auth')->group(function () {
    Route::get('/orders/track', [App\Http\Controllers\OrderController::class, 'track'])->name('orders.track');
    Route::get('/orders/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
});



// Route cho admin
Route::middleware(['auth', AdminAuthentication::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', App\Http\Controllers\Admin\ProductsController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoriesController::class);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    Route::resource('shippers', App\Http\Controllers\Admin\ShipperController::class);
});

// history 
Route::middleware('auth')->group(function () {
    Route::get('/orders/history', [App\Http\Controllers\OrderController::class, 'history'])->name('orders.history');
    Route::post('/reviews/{product}', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
});
Route::post('/reviews/{product}', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');

// Trang chi tiết sản phẩm
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Shipper routes
Route::middleware(['auth'])->prefix('shipper')->name('shipper.')->group(function () {
    Route::get('orders', [\App\Http\Controllers\Shipper\OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}/edit', [\App\Http\Controllers\Shipper\OrderController::class, 'edit'])->name('orders.edit');
    Route::put('orders/{order}', [\App\Http\Controllers\Shipper\OrderController::class, 'update'])->name('orders.update');
    Route::get('progress', [\App\Http\Controllers\Shipper\OrderController::class, 'progress'])->name('orders.progress');
});

