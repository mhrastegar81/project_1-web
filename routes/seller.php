<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\Seller\SellerProductController;


Route::middleware('seller')->prefix('/seller')->group(function () {
    //order
    Route::get('/order', [SellerOrderController::class, 'index'])->name('seller.orders.index');
    Route::get('/order/{id}/show', [SellerOrderController::class, 'show'])->name('seller.orders.show');
    Route::post('/order/{id}/destroy', [SellerOrderController::class, 'destroy'])->name('seller.orders.destroy');

    //products
    Route::get('/products/index/{category_id?}', [SellerProductController::class, 'index'])->name('seller.products.index')->middleware(['auth', 'seller']);
    Route::get('/products/create', [SellerProductController::class, 'create'])->name('seller.products.create');
    Route::any('/products', [SellerProductController::class, 'store'])->name('seller.products.store');
    Route::get('/products/{id}/show', [SellerProductController::class, 'show'])->name('seller.products.show');
    Route::get('/products/{id}/edit', [SellerProductController::class, 'edit'])->name('seller.products.edit');
    Route::any('/products/{id}', [SellerProductController::class, 'update'])->name('seller.products.update');
    Route::post('/products/{id}/destroy', [SellerProductController::class, 'destroy'])->name('seller.products.destroy');

    //factor
    // Route::get('/Factor', [SellerF::class, 'index'])->name('Factor.index');
    // Route::get('/Factor/create', [FactorController::class, 'create'])->name('Factor.create');
    // Route::post('/Factor', [FactorController::class, 'store'])->name('Factor.store');
    // Route::get('/Factor/{id}/edit', [FactorController::class, 'edit'])->name('Factor.edit');
    // Route::any('/Factor/{id}', [FactorController::class, 'update'])->name('Factor.update');
    // Route::post('/Factor/{id}/destroy', [FactorController::class, 'destroy'])->name('Factor.destroy');
})->name('seller_routes');
