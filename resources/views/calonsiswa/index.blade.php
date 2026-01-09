@extends('layouts.app')
@section('title', 'Daftar Calon Siswa')

@section('content')
<div class="container">
    <br>
    <h4 class="mb-3">Daftar Calon Siswa</h4>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
        + Tambah Calon Siswa
    </button>

    <!-- Modal Create -->
    <div class="modal fade" id="modalCreate" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="{{ route('calonsiswa.store') }}">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title">Tambah Calon Siswa</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>NISN</label>
                    <input type="text" name="nisn" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                </div>

            </div>
            <div class="modal-footer">
              <button class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Tabel Data Calon Siswa -->
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NISN</th>
                <th>Asal Sekolah</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($calonSiswa as $key => $s)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $s->nama_lengkap }}</td>
                <td>{{ $s->nisn }}</td>
                <td>{{ $s->asal_sekolah }}</td>
                <td>{{ $s->alamat }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $s->id }}">
                        Edit
                    </button>

                    <!-- Form Hapus -->
                    <form action="{{ route('calonsiswa.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data calon siswa ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit{{ $s->id }}" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form method="POST" action="{{ route('calonsiswa.update', $s->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Calon Siswa</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ $s->nama_lengkap }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>NISN</label>
                            <input type="text" name="nisn" value="{{ $s->nisn }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" value="{{ $s->asal_sekolah }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3">{{ $s->alamat }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-success">Perbarui</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data calon siswa</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
