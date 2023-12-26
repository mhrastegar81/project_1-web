//Factor
Route::get('/Factor', [FactorController::class, 'index'])->name('Factor.index');
Route::get('/Factor/create', [FactorController::class, 'create'])->name('Factor.create');
Route::post('/Factor', [FactorController::class, 'store'])->name('Factor.store');
Route::get('/Factor/{id}/edit', [FactorController::class, 'edit'])->name('Factor.edit');
Route::any('/Factor/{id}', [FactorController::class, 'update'])->name('Factor.update');
Route::post('/Factor/{id}/destroy', [FactorController::class, 'destroy'])->name('Factor.destroy');

Route::middleware(['auth', 'seller'])->prefix('/seller')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('products.index');
    Route::get('/create', [sellerController::class, 'create'])->name('products.create');
    Route::post('/', [sellerController::class, 'store'])->name('products.store');
    Route::get('/{id}/edit', [sellerController::class, 'edit'])->name('products.edit');
    Route::any('/{id}', [sellerController::class, 'update'])->name('products.update');
    Route::post('/{id}/destroy', [sellerController::class, 'destroy'])->name('products.destroy');
});

Route::middleware(['auth', 'buyer'])->prefix('/buyer')->group(function () {
    Route::get('/', [BuyerController::class, 'index'])->name('orders.index');
    Route::get('/create', [BuyerController::class, 'create'])->name('orders.create');
    Route::post('/', [BuyerController::class, 'store'])->name('orders.store');
    Route::get('/{id}/edit', [BuyerController::class, 'edit'])->name('orders.edit');
    Route::any('/{id}', [BuyerController::class, 'update'])->name('orders.update');
    Route::post('/{id}/destroy', [BuyerController::class, 'destroy'])->name('orders.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('users.index');
    Route::get('/create', [AdminController::class, 'create'])->name('users.addUser');
    Route::post('/', [AdminController::class, 'store'])->name('users.store');
    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::any('/{id}/update', [AdminController::class, 'update'])->name('users.update');
    Route::post('/{id}/destroy', [AdminController::class, 'destroy'])->name('users.destroy');
});
