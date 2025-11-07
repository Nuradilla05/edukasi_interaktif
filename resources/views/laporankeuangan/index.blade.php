@extends('layouts.app')
@section('title', 'Daftar Laporan Keuangan')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Daftar Laporan Keuangan</h4>

    <!-- Tombol Tambah Data -->
    <a href="{{ route('laporankeuangan.create') }}" class="btn btn-primary mb-3">
        + Tambah Laporan Keuangan
    </a>

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Pemasukan</th>
                    <th>Pengeluaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporankeuangan as $index => $data)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $data->tanggal }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td class="text-end">{{ number_format($data->pemasukan, 2, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($data->pengeluaran, 2, ',', '.') }}</td>
                        <td class="text-center">
                            <a href="{{ route('laporankeuangan.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('laporankeuangan.destroy', $data->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data laporan keuangan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
