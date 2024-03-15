<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'dashboard')->name('dashboard');
Route::get('/customers/search', [CustomerController::class, 'searchByDNI'])->name('customers.search');
Route::resource('customers', CustomerController::class);
Route::resource('loans', LoanController::class);
