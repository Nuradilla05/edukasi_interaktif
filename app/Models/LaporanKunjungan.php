<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKunjungan extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'laporan_kunjungan';

    /**
     * Kolom yang bisa diisi secara massal
     */
    protected $fillable = [
        'nama_pasien',
        'nama_dokter',
        'tanggal_kunjungan',
        'diagnosa',
        'tindakan',
    ];

    /**
     * (Opsional) Relasi ke tabel lain
     * Misal: pasien dan dokter, jika tabelnya ada
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'nama_pasien', 'nama');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'nama_dokter', 'nama');
    }
}
