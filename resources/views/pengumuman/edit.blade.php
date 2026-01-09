@extends('layouts.app')

@section('title', 'Edit Pengumuman')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4 text-center">Edit Pengumuman</h4>

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

    {{-- Pastikan variabel $pengumuman tersedia --}}
    @if(isset($pengumuman))
    <form method="POST" action="{{ route('pengumuman.update', $pengumuman->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" value="{{ old('nama_siswa', $pengumuman->nama_siswa) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3" required>{{ old('keterangan', $pengumuman->keterangan) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="Proses" {{ old('status', $pengumuman->status) == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Diterima" {{ old('status', $pengumuman->status) == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ old('status', $pengumuman->status) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Pengumuman</label>
            <input type="date" name="tanggal_pengumuman" value="{{ old('tanggal_pengumuman', $pengumuman->tanggal_pengumuman) }}" class="form-control" required>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-4">Perbarui</button>
            <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary px-4">Batal</a>
        </div>
    </form>
    @else
        <div class="alert alert-warning text-center">
            Data pengumuman tidak ditemukan.
        </div>
    @endif
</div>
@endsection
