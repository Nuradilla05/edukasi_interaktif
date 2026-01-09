<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi: membuat tabel pendaftaran
     */
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa', 100);        // Nama lengkap siswa
            $table->string('nisn', 20)->unique();     // Nomor Induk Siswa Nasional
            $table->date('tanggal_lahir');            // Tanggal lahir
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan']); // Jenis kelamin
            $table->string('alamat', 255);            // Alamat lengkap
            $table->string('asal_sekolah', 100);      // Asal sekolah
            $table->string('jurusan', 50);            // Jurusan pilihan
            $table->date('tanggal_daftar');           // Tanggal pendaftaran
            $table->enum('status_proses', ['Proses','Diterima','Ditolak'])->default('Proses'); // Status pendaftaran
            $table->timestamps();                     // created_at & updated_at
        });
    }

    /**
     * Membatalkan migrasi: menghapus tabel pendaftaran
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
