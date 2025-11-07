@extends('layouts.app')
@section('title', 'Tambah Dokter')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Dokter</h4>

    <form method="POST" action="{{ route('dokter.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama dokter">
        </div>

        <div class="mb-3">
            <label for="spesialis" class="form-label">Spesialis</label>
            <input type="text" name="spesialis" class="form-control" required placeholder="Masukkan bidang spesialis">
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" required placeholder="Masukkan nomor HP dokter">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required placeholder="Masukkan alamat dokter"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

