<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserstatusController;
use App\Http\Controllers\Admin\AdminFactorController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


//UserWait
Route::post('/users/accept/{id}', [UserstatusController::class, 'accept'])->name('users.accept');
Route::post('/users/reject/{id}', [UserstatusController::class, 'reject'])->name('users.reject');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {

    //AdminUserRoutes
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/filter', [AdminUserController::class, 'filter'])->name('users.filter');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::get('/users{id}', [AdminUserController::class, 'update'])->name('users.update');
    Route::any('/users/{id}/delete', [AdminUserController::class, 'destroy'])->name('users.destroy');
    //AdminProductRoutes
    Route::any('/products/{id}/index', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/show', [AdminProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::any('/products/{id}', [AdminProductController::class, 'update'])->name('products.update');
    Route::get('/products/{id}/delete', [AdminProductController::class, 'destroy'])->name('products.destroy');
    //AdminOrderRoutes
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::any('/orders/create', [AdminOrderController::class, 'create'])->name('orders.create');
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
})->name('admin_routes');
