<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserRoleController;
use \App\Http\Controllers\Admin\ProductController;


use \App\Http\Controllers\Frontend\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('/user-role', [UserRoleController::class, 'index'])->name('user-role.index');
    Route::get('/user-role/{user}/edit', [UserRoleController::class, 'edit'])->name('user-role.edit');
    Route::put('/user-role/{user}', [UserRoleController::class, 'update'])->name('user-role.update');
    Route::resource('product', ProductController::class);
    Route::resource('users', UserController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



