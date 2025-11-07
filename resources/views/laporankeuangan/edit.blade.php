@extends('layouts.app')
@section('title', 'Edit Laporan Keuangan')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Laporan Keuangan</h4>

    <form method="POST" action="{{ route('laporankeuangan.update', $laporankeuangan->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $laporankeuangan->tanggal) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" value="{{ old('keterangan', $laporankeuangan->keterangan) }}" class="form-control" placeholder="Masukkan keterangan transaksi" required>
        </div>

        <div class="mb-3">
            <label for="pemasukan" class="form-label">Pemasukan</label>
            <input type="number" step="0.01" name="pemasukan" value="{{ old('pemasukan', $laporankeuangan->pemasukan) }}" class="form-control" placeholder="Masukkan jumlah pemasukan" required>
        </div>

        <div class="mb-3">
            <label for="pengeluaran" class="form-label">Pengeluaran</label>
            <input type="number" step="0.01" name="pengeluaran" value="{{ old('pengeluaran', $laporankeuangan->pengeluaran) }}" class="form-control" placeholder="Masukkan jumlah pengeluaran" required>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('laporankeuangan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
