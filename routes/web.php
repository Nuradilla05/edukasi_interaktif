<?php

use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\BerkasPendaftaranController;
use App\Http\Controllers\NilaiSeleksiController;
use App\Http\Controllers\RekapDataController;

Route::get('/', function () {
    return view('frontend');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('calonsiswa', CalonSiswaController::class);
    Route::resource('nilaiseleksi', NilaiSeleksiController::class);
    Route::resource('laporan', LaporanController::class);
    Route::resource('rekapdata', RekapDataController::class);
    Route::resource('jurusan', JurusanController::class);
    
    
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('pendaftaran', PendaftaranController::class);
    Route::resource('berkaspendaftaran', BerkasPendaftaranController::class);
    

    
   
});