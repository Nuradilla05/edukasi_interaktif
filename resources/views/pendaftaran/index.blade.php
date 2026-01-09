@extends('layouts.app')
@section('title', 'Daftar Pendaftaran Siswa Baru')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Daftar Pendaftaran Siswa Baru</h4>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
        + Tambah Pendaftaran
    </button>

    <!-- Modal Create -->
    <div class="modal fade" id="modalCreate" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('pendaftaran.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>NISN</label>
                                <input type="text" name="nisn" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Jurusan</label>
                                <select name="jurusan" class="form-control" required>
                                    <option value="">-- Pilih Jurusan --</option>
                                    <option value="TKJ">TKJ (Teknik Komputer dan Jaringan)</option>
                                    <option value="RPL">RPL (Rekayasa Perangkat Lunak)</option>
                                    <option value="MM">MM (Multimedia)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Tanggal Daftar</label>
                                <input type="date" name="tanggal_daftar" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Status Proses</label>
                                <select name="status_proses" class="form-control" required>
                                    <option value="Proses">Proses</option>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
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

    <!-- Tabel Data Pendaftaran -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
                <th>Asal Sekolah</th>
                <th>Jurusan</th>
                <th>Tanggal Daftar</th>
                <th>Status Proses</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendaftaran as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama_siswa }}</td>
                    <td>{{ $p->nisn }}</td>
                    <td>{{ $p->jenis_kelamin }}</td>
                    <td>{{ $p->asal_sekolah }}</td>
                    <td>{{ $p->jurusan }}</td>
                    <td>{{ $p->tanggal_daftar }}</td>
                    <td>
                        @if($p->status_proses == 'Diterima')
                            <span class="badge bg-success">{{ $p->status_proses }}</span>
                        @elseif($p->status_proses == 'Ditolak')
                            <span class="badge bg-danger">{{ $p->status_proses }}</span>
                        @else
                            <span class="badge bg-warning text-dark">{{ $p->status_proses }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pendaftaran.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pendaftaran.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Belum ada data pendaftaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
