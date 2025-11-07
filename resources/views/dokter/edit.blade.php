@extends('layouts.app')
@section('title', 'Edit Dokter')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Data Dokter</h4>

    <form method="POST" action="{{ route('dokter.update', $dokter->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $dokter->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="spesialis" class="form-label">Spesialis</label>
            <input type="text" name="spesialis" class="form-control" value="{{ old('spesialis', $dokter->spesialis) }}" required>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $dokter->no_hp) }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $dokter->alamat) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
@extends('layouts.app')
@section('title', 'Edit Pendaftaran Pasien')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Pendaftaran Pasien</h4>

    <form method="POST" action="{{ route('pendaftaran.update', $pendaftaran->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_pasien" class="form-label">Nama Pasien</label>
            <input type="text" name="nama_pasien" value="{{ $pendaftaran->nama_pasien }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" name="umur" value="{{ $pendaftaran->umur }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="Laki-laki" {{ $pendaftaran->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $pendaftaran->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="poli_tujuan" class="form-label">Poli Tujuan</label>
            <input type="text" name="poli_tujuan" value="{{ $pendaftaran->poli_tujuan }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dokter_tujuan" class="form-label">Dokter Tujuan</label>
            <input type="text" name="dokter_tujuan" value="{{ $pendaftaran->dokter_tujuan }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" value="{{ $pendaftaran->tanggal_daftar }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
