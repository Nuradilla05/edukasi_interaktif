@extends('layouts.app')
@section('title', 'Tambah Laporan Kunjungan')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Laporan Kunjungan</h4>

    {{-- Form Tambah Laporan Kunjungan --}}
    <form method="POST" action="{{ route('laporankunjungan.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nama_pasien" class="form-label">Nama Pasien</label>
            <input type="text" name="nama_pasien" class="form-control" required placeholder="Masukkan nama pasien">
        </div>

        <div class="mb-3">
            <label for="nama_dokter" class="form-label">Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" required placeholder="Masukkan nama dokter">
        </div>

        <div class="mb-3">
            <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosa</label>
            <input type="text" name="diagnosa" class="form-control" placeholder="Masukkan diagnosa pasien (opsional)">
        </div>

        <div class="mb-3">
            <label for="tindakan" class="form-label">Tindakan</label>
            <textarea name="tindakan" class="form-control" rows="3" placeholder="Masukkan tindakan medis (opsional)"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('laporankunjungan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
