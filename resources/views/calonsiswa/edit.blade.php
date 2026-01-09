@extends('layouts.app')
@section('title', 'Edit Calon Siswa')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Data Calon Siswa</h4>

    <form method="POST" action="{{ route('calonsiswa.update', $calonSiswa->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input 
                type="text" 
                name="nama_lengkap" 
                class="form-control" 
                value="{{ old('nama_lengkap', $calonSiswa->nama_lengkap) }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input 
                type="text" 
                name="nisn" 
                class="form-control" 
                value="{{ old('nisn', $calonSiswa->nisn) }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
            <input 
                type="text" 
                name="asal_sekolah" 
                class="form-control" 
                value="{{ old('asal_sekolah', $calonSiswa->asal_sekolah) }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea 
                name="alamat" 
                class="form-control" 
                rows="3"
            >{{ old('alamat', $calonSiswa->alamat) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('calonsiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
