@extends('layouts.app')

@section('title', 'Edit Pembayaran')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4 text-center">Edit Pembayaran</h4>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Pesan error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Pastikan variabel $pembayaran tersedia --}}
    @if(isset($pembayaran))
    <form method="POST" action="{{ route('pembayaran.update', $pembayaran->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_pasien" class="form-label">Nama Pasien</label>
            <input type="text" id="nama_pasien" name="nama_pasien"
                   value="{{ old('nama_pasien', $pembayaran->nama_pasien) }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Pembayaran</label>
            <input type="number" step="0.01" id="jumlah" name="jumlah"
                   value="{{ old('jumlah', $pembayaran->jumlah) }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select id="metode_pembayaran" name="metode_pembayaran" class="form-control" required>
                <option value="">-- Pilih Metode --</option>
                <option value="Cash" {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'Cash' ? 'selected' : '' }}>Cash</option>
                <option value="Transfer" {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                <option value="E-Wallet" {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
            <input type="date" id="tanggal_pembayaran" name="tanggal_pembayaran"
                   value="{{ old('tanggal_pembayaran', $pembayaran->tanggal_pembayaran) }}"
                   class="form-control" required>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-4">Perbarui</button>
            <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary px-4">Batal</a>
        </div>
    </form>
    @else
        <div class="alert alert-warning text-center">
            Data pembayaran tidak ditemukan.
        </div>
    @endif
</div>
@endsection
