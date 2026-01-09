@extends('layouts.app')

@section('title', 'Edit Berkas Pendaftaran')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4 text-center">Edit Berkas Pendaftaran</h4>

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

    {{-- Pastikan variabel $berkas tersedia --}}
    @if(isset($berkas))
    <form method="POST" action="{{ route('berkaspendaftaran.update', $berkas->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_siswa" class="form-label">Nama Siswa</label>
            <input type="text" id="nama_siswa" name="nama_siswa"
                   value="{{ old('nama_siswa', $berkas->nama_siswa) }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" id="nisn" name="nisn"
                   value="{{ old('nisn', $berkas->nisn) }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="file_berkas" class="form-label">File Berkas (PDF/JPG/PNG)</label>
            <input type="file" id="file_berkas" name="file_berkas" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
            @if($berkas->file_berkas)
                <small>File saat ini: <a href="{{ Storage::url('berkas/' . $berkas->file_berkas) }}" target="_blank">{{ $berkas->file_berkas }}</a></small>
            @endif
        </div>

        <div class="mb-3">
            <label for="status_verifikasi" class="form-label">Status Verifikasi</label>
            <select id="status_verifikasi" name="status_verifikasi" class="form-control" required>
                <option value="Proses" {{ old('status_verifikasi', $berkas->status_verifikasi) == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Diterima" {{ old('status_verifikasi', $berkas->status_verifikasi) == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ old('status_verifikasi', $berkas->status_verifikasi) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-4">Perbarui</button>
            <a href="{{ route('berkaspendaftaran.index') }}" class="btn btn-secondary px-4">Batal</a>
        </div>
    </form>
    @else
        <div class="alert alert-warning text-center">
            Data berkas pendaftaran tidak ditemukan.
        </div>
    @endif
</div>
@endsection
