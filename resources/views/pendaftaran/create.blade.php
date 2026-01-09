@extends('layouts.app')

@section('title', 'Tambah Pendaftaran Siswa Baru')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4 text-center">Tambah Pendaftaran Siswa Baru</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('pendaftaran.store') }}">
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
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Asal Sekolah</label>
            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control" required>
                <option value="">-- Pilih Jurusan --</option>
                <option value="TKJ" {{ old('jurusan') == 'TKJ' ? 'selected' : '' }}>TKJ (Teknik Komputer dan Jaringan)</option>
                <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>RPL (Rekayasa Perangkat Lunak)</option>
                <option value="MM" {{ old('jurusan') == 'MM' ? 'selected' : '' }}>MM (Multimedia)</option>
                <!-- Tambahkan jurusan lain sesuai SMK -->
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" value="{{ old('tanggal_daftar') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status Proses</label>
            <select name="status_proses" class="form-control" required>
                <option value="Proses" {{ old('status_proses') == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Diterima" {{ old('status_proses') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ old('status_proses') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-4">Simpan</button>
            <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary px-4">Batal</a>
        </div>
    </form>
</div>
@endsection
