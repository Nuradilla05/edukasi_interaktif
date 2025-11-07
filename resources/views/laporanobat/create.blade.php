@extends('layouts.app')
@section('title', 'Tambah Laporan Obat')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Laporan Obat</h4>

    {{-- Form Tambah Laporan Obat --}}
    <form method="POST" action="{{ route('laporanobat.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nama_pasien" class="form-label">Nama Pasien</label>
            <input type="text" name="nama_pasien" class="form-control" placeholder="Masukkan nama pasien" required>
        </div>

        <div class="mb-3">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control" placeholder="Masukkan nama obat" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Masukkan jumlah obat" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pemberian" class="form-label">Tanggal Pemberian</label>
            <input type="date" name="tanggal_pemberian" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('laporanobat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
