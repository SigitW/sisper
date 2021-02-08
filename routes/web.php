<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\UploadBillingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form-customer', [UploadBillingController::class, 'customerVerif']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/kas', [KasController::class, 'index']);
Route::get('/verifikasi', [UploadBillingController::class, 'index']);
Route::get('/generate', [UploadBillingController::class, 'generate']);
Route::get('/pengiriman', [PengirimanController::class, 'index']);
