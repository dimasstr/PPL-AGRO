<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BMRController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardAboutController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardCustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', HomeController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registrasi', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegisterController::class, 'store']);

Route::get('/tentang', [AboutController::class, 'index']);


Route::resource('/dashboard', ProductController::class)->middleware('owner');
Route::get('/pesanan-customer', [DashboardOrderController::class, 'index'])->middleware('owner');
Route::get('/pesanan-customer-detail/{id}', [DashboardOrderController::class, 'orderDetail'])->middleware('owner');
Route::put('/pesanan-customer-detail/{id}', [DashboardOrderController::class, 'updateStatus'])->middleware('owner');

Route::resource('/data-customer', DashboardCustomerController::class)->middleware('owner');

Route::resource('/transaksi', TransactionController::class)->middleware('owner');
Route::get('/grafik-transaksi', [TransactionController::class, 'graphic'])->middleware('owner');

Route::resource('/tentang-kami', DashboardAboutController::class)->middleware('owner');

Route::resource('/profile', ProfileController::class)->middleware('customer');

Route::get('/hitung-kalori', [BMRController::class, 'index']);

Route::get('/pesanan', [OrderDetailController::class, 'listOrder'])->middleware('customer');

Route::get('/pesanan/{id}', [OrderController::class, 'index'])->middleware('customer');
Route::post('/pesanan/{id}', [OrderController::class, 'order'])->middleware('customer');

Route::get('/keranjang', [OrderController::class, 'cart'])->middleware('customer');
Route::delete('/keranjang/{id}', [OrderController::class, 'delete'])->middleware('customer');

Route::get('/checkout/{id}', [OrderController::class, 'checkout'])->middleware('customer');
Route::post('/checkout/{id}', [OrderController::class, 'payment'])->middleware('customer');
Route::get('/pesanan-detail/{id}', [OrderDetailController::class, 'orderDetail'])->middleware('customer');
Route::put('/pesanan-detail/{id}', [OrderDetailController::class, 'updateStatus'])->middleware('customer');