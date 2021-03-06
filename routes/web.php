<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\UploadBillingController;
use App\Http\Controllers\VerifikasiController;
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
    // return view('welcome');
    return view('home.index');
});

Route::get('/form-customer', [UploadBillingController::class, 'customerVerif']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/kas', [KasController::class, 'index']);
Route::get('/verifikasi', [VerifikasiController::class, 'index']);
Route::get('/generate', [UploadBillingController::class, 'index']);
Route::get('/pengiriman', [PengirimanController::class, 'index']);


// barang
Route::post('/barang/create', [BarangController::class, 'create'])->name("barang.saveAdd");
Route::post('/barang/search', [BarangController::class, 'search'])->name("barang.search");
Route::post('/barang/edit', [BarangController::class, 'edit'])->name("barang.edit");
Route::post('/barang/saveedit', [BarangController::class, 'saveEdit'])->name("barang.saveEdit");
Route::post('/barang/searchvendor', [BarangController::class, 'selVendor'])->name("barang.searchVendor");

// varian
Route::post('/varian/create', [BarangController::class, 'saveAddVarian'])->name("varian.saveAdd");
Route::post('/varian/search', [BarangController::class, 'searchVarian'])->name("varian.search");
Route::post('/varian/edit', [BarangController::class, 'editVarian'])->name("varian.edit");
Route::post('/varian/saveedit', [BarangController::class, 'saveEditVarian'])->name("varian.saveEdit");

// pembelian barang save
Route::post('/pembelianbarang/save', [BarangController::class, 'savePembelian'])->name("pembelianbarang.save");

// search barang detail
Route::post('/barang/searchdetail', [BarangController::class, 'searchDetail'])->name("barang.searchDetail");


