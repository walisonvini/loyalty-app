<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/search', [CustomerController::class, 'search'])->name('customers.search');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');

Route::post('/customers/{customer}/add-points', [CustomerController::class, 'addPoints'])->name('customers.add-points');