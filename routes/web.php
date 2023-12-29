<?php

use App\Http\Controllers\Admin\AdminFactorController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Buyer\BuyerFactorController;
use App\Http\Controllers\Buyer\BuyerOrderController;
use App\Http\Controllers\Buyer\BuyerProductController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserstatusController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect(route('workplace'));
});
Route::any('/workplace', [RoleController::class, 'index'])->name('workplace')->middleware(['auth', 'verified']);

Route::get('/support',function(){
    return view('support');
})->name('support');

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


Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {

    //AdminUserRoutes
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::get('/users{id}', [AdminUserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/delete', [AdminUserController::class, 'destroy'])->name('users.destroy');
    //AdminProductRoutes
    Route::any('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::any('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::any('/products/{id}/show', [AdminProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::any('/products/{id}', [AdminProductController::class, 'update'])->name('products.update');
    Route::get('/products/{id}/delete', [AdminProductController::class, 'destroy'])->name('products.destroy');
    //AdminOrderRoutes
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [AdminOrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [AdminOrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}/edit', [AdminOrderController::class, 'edit'])->name('orders.edit');
    Route::get('/orders/{id}', [AdminOrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/{id}/delete', [AdminOrderController::class, 'destroy'])->name('orders.destroy');
    //AdminFactorRoutes
    Route::get('/factors', [AdminFactorController::class, 'index'])->name('factors.index');
    Route::get('/factors/create', [AdminFactorController::class, 'create'])->name('factors.create');
    Route::post('/factors', [AdminFactorController::class, 'store'])->name('factors.store');
    Route::get('/factors/{id}/edit', [AdminFactorController::class, 'edit'])->name('factors.edit');
    Route::get('/factors/{id}', [AdminFactorController::class, 'update'])->name('factors.update');
    Route::get('/factors/{id}/delete', [AdminFactorController::class, 'destroy'])->name('factors.destroy');
    Route::post('/factors/update_status/{id}', [AdminFactorController::class, 'update_status'])->name('factors.update_status');
});
