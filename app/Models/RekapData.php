<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapData extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'rekapdata';

    /**
     * Kolom yang bisa diisi secara massal
     */
    protected $fillable = [
        'nama_siswa',
        'asal_sekolah',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'nilai_rapor',
        'nilai_tes',
    ];
}
