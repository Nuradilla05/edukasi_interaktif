@extends('layouts.app')
@section('title', 'Daftar Pengumuman')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Daftar Pengumuman</h4>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
        + Tambah Pengumuman
    </button>

    <!-- Modal Create -->
    <div class="modal fade" id="modalCreate" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('pengumuman.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pengumuman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Tanggal Pengumuman</label>
                                <input type="date" name="tanggal_pengumuman" class="form-control" required>
                            </div>
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

    <!-- Tabel Data Pengumuman -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Tanggal Pengumuman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengumuman as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama_siswa }}</td>
                    <td>
                        @if($p->status == 'Diterima')
                            <span class="badge bg-success">{{ $p->status }}</span>
                        @elseif($p->status == 'Ditolak')
                            <span class="badge bg-danger">{{ $p->status }}</span>
                        @else
                            <span class="badge bg-warning text-dark">{{ $p->status }}</span>
                        @endif
                    </td>
                    <td>{{ $p->keterangan }}</td>
                    <td>{{ $p->tanggal_pengumuman }}</td>
                    <td>
                        <a href="{{ route('pengumuman.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pengumuman.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data pengumuman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
