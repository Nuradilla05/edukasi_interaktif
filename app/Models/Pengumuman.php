<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'pengumuman'; // pastikan sesuai nama tabel di database

    /**
     * Kolom yang boleh diisi secara mass assignment
     */
    protected $fillable = [
        'nama_siswa',
        'keterangan',
        'status',
        'tanggal_pengumuman',
    ];
}
