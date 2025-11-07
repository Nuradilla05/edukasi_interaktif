@extends('layouts.app')
@section('title', 'Daftar Dokter')

@section('content')
<div class="container">
    <br>
    <h4 class="mb-3">Daftar Dokter</h4>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
        + Tambah Dokter
    </button>

    <!-- Modal Create -->
    <div class="modal fade" id="modalCreate" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="{{ route('dokter.store') }}">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title">Tambah Dokter</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Spesialis</label>
                    <input type="text" name="spesialis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
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

    <!-- Tabel Data Dokter -->
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Spesialis</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dokter as $key => $d)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->spesialis }}</td>
                <td>{{ $d->no_hp }}</td>
                <td>{{ $d->alamat }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $d->id }}">Edit</button>
                    
                    <!-- Form Hapus -->
                    <form action="{{ route('dokter.destroy', $d->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus dokter ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form method="POST" action="{{ route('dokter.update', $d->id) }}">
                    @csrf @method('PUT')
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Dokter: {{ $d->nama }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" value="{{ $d->nama }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Spesialis</label>
                            <input type="text" name="spesialis" value="{{ $d->spesialis }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>No HP</label>
                            <input type="text" name="no_hp" value="{{ $d->no_hp }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ $d->alamat }}</textarea>
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
                <td colspan="6" class="text-center">Belum ada data dokter</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
