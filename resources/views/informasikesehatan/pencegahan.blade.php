@extends('layouts.app')

@section('title', 'Pencegahan Penyakit')

@section('content')
<div class="container mt-4">
    <h4>Pencegahan Penyakit</h4>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Pencegahan 1</h5>
                    <p class="card-text">Vaksinasi lengkap sesuai anjuran pemerintah.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Pencegahan 2</h5>
                    <p class="card-text">Hindari kontak dekat dengan orang yang sakit.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Pencegahan 3</h5>
                    <p class="card-text">Rajin menjaga kebersihan lingkungan dan rumah.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
