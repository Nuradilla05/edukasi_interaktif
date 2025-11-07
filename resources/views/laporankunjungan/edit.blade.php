@extends('layouts.app')
@section('title', 'Edit Laporan Kunjungan')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Laporan Kunjungan</h4>

    <form method="POST" action="{{ route('laporankunjungan.update', $laporankunjungan->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_pasien" class="form-label">Nama Pasien</label>
            <input type="text" name="nama_pasien" value="{{ old('nama_pasien', $laporankunjungan->nama_pasien) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nama_dokter" class="form-label">Nama Dokter</label>
            <input type="text" name="nama_dokter" value="{{ old('nama_dokter', $laporankunjungan->nama_dokter) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan', $laporankunjungan->tanggal_kunjungan) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosa</label>
            <input type="text" name="diagnosa" value="{{ old('diagnosa', $laporankunjungan->diagnosa) }}" class="form-control" placeholder="Masukkan diagnosa (opsional)">
        </div>

        <div class="mb-3">
            <label for="tindakan" class="form-label">Tindakan</label>
            <textarea name="tindakan" class="form-control" rows="3" placeholder="Masukkan tindakan (opsional)">{{ old('tindakan', $laporankunjungan->tindakan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('laporankunjungan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
