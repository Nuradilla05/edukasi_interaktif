<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel laporan_kunjungan.
     */
    public function up(): void
    {
        Schema::create('laporan_kunjungan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');             // Nama pasien yang berkunjung
            $table->string('nama_dokter');             // Nama dokter yang menangani
            $table->date('tanggal_kunjungan');         // Tanggal kunjungan pasien
            $table->string('diagnosa')->nullable();    // Diagnosa penyakit (opsional)
            $table->string('tindakan')->nullable();    // Tindakan medis yang dilakukan (opsional)
            $table->timestamps();                      // created_at & updated_at
        });
    }

    /**
     * Batalkan migration (hapus tabel).
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kunjungan');
    }
};
