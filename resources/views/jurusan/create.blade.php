@extends('layouts.app')

@section('title', 'Tambah Jurusan')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Tambah Jurusan</h4>

    {{-- Validasi Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jurusan.store') }}" method="POST">
        @csrf

        <!-- KODE JURUSAN -->
        <div class="mb-3">
            <label class="form-label">Kode Jurusan</label>
            <input
                type="text"
                name="kode_jurusan"
                class="form-control"
                value="{{ old('kode_jurusan') }}"
                placeholder="Contoh: RPL, TKJ, AKL"
                required
            >
        </div>

        <!-- NAMA JURUSAN -->
        <div class="mb-3">
            <label class="form-label">Nama Jurusan</label>
            <input
                type="text"
                name="nama_jurusan"
                class="form-control"
                value="{{ old('nama_jurusan') }}"
                placeholder="Contoh: Rekayasa Perangkat Lunak"
                required
            >
        </div>

        <!-- KEPALA JURUSAN -->
        <div class="mb-3">
            <label class="form-label">Kepala Jurusan</label>
            <input
                type="text"
                name="kepala_jurusan"
                class="form-control"
                value="{{ old('kepala_jurusan') }}"
                placeholder="Nama guru kepala jurusan"
            >
        </div>

        <!-- KETERANGAN -->
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea
                name="keterangan"
                class="form-control"
                rows="3"
                placeholder="Keterangan jurusan (opsional)"
            >{{ old('keterangan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </form>
</div>
@endsection
