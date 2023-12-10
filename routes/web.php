<?php

use App\Http\Controllers\modell_bindingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});


Route::view('/login', 'first_project.authorize.login')->name('login');

Route::view('/register', 'first_project.authorize.register')->name('register');

Route::get('/workplace', function () {
    return view('first_project.workplace');
})->name('workplace');

//users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.addUser');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::any('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::post('/users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');


//products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::any('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');

//orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::any('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::post('/orders/{id}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');


Route::get('/user-show/{user}',[modell_bindingController::class , 'index']);
