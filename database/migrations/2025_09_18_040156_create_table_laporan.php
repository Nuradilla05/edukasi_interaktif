<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel laporan penerimaan siswa baru.
     */
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();                              // Primary key
            $table->string('nama_siswa');              // Nama siswa
            $table->string('jurusan');                 // Jurusan yang dipilih
            $table->date('tanggal_pendaftaran');       // Tanggal pendaftaran siswa
            $table->string('status', 50);              // Status: diterima / ditolak / proses
            $table->timestamps();                      // created_at & updated_at
        });
    }

    /**
     * Batalkan migration (hapus tabel)
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
