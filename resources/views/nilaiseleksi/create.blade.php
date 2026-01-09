@extends('layouts.app')
@section('title', 'Tambah Nilai Seleksi')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Nilai Seleksi</h4>

    {{-- Form Tambah Nilai Seleksi --}}
    <form method="POST" action="{{ route('nilaiseleksi.store') }}">
        @csrf

        <div class="mb-3">
            <label for="namapendaftar" class="form-label">Nama Pendaftar</label>
            <input type="text" name="namapendaftar" class="form-control" required placeholder="Masukkan nama pendaftar">
        </div>

        <div class="mb-3">
            <label for="nilairapor" class="form-label">Nilai Rapor</label>
            <input type="number" name="nilairapor" class="form-control" required placeholder="Masukkan nilai rapor" min="0" max="100" step="0.01">
        </div>

        <div class="mb-3">
            <label for="nilaites" class="form-label">Nilai Tes</label>
            <input type="number" name="nilaites" class="form-control" required placeholder="Masukkan nilai tes" min="0" max="100" step="0.01">
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan (opsional)">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('nilaiseleksi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
