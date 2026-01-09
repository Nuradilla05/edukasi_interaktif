@extends('layouts.app')
@section('title', 'Tambah Rekap Data Siswa')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Rekap Data Siswa</h4>

    <form method="POST" action="{{ route('rekapdata.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" required placeholder="Masukkan nama siswa">
        </div>

        <div class="mb-3">
            <label class="form-label">Asal Sekolah</label>
            <input type="text" name="asal_sekolah" class="form-control" required placeholder="Masukkan asal sekolah">
        </div>

        <div class="mb-3">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required placeholder="Masukkan tempat lahir">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required placeholder="Masukkan alamat"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai Rapor</label>
            <input type="number" name="nilai_rapor" class="form-control" required placeholder="Masukkan nilai rapor">
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai Tes</label>
            <input type="number" name="nilai_tes" class="form-control" required placeholder="Masukkan nilai tes">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('rekapdata.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
