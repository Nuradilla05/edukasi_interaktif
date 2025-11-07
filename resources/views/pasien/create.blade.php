@extends('layouts.app')
@section('title', 'Tambah Pasien')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Pasien</h4>

    <form method="POST" action="{{ route('pasien.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pasien</label>
            <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama pasien">
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" class="form-control" required placeholder="Masukkan NIK pasien">
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukkan nomor HP pasien">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat pasien"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
