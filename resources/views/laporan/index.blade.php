@extends('layouts.app')
@section('title', 'Daftar Laporan Siswa Baru')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Daftar Laporan Siswa Baru</h4>

    <!-- Tombol Tambah Data -->
    <a href="{{ route('laporan.create') }}" class="btn btn-primary mb-3">
        + Tambah Laporan Siswa Baru
    </a>

    <!-- Pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Jurusan</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $index => $data)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $data->nama_siswa }}</td>
                        <td>{{ $data->jurusan }}</td>
                        <td class="text-center">{{ $data->tanggal_pendaftaran }}</td>
                        <td class="text-center">{{ ucfirst($data->status) }}</td>
                        <td class="text-center">
                            <a href="{{ route('laporan.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('laporan.destroy', $data->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data laporan siswa baru</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
