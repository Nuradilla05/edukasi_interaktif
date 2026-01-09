@extends('layouts.app')

@section('title', 'Edit Pendaftaran Siswa Baru')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4 text-center">Edit Pendaftaran Siswa Baru</h4>

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

    {{-- Pastikan variabel $pendaftaran tersedia --}}
    @if(isset($pendaftaran))
    <form method="POST" action="{{ route('pendaftaran.update', $pendaftaran->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" value="{{ old('nama_siswa', $pendaftaran->nama_siswa) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NISN</label>
            <input type="text" name="nisn" value="{{ old('nisn', $pendaftaran->nisn) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $pendaftaran->alamat) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Asal Sekolah</label>
            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control" required>
                <option value="">-- Pilih Jurusan --</option>
                <option value="TKJ" {{ old('jurusan', $pendaftaran->jurusan) == 'TKJ' ? 'selected' : '' }}>TKJ (Teknik Komputer dan Jaringan)</option>
                <option value="RPL" {{ old('jurusan', $pendaftaran->jurusan) == 'RPL' ? 'selected' : '' }}>RPL (Rekayasa Perangkat Lunak)</option>
                <option value="MM" {{ old('jurusan', $pendaftaran->jurusan) == 'MM' ? 'selected' : '' }}>MM (Multimedia)</option>
                <!-- Tambahkan jurusan lain sesuai SMK -->
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" value="{{ old('tanggal_daftar', $pendaftaran->tanggal_daftar) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status Proses</label>
            <select name="status_proses" class="form-control" required>
                <option value="Proses" {{ old('status_proses', $pendaftaran->status_proses) == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Diterima" {{ old('status_proses', $pendaftaran->status_proses) == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ old('status_proses', $pendaftaran->status_proses) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-4">Perbarui</button>
            <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary px-4">Batal</a>
        </div>
    </form>
    @else
        <div class="alert alert-warning text-center">
            Data pendaftaran tidak ditemukan.
        </div>
    @endif
</div>
@endsection
