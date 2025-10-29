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

    Route::prefix('expense-types')->group(function () {
        Route::get('/', [ExpenseTypeController::class, 'index'])->name('application.expense-types.index');
    });

    Route::prefix('beneficiearies')->group(function () {
        Route::get('/', [BeneficiaryController::class, 'index'])->name('application.beneficiaries.index');
        Route::get('/edit', [BeneficiaryController::class, 'edit'])->name('application.beneficiaries.edit');
        Route::post('/', [BeneficiaryController::class, 'store'])->name('application.beneficiaries.store');
        Route::put('/edit/update', [BeneficiaryController::class, 'update'])->name('application.beneficiaries.update');
    });

});

require __DIR__.'/auth.php';
