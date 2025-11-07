@extends('layouts.app')
@section('title', 'Daftar Pembayaran')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Daftar Pembayaran</h4>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
        + Tambah Pembayaran
    </button>

    <!-- Modal Create -->
    <div class="modal fade" id="modalCreate" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('pembayaran.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nama Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Jumlah Pembayaran</label>
                            <input type="number" step="0.01" name="jumlah" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Metode Pembayaran</label>
                            <select name="metode_pembayaran" class="form-control" required>
                                <option value="">-- Pilih Metode --</option>
                                <option value="Cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                                <option value="E-Wallet">E-Wallet</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Pembayaran</label>
                            <input type="date" name="tanggal_pembayaran" class="form-control" required>
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

    <!-- Tabel Data Pembayaran -->
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Jumlah</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pembayaran as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama_pasien }}</td>
                    <td>{{ number_format($p->jumlah, 2) }}</td>
                    <td>{{ $p->metode_pembayaran }}</td>
                    <td>{{ $p->tanggal_pembayaran }}</td>
                    <td>
                        <a href="{{ route('pembayaran.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pembayaran.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
