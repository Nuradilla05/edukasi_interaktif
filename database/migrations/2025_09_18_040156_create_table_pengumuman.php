<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi: membuat tabel pengumuman
     */
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa', 100);                    // Nama lengkap siswa
            $table->string('keterangan', 255);                   // Keterangan pengumuman
            $table->enum('status', ['Proses', 'Diterima', 'Ditolak'])->default('Proses'); // Status pengumuman
            $table->date('tanggal_pengumuman');                  // Tanggal pengumuman
            $table->timestamps();                                // created_at & updated_at
        });
    }

    /**
     * Membatalkan migrasi: menghapus tabel pengumuman
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
