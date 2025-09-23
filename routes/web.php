<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountBookController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\ExpenseTypeController;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::get('/dashboard',[DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('application')->group(function () {

    Route::prefix('account-books')->group(function () {
        Route::get('/', [AccountBookController::class, 'index'])->name('application.account-books.index');
        Route::get('/edit', [AccountBookController::class, 'edit'])->name('application.account-books.edit');
        Route::get('/create', [AccountBookController::class, 'create'])->name('application.account-books.create');
        Route::get('/{id}', [AccountBookController::class, 'show'])->name('application.account-books.show');
        Route::put('/edit/{id}/update', [AccountBookController::class, 'update'])->name('application.account-books.update');
        Route::post('/', [AccountBookController::class, 'store'])->name('application.account-books.store');
    });

    Route::prefix('expense-types')->group(function () {
        Route::get('/', [ExpenseTypeController::class, 'index'])->name('application.expense-types.index');
        Route::get('/edit', [ExpenseTypeController::class, 'edit'])->name('application.expense-types.edit');
        Route::put('/edit/update', [ExpenseTypeController::class, 'update'])->name('application.expense-types.update');
        Route::post('/subcategory', [ExpenseTypeController::class, 'storeSubCategory'])->name('application.expense-types.store-sub-category');
        Route::post('/', [ExpenseTypeController::class, 'store'])->name('application.expense-types.store');
    });

    Route::prefix('beneficiearies')->group(function () {
        Route::get('/', [BeneficiaryController::class, 'index'])->name('application.beneficiaries.index');
        Route::get('/edit', [BeneficiaryController::class, 'edit'])->name('application.beneficiaries.edit');
        Route::post('/', [BeneficiaryController::class, 'store'])->name('application.beneficiaries.store');
        Route::put('/edit/update', [BeneficiaryController::class, 'update'])->name('application.beneficiaries.update');
    });

});

require __DIR__.'/auth.php';
