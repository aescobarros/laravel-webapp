<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExpenseTypeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('application')->group(function () {
    Route::prefix('expense-types')->group(function () {
        Route::get('/', [ExpenseTypeController::class, 'index'])->name('application.expense-types.index');
        Route::get('/edit/edit', [ExpenseTypeController::class, 'edit'])->name('application.expense-types.edit');
        Route::put('/edit/update', [ExpenseTypeController::class, 'update'])->name('application.expense-types.update');
        Route::post('/subcategory', [ExpenseTypeController::class, 'storeSubCategory'])->name('application.expense-types.store-sub-category');
        Route::post('/', [ExpenseTypeController::class, 'store'])->name('application.expense-types.store');

        

    });

});

require __DIR__.'/auth.php';
