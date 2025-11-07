@extends('layouts.app')
@section('title', 'Edit Pasien')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Data Pasien</h4>

    <form method="POST" action="{{ route('pasien.update', $pasien->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pasien</label>
            <input type="text" name="nama" value="{{ $pasien->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" value="{{ $pasien->nik }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="Laki-laki" {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $pasien->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" value="{{ $pasien->no_hp }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3">{{ $pasien->alamat }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
