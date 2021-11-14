<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin;

require __DIR__ . '/auth.php';
Route::name('master.')->prefix('master')->middleware('auth', 'is_admin')->group(function () {
    Route::get('/', [Admin\SiteController::class, 'index'])->name('home');
    Route::resource('orders', Admin\OrderController::class);
    Route::resource('category', Admin\CategoryController::class);
    Route::resource('user', Admin\UserController::class);
    Route::resource('product', Admin\ProductController::class);
    Route::delete('deleteimages/{id}', [Admin\ProductController::class, 'deleteImages'])->name('deleteImages');
});

Route::get('/', [Controllers\SiteController::class, 'index'])->name('home');
Route::get('/cart', [Controllers\CartController::class, 'index'])->name('cartIndex');
Route::post('/cart/{slug}', [Controllers\CartController::class, 'store'])->name('cart.store');
Route::post('/cart/delete/{id}', [Controllers\CartController::class, 'delete'])->name('cart.delete');
Route::get('/cart/destroy', [Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/search', [Controllers\SiteController::class, 'search'])->name('search');
Route::post('/product/order', [Controllers\CartController::class, 'orders'])->name('order');
Route::get('/{category:slug}/{childCategory:slug?}/{childCategory2?}', [Controllers\CategoryController::class, 'category'])->name('category');
Route::get('/{category}/{childCategory}/{childCategory2}/{productSlug}/{product}', [Controllers\ProductController::class, 'product'])->name('show');




