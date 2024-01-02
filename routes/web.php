<?php

use App\Http\Controllers\RoleController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\QueryBuilder;

Route::get('/',function(){
    $result = QueryBuilder::for(User::class)->allowedFilters([
        'user_name','email'
    ])->get();
    return $result;
});
Route::any('/workplace', [RoleController::class, 'index'])->name('workplace')->middleware(['auth', 'verified']);


Route::get('/', function () {
    return redirect(route('workplace'));
});

Route::get('/support',function(){

    return view('support');

})->name('support');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/seller.php';
require __DIR__.'/buyer.php';



