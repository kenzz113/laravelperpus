<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/buku');
Route::resource('buku', BukuController::class)->except(['show']);
Route::resource('anggota', AnggotaController::class)
    ->parameters(['anggota' => 'anggota'])
    ->except(['show']);
Route::resource('peminjaman', PeminjamanController::class)->except(['show', 'edit', 'update']);
Route::patch('/peminjaman/{peminjaman}/kembalikan', [PeminjamanController::class, 'kembalikan'])
    ->name('peminjaman.kembalikan');
