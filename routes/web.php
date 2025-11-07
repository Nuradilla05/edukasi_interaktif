<?php

use App\Http\Controllers\ResepObatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LaporanKunjunganController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\LaporanObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\PendaftaranPasienController;
use App\Http\Controllers\PemeriksaanDokterController;
use App\Http\Controllers\PemeriksaanLaboratoriumController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\InformasiKesehatanController;



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
    Route::resource('dokter', DokterController::class);
    Route::resource('laporankunjungan', LaporanKunjunganController::class);
    Route::resource('laporankeuangan', LaporanKeuanganController::class);
    Route::resource('laporanobat', LaporanObatController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('poli', PoliController::class);
    
    Route::resource('pendaftaranpasien', PendaftaranPasienController::class);
    Route::resource('pemeriksaandokter', PemeriksaanDokterController::class);
    Route::resource('resepobat', ResepObatController::class);
    Route::resource('pemeriksaanlaboratorium', PemeriksaanLaboratoriumController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('rekammedis', RekamMedisController::class);

    Route::get('/informasi-kesehatan', [InformasiKesehatanController::class, 'index'])->name('informasi.kesehatan');
    Route::get('/informasi/artikel', [InformasiKesehatanController::class, 'artikel'])->name('informasi.artikel');
    Route::get('/informasi/tips', [InformasiKesehatanController::class, 'tips'])->name('informasi.tips');
    Route::get('/informasi/pencegahan', [InformasiKesehatanController::class, 'pencegahan'])->name('informasi.pencegahan');
   
});