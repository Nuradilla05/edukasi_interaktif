@extends('layouts.app')
@section('title', 'Daftar Laporan Obat')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Daftar Laporan Obat</h4>

    <!-- Tombol Tambah Data -->
    <a href="{{ route('laporanobat.create') }}" class="btn btn-primary mb-3">
        + Tambah Laporan Obat
    </a>

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pemberian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporanobat as $index => $data)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $data->nama_pasien }}</td>
                        <td>{{ $data->nama_obat }}</td>
                        <td class="text-center">{{ $data->jumlah }}</td>
                        <td class="text-center">{{ $data->tanggal_pemberian }}</td>
                        <td class="text-center">
                            <a href="{{ route('laporanobat.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('laporanobat.destroy', $data->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data laporan obat</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
