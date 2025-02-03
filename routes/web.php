<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Kategori Routes
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/tambah', [KategoriController::class, 'tambah'])->name('kategori.tambah');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/ubah/{id}', [KategoriController::class, 'ubah'])->name('kategori.ubah');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/hapus/{id}', [KategoriController::class, 'hapus'])->name('kategori.hapus');

// Produk Routes
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/tambah', [ProdukController::class, 'tambah'])->name('produk.tambah');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/ubah/{id}', [ProdukController::class, 'ubah'])->name('produk.ubah');
Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/hapus/{id}', [ProdukController::class, 'hapus'])->name('produk.hapus');

// Status Routes
Route::get('/status', [StatusController::class, 'index'])->name('status.index');
Route::get('/status/tambah', [StatusController::class, 'tambah'])->name('status.tambah');
Route::post('/status/store', [StatusController::class, 'store'])->name('status.store');
Route::get('/status/ubah/{id}', [StatusController::class, 'ubah'])->name('status.ubah');
Route::put('/status/update/{id}', [StatusController::class, 'update'])->name('status.update');
Route::delete('/status/hapus/{id}', [StatusController::class, 'hapus'])->name('status.hapus');
