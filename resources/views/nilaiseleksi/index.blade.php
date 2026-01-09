@extends('layouts.app')
@section('title', 'Daftar Nilai Seleksi')

@section('content')
<div class="container">
    <h4 class="mb-4">Daftar Nilai Seleksi</h4>

    {{-- Tombol Tambah --}}
    <a href="{{ route('nilaiseleksi.create') }}" class="btn btn-primary mb-3">+ Tambah Nilai Seleksi</a>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel daftar nilai seleksi --}}
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Pendaftar</th>
                <th>Nilai Rapor</th>
                <th>Nilai Tes</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($nilaiseleksi as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->namapendaftar }}</td>
                    <td>{{ $item->nilairapor }}</td>
                    <td>{{ $item->nilaites }}</td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('nilaiseleksi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('nilaiseleksi.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data nilai seleksi belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
