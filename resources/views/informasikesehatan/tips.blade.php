@extends('layouts.app')

@section('title', 'Tips Sehat')

@section('content')
<div class="container mt-4">
    <h4>Tips Sehat</h4>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Tips 1</h5>
                    <p class="card-text">Rajin mencuci tangan sebelum dan sesudah makan.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Tips 2</h5>
                    <p class="card-text">Konsumsi sayur dan buah setiap hari untuk menjaga daya tahan tubuh.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Tips 3</h5>
                    <p class="card-text">Lakukan olahraga minimal 30 menit setiap hari.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
