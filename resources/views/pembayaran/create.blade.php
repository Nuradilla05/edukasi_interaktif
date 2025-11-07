@extends('layouts.app')

@section('title', 'Tambah Pembayaran')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4 text-center">Tambah Pembayaran</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('pembayaran.store') }}">
        @csrf

        <div class="mb-3">
            <label>Nama Pasien</label>
            <input type="text" name="nama_pasien" value="{{ old('nama_pasien') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah Pembayaran</label>
            <input type="number" step="0.01" name="jumlah" value="{{ old('jumlah') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-control" required>
                <option value="">-- Pilih Metode --</option>
                <option value="Cash" {{ old('metode_pembayaran') == 'Cash' ? 'selected' : '' }}>Cash</option>
                <option value="Transfer" {{ old('metode_pembayaran') == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                <option value="E-Wallet" {{ old('metode_pembayaran') == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran') }}" class="form-control" required>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-4">Simpan</button>
            <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary px-4">Batal</a>
        </div>
    </form>
</div>
@endsection
