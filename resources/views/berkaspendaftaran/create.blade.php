@extends('layouts.app')

@section('title', 'Tambah Berkas Pendaftaran')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4 text-center">Tambah Berkas Pendaftaran</h4>

    {{-- Tampilkan error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('berkaspendaftaran.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" value="{{ old('nama_siswa') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NISN</label>
            <input type="text" name="nisn" value="{{ old('nisn') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>File Berkas (PDF/JPG/PNG)</label>
            <input type="file" name="file_berkas" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
        </div>

        <div class="mb-3">
            <label>Status Verifikasi</label>
            <select name="status_verifikasi" class="form-control" required>
                <option value="Proses" {{ old('status_verifikasi') == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Diterima" {{ old('status_verifikasi') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ old('status_verifikasi') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-4">Simpan</button>
            <a href="{{ route('berkaspendaftaran.index') }}" class="btn btn-secondary px-4">Batal</a>
        </div>
    </form>
</div>
@endsection
