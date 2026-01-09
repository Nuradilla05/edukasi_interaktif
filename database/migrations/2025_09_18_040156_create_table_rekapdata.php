<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel rekapdata
     */
    public function up(): void
    {
        Schema::create('rekapdata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('asal_sekolah');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']); // Laki-laki / Perempuan
            $table->text('alamat');
            $table->integer('nilai_rapor');
            $table->integer('nilai_tes');
            $table->timestamps();
        });
    }

    /**
     * Batalkan migration (hapus tabel)
     */
    public function down(): void
    {
        Schema::dropIfExists('rekapdata');
    }
};
