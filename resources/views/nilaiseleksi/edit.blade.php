@extends('layouts.app')
@section('title', 'Edit Nilai Seleksi')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Nilai Seleksi</h4>

    <form method="POST" action="{{ route('nilaiseleksi.update', $nilaiseleksi->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="namapendaftar" class="form-label">Nama Pendaftar</label>
            <input type="text" name="namapendaftar" value="{{ old('namapendaftar', $nilaiseleksi->namapendaftar) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nilairapor" class="form-label">Nilai Rapor</label>
            <input type="number" name="nilairapor" value="{{ old('nilairapor', $nilaiseleksi->nilairapor) }}" class="form-control" required min="0" max="100" step="0.01">
        </div>

        <div class="mb-3">
            <label for="nilaites" class="form-label">Nilai Tes</label>
            <input type="number" name="nilaites" value="{{ old('nilaites', $nilaiseleksi->nilaites) }}" class="form-control" required min="0" max="100" step="0.01">
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" value="{{ old('keterangan', $nilaiseleksi->keterangan) }}" class="form-control" placeholder="Masukkan keterangan (opsional)">
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('nilaiseleksi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
