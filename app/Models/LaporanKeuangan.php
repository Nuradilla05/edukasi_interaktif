<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'laporan_keuangan';

    /**
     * Kolom yang bisa diisi secara massal (mass assignment)
     */
    protected $fillable = [
        'tanggal',
        'keterangan',
        'pemasukan',
        'pengeluaran',
    ];
}
