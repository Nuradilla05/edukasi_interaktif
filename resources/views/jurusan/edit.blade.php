@extends('layouts.app')

@section('title', 'Edit Jurusan')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Data Jurusan</h4>

    <form method="POST" action="{{ route('jurusan.update', $jurusan->id) }}">
        @csrf
        @method('PUT')

        <!-- KODE JURUSAN -->
        <div class="mb-3">
            <label class="form-label">Kode Jurusan</label>
            <input
                type="text"
                name="kode_jurusan"
                value="{{ old('kode_jurusan', $jurusan->kode_jurusan) }}"
                class="form-control"
                required
            >
        </div>

        <!-- NAMA JURUSAN -->
        <div class="mb-3">
            <label class="form-label">Nama Jurusan</label>
            <input
                type="text"
                name="nama_jurusan"
                value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                class="form-control"
                required
            >
        </div>

        <!-- KEPALA JURUSAN -->
        <div class="mb-3">
            <label class="form-label">Kepala Jurusan</label>
            <input
                type="text"
                name="kepala_jurusan"
                value="{{ old('kepala_jurusan', $jurusan->kepala_jurusan) }}"
                class="form-control"
            >
        </div>

        <!-- KETERANGAN -->
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea
                name="keterangan"
                class="form-control"
                rows="3"
            >{{ old('keterangan', $jurusan->keterangan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Perbarui
        </button>
        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </form>
</div>
@endsection
