<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserRoleController;
use \App\Http\Controllers\Admin\ProductController as AdminProductController;


use \App\Http\Controllers\Frontend\HomeController;
use \App\Http\Controllers\Frontend\CartController;
use \App\Http\Controllers\Frontend\ProductController;
use \App\Http\Controllers\Frontend\CheckoutController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/thank-you', function () {
    $orderId = session('order_id');
    return view('frontend.thankyou', compact('orderId'));
})->name('thankyou');

Route::get('/support', function () {
    return view('frontend.support');
})->name('support');

Route::get('/test-email', function () {
    return view('emails.order-confirmation');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('/user-role', [UserRoleController::class, 'index'])->name('user-role.index');
    Route::get('/user-role/{user}/edit', [UserRoleController::class, 'edit'])->name('user-role.edit');
    Route::put('/user-role/{user}', [UserRoleController::class, 'update'])->name('user-role.update');
    Route::resource('product', AdminProductController::class);
    Route::resource('users', UserController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



