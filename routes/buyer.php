<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buyer\BuyerFactorController;
use App\Http\Controllers\Buyer\BuyerOrderController;
use App\Http\Controllers\Buyer\BuyerProductController;


Route::middleware(['auth', 'buyer'])->name('buyer.')->prefix('buyer')->group(function () {

    //order
    Route::get('/order', [BuyerOrderController::class, 'index'])->name('orders.index');
    Route::any('/order/{product_id}/create', [BuyerOrderController::class, 'create'])->name('orders.create');
    Route::post('/order', [BuyerOrderController::class, 'store'])->name('orders.store');
    Route::get('/order/{id}/show', [BuyerOrderController::class, 'show'])->name('orders.show');
    Route::any('/order/{id}/edit', [BuyerOrderController::class, 'edit'])->name('orders.edit');
    Route::any('/order/{id}', [BuyerOrderController::class, 'update'])->name('orders.update');
    Route::post('/order/{id}/destroy', [BuyerOrderController::class, 'destroy'])->name('orders.destroy');
    Route::post('/order/{id}/pay', [BuyerOrderController::class, 'pay'])->name('orders.pay');


    //products
    Route::get('/products/{id}', [BuyerProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}/show', [BuyerProductController::class, 'show'])->name('products.show');


    //factor
    Route::get('/factor', [BuyerFactorController::class, 'index'])->name('factor.index');
    Route::get('/factor/create', [BuyerFactorController::class, 'create'])->name('factor.create');
    Route::post('/factor', [BuyerFactorController::class, 'store'])->name('factor.store');
    Route::get('/factor/{id}/edit', [BuyerFactorController::class, 'edit'])->name('factor.edit');
    Route::any('/factor/{id}', [BuyerFactorController::class, 'update'])->name('factor.update');
    Route::any('/factor/{id}', [BuyerFactorController::class, 'update_status'])->name('factor.update_status');
    Route::post('/factor/{id}/destroy', [BuyerFactorController::class, 'destroy'])->name('factor.destroy');
});
