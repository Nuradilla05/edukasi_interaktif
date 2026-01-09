@extends('layouts.app')
@section('title', 'Daftar Rekap Data Siswa')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Daftar Rekap Data Siswa</h4>

    <!-- Tombol Tambah Data -->
    <a href="{{ route('rekapdata.create') }}" class="btn btn-primary mb-3">
        + Tambah Data Siswa
    </a>

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Asal Sekolah</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Nilai Rapor</th>
                    <th>Nilai Tes</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rekap as $index => $data)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $data->nama_siswa }}</td>
                        <td>{{ $data->asal_sekolah }}</td>
                        <td>{{ $data->tempat_lahir }}</td>
                        <td class="text-center">{{ $data->tanggal_lahir }}</td>
                        <td class="text-center">{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td class="text-center">{{ $data->nilai_rapor }}</td>
                        <td class="text-center">{{ $data->nilai_tes }}</td>
                        <td class="text-center">
                            <a href="{{ route('rekapdata.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('rekapdata.destroy', $data->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Belum ada data rekap siswa</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
