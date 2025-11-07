@extends('layouts.app')
@section('title', 'Tambah Laporan Keuangan')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Laporan Keuangan</h4>

    {{-- Form Tambah Laporan Keuangan --}}
    <form method="POST" action="{{ route('laporankeuangan.store') }}">
        @csrf

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan transaksi" required>
        </div>

        <div class="mb-3">
            <label for="pemasukan" class="form-label">Pemasukan</label>
            <input type="number" step="0.01" name="pemasukan" class="form-control" placeholder="Masukkan jumlah pemasukan" required>
        </div>

        <div class="mb-3">
            <label for="pengeluaran" class="form-label">Pengeluaran</label>
            <input type="number" step="0.01" name="pengeluaran" class="form-control" placeholder="Masukkan jumlah pengeluaran" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('laporankeuangan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
