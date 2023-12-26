<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\modell_bindingController;
use App\Http\Controllers\Seller\OrderController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\seller;
use Illuminate\Support\Facades\Route;



Route::get('/', function () { return redirect(route('workplace')); });
Route::get('/workplace', [RoleController::class, 'index'])->name('workplace')->middleware(['auth', 'verified']);


Route::middleware('guest')->prefix('/guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::any('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'seller'])->name('seller.')->prefix('/seller')->group(function () {
    //order
    Route::get('/order', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/order/{id}/show', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/order/{id}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');

    //products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::any('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::post('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');

    //factor
    Route::get('/Factor', [FactorController::class, 'index'])->name('Factor.index');
    Route::get('/Factor/create', [FactorController::class, 'create'])->name('Factor.create');
    Route::post('/Factor', [FactorController::class, 'store'])->name('Factor.store');
    Route::get('/Factor/{id}/edit', [FactorController::class, 'edit'])->name('Factor.edit');
    Route::any('/Factor/{id}', [FactorController::class, 'update'])->name('Factor.update');
    Route::post('/Factor/{id}/destroy', [FactorController::class, 'destroy'])->name('Factor.destroy');
});






