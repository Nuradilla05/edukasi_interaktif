<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'laporan';

    /**
     * Kolom yang bisa diisi secara massal (mass assignment)
     */
    protected $fillable = [
        'nama_siswa',
        'jurusan',
        'tanggal_pendaftaran',
        'status',
    ];
}
