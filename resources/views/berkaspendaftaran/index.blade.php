@extends('layouts.app')
@section('title', 'Daftar Berkas Pendaftaran')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Daftar Berkas Pendaftaran</h4>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
        + Tambah Berkas
    </button>

    <!-- Modal Create -->
    <div class="modal fade" id="modalCreate" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('berkaspendaftaran.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Berkas Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>File Berkas (PDF/JPG/PNG)</label>
                            <input type="file" name="file_berkas" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                        <div class="mb-3">
                            <label>Status Verifikasi</label>
                            <select name="status_verifikasi" class="form-control" required>
                                <option value="Proses">Proses</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel Data Berkas Pendaftaran -->
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>File Berkas</th>
                <th>Status Verifikasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($berkas as $index => $b)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $b->nama_siswa }}</td>
                    <td>{{ $b->nisn }}</td>
                    <td>
                        @if($b->file_berkas)
                            @php
                                $ext = pathinfo($b->file_berkas, PATHINFO_EXTENSION);
                                $url = Storage::url($b->file_berkas); // gunakan langsung nama/path dari DB
                            @endphp
                            @if(in_array(strtolower($ext), ['jpg','jpeg','png']))
                                <img src="{{ $url }}" alt="Berkas" width="80">
                            @else
                                <a href="{{ $url }}" target="_blank">Lihat File</a>
                            @endif
                        @else
                            Tidak ada file
                        @endif
                    </td>
                    <td>{{ $b->status_verifikasi }}</td>
                    <td>
                        <a href="{{ route('berkaspendaftaran.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('berkaspendaftaran.destroy', $b->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data berkas pendaftaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
