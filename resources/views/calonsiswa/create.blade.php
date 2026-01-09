@extends('layouts.app')
@section('title', 'Tambah Calon Siswa')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Calon Siswa</h4>

    <form method="POST" action="{{ route('calonsiswa.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input 
                type="text" 
                name="nama_lengkap" 
                class="form-control" 
                required 
                placeholder="Masukkan nama lengkap calon siswa"
            >
        </div>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input 
                type="text" 
                name="nisn" 
                class="form-control" 
                required 
                placeholder="Masukkan NISN"
            >
        </div>

        <div class="mb-3">
            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
            <input 
                type="text" 
                name="asal_sekolah" 
                class="form-control" 
                required 
                placeholder="Masukkan asal sekolah"
            >
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea 
                name="alamat" 
                class="form-control" 
                rows="3" 
                placeholder="Masukkan alamat calon siswa"
            ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('calonsiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
