<?php

use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BalanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardHomeController::class, 'index'])->middleware(['auth', 'user-access:admin'])->name('dashboard');
Route::put('/dashboard/order/{order}/status', [OrderController::class, 'updateStatus'])->middleware(['auth', 'user-access:admin'])->name('update.order.status');
Route::get('/dashboard/orders', [DashboardHomeController::class, 'indexOrder'])->middleware(['auth', 'user-access:admin'])->name('dashboard.order');
Route::delete('/dashboard/orders/{id}/delete', [DashboardHomeController::class, 'deleteOrder'])->middleware(['auth', 'user-access:admin'])->name('dashboard.order.delete');

Route::get('/dashboard/products', [DashboardHomeController::class, 'indexProduct'])->middleware(['auth', 'user-access:admin'])->name('dashboard.product');
Route::get('/dashboard/products/add', [DashboardHomeController::class, 'indexStoreProduct'])->middleware(['auth', 'user-access:admin'])->name('dashboard.product.add');
Route::post('/dashboard/products/add', [DashboardHomeController::class, 'storeProduct'])->middleware(['auth', 'user-access:admin'])->name('dashboard.product.post');
Route::get('/dashboard/products/{id}/update', [DashboardHomeController::class, 'indexUpdateProduct'])->middleware(['auth', 'user-access:admin'])->name('dashboard.product.update');
Route::put('/dashboard/products/{id}/update', [DashboardHomeController::class, 'updateProduct'])->middleware(['auth', 'user-access:admin'])->name('dashboard.product.put');
Route::delete('/dashboard/products/{id}/delete', [DashboardHomeController::class, 'deleteProduct'])->middleware(['auth', 'user-access:admin'])->name('dashboard.product.delete');

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
