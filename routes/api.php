<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/search', [CustomerController::class, 'search'])->name('customers.search');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');


Route::post('/customers/{id}/add-points', [CustomerController::class, 'addPoints'])->name('customers.add-points');
Route::get('/customers/{id}/balance-with-redemptions', [CustomerController::class, 'getBalanceWithRedemptions'])->name('customers.balance-with-redemptions');
Route::post('/customers/{id}/redeem-reward', [CustomerController::class, 'redeemReward'])->name('customers.redeem-reward');