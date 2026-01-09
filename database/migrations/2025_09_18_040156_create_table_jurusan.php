<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id();

            // Kode jurusan SMK (contoh: RPL, TKJ, AKL)
            $table->string('kode_jurusan')->unique();

            // Nama jurusan (contoh: Rekayasa Perangkat Lunak)
            $table->string('nama_jurusan');

            // Keterangan tambahan (opsional)
            $table->text('keterangan')->nullable();

            // Kepala jurusan (guru penanggung jawab)
            $table->string('kepala_jurusan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusan');
    }
};
