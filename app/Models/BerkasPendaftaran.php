<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BerkasPendaftaran extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'berkas_pendaftaran'; // pastikan sesuai tabel di database

    /**
     * Kolom yang boleh diisi secara mass assignment
     */
    protected $fillable = [
        'nama_siswa',
        'nisn',
        'file_berkas',
        'status_verifikasi',
    ];

    /**
     * Akses file_berkas dengan URL storage
     */
    public function getFileBerkasUrlAttribute()
    {
        return $this->file_berkas ? Storage::url('berkas/' . $this->file_berkas) : null;
    }
}
