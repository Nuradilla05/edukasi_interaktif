<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');          // Nama pasien
            $table->decimal('jumlah', 15, 2);       // Jumlah pembayaran
            $table->string('metode_pembayaran');    // Metode pembayaran (Cash, Transfer, dll)
            $table->date('tanggal_pembayaran');     // Tanggal pembayaran dilakukan
            $table->timestamps();                   // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
