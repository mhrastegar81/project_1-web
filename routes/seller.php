<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\Seller\SellerProductController;


Route::middleware(['auth', 'seller'])->name('seller.')->prefix('/seller')->group(function () {
    //order
    Route::get('/order', [SellerOrderController::class, 'index'])->name('orders.index');
    Route::get('/order/{id}/show', [SellerOrderController::class, 'show'])->name('orders.show');
    Route::post('/order/{id}/destroy', [SellerOrderController::class, 'destroy'])->name('orders.destroy');

    //products
    Route::get('/products/index/{category_id?}', [SellerProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [SellerProductController::class, 'create'])->name('products.create');
    Route::any('/products', [SellerProductController::class, 'store'])->name('products.store');
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
