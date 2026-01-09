<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    use HasFactory;

    // Karena nama tabel TIDAK plural, harus ditulis manual
    protected $table = 'calonsiswa';

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'asal_sekolah',
        'alamat',
    ];
}
