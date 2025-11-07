<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel laporan_obat.
     */
    public function up(): void
    {
        Schema::create('laporan_obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');                  // Nama pasien
            $table->string('nama_obat');                    // Nama obat
            $table->integer('jumlah')->default(0);          // Jumlah obat
            $table->date('tanggal_pemberian');              // Tanggal pemberian obat
            $table->timestamps();                           // created_at & updated_at
        });
    }

    /**
     * Batalkan migration (hapus tabel).
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_obat');
    }
};
