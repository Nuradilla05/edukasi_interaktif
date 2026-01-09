<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    // Nama tabel di database (SESUAI controller & migration)
    protected $table = 'jurusan';

    // Kolom yang boleh diisi (SESUAI store & update di controller)
    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'keterangan',
        'kepala_jurusan',
    ];
}
