<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanObat extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'laporan_obat';

    /**
     * Kolom yang bisa diisi secara massal (mass assignment)
     */
    protected $fillable = [
        'nama_pasien',
        'nama_obat',
        'jumlah',
        'tanggal_pemberian',
    ];
}
