<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel nilaiseleksi
     */
    public function up(): void
    {
        Schema::create('nilaiseleksi', function (Blueprint $table) {
            $table->id();                        // Primary key
            $table->string('namapendaftar');     // Nama pendaftar
            $table->decimal('nilairapor', 5, 2); // Nilai rapor (0-100)
            $table->decimal('nilaites', 5, 2);   // Nilai tes (0-100)
            $table->decimal('nilaiakhir', 5, 2); // Nilai akhir hasil rata-rata
            $table->string('keterangan')->nullable(); // Keterangan opsional
            $table->timestamps();                // created_at & updated_at
        });
    }

    /**
     * Batalkan migration (hapus tabel)
     */
    public function down(): void
    {
        Schema::dropIfExists('nilaiseleksi');
    }
};
