@extends('layouts.app')

@section('title', 'Informasi Kesehatan')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3 text-center">Informasi Kesehatan</h4>
    <p class="text-center">Selamat datang di halaman Informasi Kesehatan. Pilih kategori di bawah untuk mendapatkan informasi lengkap.</p>

    <div class="row mt-4">
        <!-- Kartu Artikel -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="bi bi-journal-text display-4 mb-3 text-success"></i>
                    <h5 class="card-title">Artikel</h5>
                    <p class="card-text">Baca artikel terbaru seputar kesehatan dan tips gaya hidup sehat.</p>
                    <a href="{{ route('informasi.artikel') }}" class="btn btn-success">Lihat Artikel</a>
                </div>
            </div>
        </div>

        <!-- Kartu Tips Sehat -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="bi bi-lightbulb display-4 mb-3 text-warning"></i>
                    <h5 class="card-title">Tips Sehat</h5>
                    <p class="card-text">Dapatkan tips-tips sehat yang mudah diterapkan sehari-hari.</p>
                    <a href="{{ route('informasi.tips') }}" class="btn btn-success">Lihat Tips</a>
                </div>
            </div>
        </div>

        <!-- Kartu Pencegahan Penyakit -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="bi bi-shield-check display-4 mb-3 text-primary"></i>
                    <h5 class="card-title">Pencegahan Penyakit</h5>
                    <p class="card-text">Pelajari cara mencegah penyakit umum dengan langkah sederhana.</p>
                    <a href="{{ route('informasi.pencegahan') }}" class="btn btn-success">Lihat Pencegahan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
