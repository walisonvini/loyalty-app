<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;

Route::apiResource('customers', CustomerController::class);

Route::post('/customers/{customer}/add-points', [CustomerController::class, 'addPoints']);
