<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel laporan_keuangan.
     */
    public function up(): void
    {
        Schema::create('laporan_keuangan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');                // Tanggal transaksi
            $table->string('keterangan');           // Keterangan transaksi
            $table->decimal('pemasukan', 15, 2)->default(0);   // Jumlah pemasukan
            $table->decimal('pengeluaran', 15, 2)->default(0); // Jumlah pengeluaran
            $table->timestamps();                   // created_at & updated_at
        });
    }

    /**
     * Batalkan migration (hapus tabel).
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_keuangan');
    }
};
