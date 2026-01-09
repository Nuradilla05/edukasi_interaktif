<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'pendaftaran'; // pastikan sesuai nama tabel di database

    /**
     * Kolom yang boleh diisi secara mass assignment
     */
    protected $fillable = [
        'nama_siswa',
        'nisn',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'asal_sekolah',
        'jurusan',
        'tanggal_daftar',
        'status_proses',
    ];

    /**
     * Opsional: relasi ke tabel jurusan (jika ada)
     * Misal setiap pendaftaran memiliki satu jurusan
     */
    public function jurusanDetail()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan', 'nama_jurusan');
    }
}
