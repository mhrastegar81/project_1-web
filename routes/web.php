<?php

// --Start authentication--//
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
// --End authentication--//



// --Start workplace--//
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
// --End workplace--//



// --Start Admin Panel-- //
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserstatusController;
use App\Http\Controllers\Admin\AdminFactorController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// --End Admin Panel-- //



// -- Start Buyer Panel-- //
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buyer\BuyerFactorController;
use App\Http\Controllers\Buyer\BuyerOrderController;
use App\Http\Controllers\Buyer\BuyerProductController;
// -- End Buyer Panel-- //



// --Start Seller Panel-- //
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\Seller\SellerProductController;
// --End Seller Panel-- //

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::any('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');
// --End authentication--//


// --Start workplace--//

Route::prefix('/workplace')->group(function () {
    Route::get('/admin', [RoleController::class, 'index'])->middleware(['admin'])->name('admin.workplace');
    Route::get('/seller', [RoleController::class, 'index'])->middleware(['seller'])->name('seller.workplace');
    Route::get('/buyer', [RoleController::class, 'index'])->middleware(['buyer'])->name('buyer.workplace');
})->middleware('auth:sanctum');


Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('seller/waiting', function () {
    return view('Seller.waiting_seller');
})->name('waiting_seller');

// --End workplace--//


Route::middleware('auth:sanctum')->group(function () {
    // --Start Admin Panel Routs-- //

    //UserWait
    Route::post('/users/accept/{id}', [UserstatusController::class, 'accept'])->name('users.accept');
    Route::post('/users/reject/{id}', [UserstatusController::class, 'reject'])->name('users.reject');

    Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {

        // --Start Admin Users Routes-- //
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/filter', [AdminUserController::class, 'filter'])->name('users.filter');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::get('/users{id}', [AdminUserController::class, 'update'])->name('users.update');
        Route::any('/users/{id}/delete', [AdminUserController::class, 'destroy'])->name('users.destroy');
        // --End Admin Users Routes-- //


        // --Start Admin Products Routes-- //
        Route::any('/products/index/{category_id?}', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/filter/{category_id?}', [AdminProductController::class, 'filter'])->name('products.filter');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/show', [AdminProductController::class, 'show'])->name('products.show');
        Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::any('/products/{id}', [AdminProductController::class, 'update'])->name('products.update');
        Route::get('/products/{id}/delete', [AdminProductController::class, 'destroy'])->name('products.destroy');
        // --End Admin Products Routes-- //

        // --Start Admin Orders Routes-- //
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/filter/{category_id?}', [AdminOrderController::class, 'filter'])->name('orders.filter');
        Route::any('/orders/create', [AdminOrderController::class, 'create'])->name('orders.create');
        Route::post('/orders', [AdminOrderController::class, 'store'])->name('orders.store');
        Route::get('/orders/{id}/edit', [AdminOrderController::class, 'edit'])->name('orders.edit');
        Route::get('/orders/{id}', [AdminOrderController::class, 'update'])->name('orders.update');
        Route::get('/orders/{id}/delete', [AdminOrderController::class, 'destroy'])->name('orders.destroy');
        // --End Admin Orders Routes-- //

        // --Start Admin factors Routes-- //
        Route::get('/factors', [AdminFactorController::class, 'index'])->name('factors.index');
        Route::get('/factors/create', [AdminFactorController::class, 'create'])->name('factors.create');
        Route::post('/factors', [AdminFactorController::class, 'store'])->name('factors.store');
        Route::get('/factors/{id}/edit', [AdminFactorController::class, 'edit'])->name('factors.edit');
        Route::get('/factors/{id}', [AdminFactorController::class, 'update'])->name('factors.update');
        Route::get('/factors/{id}/delete', [AdminFactorController::class, 'destroy'])->name('factors.destroy');
        Route::post('/factors/update_status/{id}', [AdminFactorController::class, 'update_status'])->name('factors.update_status');
        // --End Admin factors Routes-- //

    })->name('admin_routes');

    // --End Admin Panel Routs-- //





    // -- Start Buyer Panel Routs-- //
    Route::middleware(['auth', 'buyer'])->name('buyer.')->prefix('buyer')->group(function () {

        // -- Start Buyer Orders Routs-- //
        Route::get('/order', [BuyerOrderController::class, 'index'])->name('orders.index');
        Route::any('/order/{product_id}/create', [BuyerOrderController::class, 'create'])->name('orders.create');
        Route::post('/order', [BuyerOrderController::class, 'store'])->name('orders.store');
        Route::get('/order/{id}/show', [BuyerOrderController::class, 'show'])->name('orders.show');
        Route::any('/order/{id}/edit', [BuyerOrderController::class, 'edit'])->name('orders.edit');
        Route::any('/order/{id}', [BuyerOrderController::class, 'update'])->name('orders.update');
        Route::post('/order/{id}/destroy', [BuyerOrderController::class, 'destroy'])->name('orders.destroy');
        Route::post('/order/{id}/pay', [BuyerOrderController::class, 'pay'])->name('orders.pay');
        // -- End Buyer Orders Routs-- //

        // -- Start Buyer Products Routs-- //
        Route::get('/products/{category_id}', [BuyerProductController::class, 'index'])->name('products.index');
        Route::get('/products/{id}/show', [BuyerProductController::class, 'show'])->name('products.show');
        // -- End Buyer Products Routs-- //

        // -- Start Buyer factors Routs-- //
        Route::get('/factor', [BuyerFactorController::class, 'index'])->name('factor.index');
        Route::get('/factor/create', [BuyerFactorController::class, 'create'])->name('factor.create');
        Route::post('/factor', [BuyerFactorController::class, 'store'])->name('factor.store');
        Route::get('/factor/{id}/edit', [BuyerFactorController::class, 'edit'])->name('factor.edit');
        Route::any('/factor/{id}', [BuyerFactorController::class, 'update'])->name('factor.update');
        Route::any('/factor/{id}', [BuyerFactorController::class, 'update_status'])->name('factor.update_status');
        Route::post('/factor/{id}/destroy', [BuyerFactorController::class, 'destroy'])->name('factor.destroy');
        // -- End Buyer factors Routs-- //

    })->name('buyer_routes');
    // -- And Buyer Panels Routs-- //





    // --Start Seller Panel Routs-- //
    Route::middleware('seller')->prefix('/seller')->group(function () {
        // --Start Seller Orders Routs-- //
        Route::get('/order', [SellerOrderController::class, 'index'])->name('seller.orders.index');
        Route::get('/order/{id}/show', [SellerOrderController::class, 'show'])->name('seller.orders.show');
        Route::post('/order/{id}/destroy', [SellerOrderController::class, 'destroy'])->name('seller.orders.destroy');
        // --End Seller Orders Orders Routs-- //
        // --Start Seller Products Routs-- //
        Route::get('/products/index/{category_id?}', [SellerProductController::class, 'index'])->name('seller.products.index');
        Route::get('/products/create', [SellerProductController::class, 'create'])->name('seller.products.create');
        Route::any('/products', [SellerProductController::class, 'store'])->name('seller.products.store');
        Route::get('/products/{id}/show', [SellerProductController::class, 'show'])->name('seller.products.show');
        Route::get('/products/{id}/edit', [SellerProductController::class, 'edit'])->name('seller.products.edit');
        Route::any('/products/{id}', [SellerProductController::class, 'update'])->name('seller.products.update');
        Route::post('/products/{id}/destroy', [SellerProductController::class, 'destroy'])->name('seller.products.destroy');
        // --End Seller Products Routs-- //
    })->name('seller_routes');
    // --End Seller Products Routs-- //
});
