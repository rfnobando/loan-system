<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InstallmentController;
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

// Dashboard
Route::view('/', 'dashboard')->name('dashboard');

// Customers
Route::get('/customers/search', [CustomerController::class, 'searchByDNI'])->name('customers.search');
Route::resource('customers', CustomerController::class);

// Loans
Route::resource('loans', LoanController::class)->except(['index']);

// Installments
Route::patch('/installments/{installment}/update-status', [InstallmentController::class, 'updateStatus'])->name('installments.update-status');
Route::resource('installments', InstallmentController::class)->except(['index', 'show']);
