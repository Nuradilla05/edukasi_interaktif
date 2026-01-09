@extends('layouts.app')
@section('title', 'Daftar Jurusan')

@section('content')
<div class="container">
    <br>
    <h4 class="mb-3">Daftar Jurusan</h4>

    <!-- Tombol Tambah -->
    <a href="{{ route('jurusan.create') }}" class="btn btn-primary mb-3">+ Tambah Jurusan</a>

    <!-- Pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Data Jurusan -->
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Kepala Jurusan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jurusan as $key => $j)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $j->kode_jurusan }}</td>
                <td>{{ $j->nama_jurusan }}</td>
                <td>{{ $j->kepala_jurusan }}</td>
                <td>{{ $j->keterangan }}</td>
                <td>
                    <a href="{{ route('jurusan.edit', $j->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('jurusan.destroy', $j->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted">Belum ada data jurusan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
