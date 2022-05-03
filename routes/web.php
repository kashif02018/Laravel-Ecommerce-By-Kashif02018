<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index'])->name('frontIndex');
Route::get('/product/{id}', [App\Http\Controllers\FrontEndController::class, 'productView'])->name('productView');


Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware(['auth', 'verified']);

// update profile Routes
Route::get('/profile-edit/{userID}', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('edit_profile')->middleware(['auth', 'verified']);
Route::post('/profile-update/{userID}', [App\Http\Controllers\HomeController::class, 'update_profile'])->name('update_profile')->middleware(['auth', 'verified']);




// manage products
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products')->middleware(['auth', 'verified']);

Route::get('/product-create', [App\Http\Controllers\ProductController::class, 'create'])->name('product_create')->middleware(['auth', 'verified']);
Route::post('/product-store', [App\Http\Controllers\ProductController::class, 'store'])->name('product_store')->middleware(['auth', 'verified']);

// update product
Route::get('/product-edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product_edit')->middleware(['auth', 'verified']);
Route::post('/product-update', [App\Http\Controllers\ProductController::class, 'update'])->name('product_update')->middleware(['auth', 'verified']);


// // order sesison
Route::post('/order/item-store-in-session', [App\Http\Controllers\OrderController::class, 'storeSession'])->name('storeSession');
Route::get('/order/view-cart', [App\Http\Controllers\OrderController::class, 'viewCart'])->name('viewCart');

// Place Order route
Route::post('/order/place/order', [App\Http\Controllers\OrderController::class, 'placeOrder'])->name('placeOrder');

// Manage Order route
Route::get('/manage/all-orders', [App\Http\Controllers\OrderController::class, 'orderIndex'])->name('orders');
Route::get('/manage/order-detail/{id}', [App\Http\Controllers\OrderController::class, 'orderView'])->name('orderSummary');
Route::post('/manage/order-status', [App\Http\Controllers\OrderController::class, 'manageOrderStatus'])->name('manageOrderStatus');

// Manage Wislist route
Route::post('/wishlist/module/store', [App\Http\Controllers\ProductController::class, 'storeWishlist'])->name('storeWishlist');
Route::get('/wishlist/module/remove', [App\Http\Controllers\ProductController::class, 'removeWishlist'])->name('removeWishlist');
Route::get('/wishlist/module/show-wishlist', [App\Http\Controllers\ProductController::class, 'showWishlist'])->name('showWishlist');

// Manage Compare List route
Route::post('/compareList/module/store', [App\Http\Controllers\ProductController::class, 'storecompareList'])->name('storecompareList');
Route::get('/compareList/module/remove', [App\Http\Controllers\ProductController::class, 'removecompareList'])->name('removecompareList');
Route::get('/compareList/module/show-compareList', [App\Http\Controllers\ProductController::class, 'showcompareList'])->name('showcompareList');


// Manage Reports route
Route::get('/report/all-customers', [App\Http\Controllers\ReportController::class, 'allCustomers'])->name('allCustomers');
Route::get('/report/sales-report', [App\Http\Controllers\ReportController::class, 'saleReport'])->name('saleReport');
Route::get('/report/top-selling-items', [App\Http\Controllers\ReportController::class, 'topItems'])->name('topItems');



