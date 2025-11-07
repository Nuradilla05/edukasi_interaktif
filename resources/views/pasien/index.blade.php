@extends('layouts.app')
@section('title', 'Daftar Pasien')

@section('content')
<div class="container">
    <br>
    <h4 class="mb-3">Daftar Pasien</h4>

    <!-- Tombol Tambah -->
    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">+ Tambah Pasien</a>

    <!-- Pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Data Pasien -->
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pasien as $key => $p)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->tanggal_lahir }}</td>
                <td>{{ $p->no_hp }}</td>
                <td>{{ $p->alamat }}</td>
                <td>
                    <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pasien.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pasien ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Belum ada data pasien</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
