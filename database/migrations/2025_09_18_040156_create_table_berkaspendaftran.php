<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berkas_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');              // Nama siswa
            $table->string('nisn')->unique();          // NISN siswa
            $table->string('file_berkas');             // Nama file dokumen yang diupload
            $table->enum('status_verifikasi', ['Proses', 'Diterima', 'Ditolak'])->default('Proses'); // Status verifikasi
            $table->timestamps();                      // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berkas_pendaftaran');
    }
};
