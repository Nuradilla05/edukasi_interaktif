<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pasiens';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama',
        'nik',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_hp',
        'alamat',
    ];

    // Relasi ke user (opsional jika pasien memiliki akun user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
