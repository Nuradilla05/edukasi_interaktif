<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSeleksi extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'nilaiseleksi';

    /**
     * Kolom yang bisa diisi secara massal
     */
    protected $fillable = [
        'namapendaftar',
        'nilairapor',
        'nilaites',
        'nilaiakhir',
        'keterangan',
    ];

    /**
     * (Opsional) Jika ada relasi ke tabel lain
     * Misal: pendaftar
     */
    // public function pendaftar()
    // {
    //     return $this->belongsTo(Pendaftar::class, 'namapendaftar', 'nama');
    // }
}
