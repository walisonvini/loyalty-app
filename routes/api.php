<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;

// 001
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store')->middleware('token.auth:001');

// 002
Route::get('/customers/search', [CustomerController::class, 'search'])->name('customers.search')->middleware('token.auth:002');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show')->middleware('token.auth:002');

// 003
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index')->middleware('token.auth:003');

// 004
Route::get('/customers/{id}/balance-with-redemptions', [CustomerController::class, 'getBalanceWithRedemptions'])->name('customers.balance-with-redemptions')->middleware('token.auth:004');

// 005
Route::post('/customers/{id}/redeem-reward', [CustomerController::class, 'redeemReward'])->name('customers.redeem-reward')->middleware('token.auth:005');

// 006
Route::post('/customers/{id}/add-points', [CustomerController::class, 'addPoints'])->name('customers.add-points')->middleware('token.auth:006');