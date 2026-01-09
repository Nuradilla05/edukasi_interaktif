@extends('layouts.app')
@section('title', 'Tambah Laporan Siswa Baru')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Laporan Siswa Baru</h4>

    {{-- Form Tambah Laporan Siswa Baru --}}
    <form method="POST" action="{{ route('laporan.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nama_siswa" class="form-label">Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan nama siswa" required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukkan jurusan" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
            <input type="date" name="tanggal_pendaftaran" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="" disabled selected>Pilih status</option>
                <option value="proses">Proses</option>
                <option value="diterima">Diterima</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
