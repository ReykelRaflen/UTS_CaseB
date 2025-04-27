<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', fn() => redirect('/pemesanans'));
Route::resource('pemesanans', PemesananController::class);
Route::get('riwayat-dihapus', [PemesananController::class, 'riwayat'])->name('pemesanans.riwayat');
Route::post('restore/{id}', [PemesananController::class, 'restore'])->name('pemesanans.restore');
Route::delete('pemesanans/{id}/forceDelete', [PemesananController::class, 'forceDelete'])->name('pemesanans.forceDelete');
