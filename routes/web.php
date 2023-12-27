<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Buyer\BuyerOrderController;
use App\Http\Controllers\Buyer\BuyerProductController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\RoleController;
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
    Route::get('/order', [SellerOrderController::class, 'index'])->name('orders.index');
    Route::get('/order/{id}/show', [SellerOrderController::class, 'show'])->name('orders.show');
    Route::post('/order/{id}/destroy', [SellerOrderController::class, 'destroy'])->name('orders.destroy');

    //products
    Route::get('/products', [SellerProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [SellerProductController::class, 'create'])->name('products.create');
    Route::post('/products', [SellerProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/show', [SellerProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [SellerProductController::class, 'edit'])->name('products.edit');
    Route::any('/products/{id}', [SellerProductController::class, 'update'])->name('products.update');
    Route::post('/products/{id}/destroy', [SellerProductController::class, 'destroy'])->name('products.destroy');

    //factor
    Route::get('/Factor', [FactorController::class, 'index'])->name('Factor.index');
    Route::get('/Factor/create', [FactorController::class, 'create'])->name('Factor.create');
    Route::post('/Factor', [FactorController::class, 'store'])->name('Factor.store');
    Route::get('/Factor/{id}/edit', [FactorController::class, 'edit'])->name('Factor.edit');
    Route::any('/Factor/{id}', [FactorController::class, 'update'])->name('Factor.update');
    Route::post('/Factor/{id}/destroy', [FactorController::class, 'destroy'])->name('Factor.destroy');
});

Route::middleware(['auth', 'buyer'])->name('buyer.')->prefix('buyer')->group(function(){

    //order
    Route::get('/order', [BuyerOrderController::class, 'index'])->name('orders.index');
    Route::get('/order/create',[BuyerOrderController::class, 'create'])->name('orders.create');
    Route::get('/order/{id}/show', [BuyerOrderController::class, 'show'])->name('orders.show');
    Route::get('/order/{id}/edit', [BuyerOrderController::class, 'edit'])->name('order.edit');
    Route::any('/order/{id}', [BuyerOrderController::class, 'update'])->name('order.update');
    Route::post('/order/{id}/destroy', [BuyerOrderController::class, 'destroy'])->name('order.destroy');


    //products
    Route::get('/products/{id}', [BuyerProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}/show', [BuyerProductController ::class, 'show'])->name('products.show');


    //factor
    Route::get('/Factor', [FactorController::class, 'index'])->name('Factor.index');
    Route::get('/Factor/create', [FactorController::class, 'create'])->name('Factor.create');
    Route::post('/Factor', [FactorController::class, 'store'])->name('Factor.store');
    Route::get('/Factor/{id}/edit', [FactorController::class, 'edit'])->name('Factor.edit');
    Route::any('/Factor/{id}', [FactorController::class, 'update'])->name('Factor.update');
    Route::post('/Factor/{id}/destroy', [FactorController::class, 'destroy'])->name('Factor.destroy');

});
