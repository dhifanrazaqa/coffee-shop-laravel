<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BalanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user-access:admin'])->name('dashboard');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/{category}', [MenuController::class, 'indexByCategory'])->name('menu.category');

Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/order', [OrderController::class, 'store'])->middleware(['auth', 'user-access:user'])->name('order.store');

Route::get('/history', [HistoryController::class, 'index'])->middleware(['auth', 'user-access:user'])->name('order.history');

Route::get('/balance', [BalanceController::class, 'show'])->name('balance.show');
Route::post('/balance/topup', [BalanceController::class, 'topup'])->name('balance.topup');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
