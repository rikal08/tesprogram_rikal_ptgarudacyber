<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TransactionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class, 'index']);

// Costumer Route
Route::resource('/customers', CustomerController::class);

// Tenant Route
Route::resource('/tenants', TenantController::class);

// Voucher Route
Route::resource('/vouchers', VoucherController::class);
Route::get('form-redeem-voucher',[VoucherController::class, 'formRedeem']);
Route::post('redeem-voucher',[VoucherController::class, 'redeemVoucher']);

// Transaction Route
Route::resource('/transactions', TransactionController::class);
Route::get('/get-customers', [CustomerController::class, 'getCustomers']);