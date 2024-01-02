<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('seller/waiting',function(){
    return view('Seller.waiting_seller');
})->name('waiting_seller');

Route::prefix('/workplace')->group(function (){
    Route::get('/admin', [RoleController::class, 'index'])->middleware(['admin'])->name('admin.workplace');
    Route::get('/seller', [RoleController::class, 'index'])->middleware(['seller'])->name('seller.workplace');
    Route::get('/buyer', [RoleController::class, 'index'])->middleware(['buyer'])->name('buyer.workplace');
});

Route::get('/support',function(){
    return view('support');
})->name('support');



require __DIR__."/auth.php";
require __DIR__.'/admin.php';
require __DIR__.'/seller.php';
require __DIR__.'/buyer.php';



