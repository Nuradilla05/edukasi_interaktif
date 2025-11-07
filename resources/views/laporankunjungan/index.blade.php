@extends('layouts.app')
@section('title', 'Daftar Laporan Kunjungan')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Daftar Laporan Kunjungan</h4>

    <!-- Tombol Tambah Data -->
    <a href="{{ route('laporankunjungan.create') }}" class="btn btn-primary mb-3">
        + Tambah Laporan Kunjungan
    </a>

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Diagnosa</th>
                    <th>Tindakan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporankunjungan as $index => $data)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $data->nama_pasien }}</td>
                        <td>{{ $data->nama_dokter }}</td>
                        <td class="text-center">{{ $data->tanggal_kunjungan }}</td>
                        <td>{{ $data->diagnosa ?? '-' }}</td>
                        <td>{{ $data->tindakan ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('laporankunjungan.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('laporankunjungan.destroy', $data->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data laporan kunjungan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
