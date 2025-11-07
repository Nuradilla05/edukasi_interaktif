@extends('layouts.app')

@section('title', 'Artikel Kesehatan')

@section('content')
<div class="container mt-4">
    <h4>Artikel Kesehatan</h4>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Artikel 1</h5>
                    <p class="card-text">Tips menjaga pola makan sehat setiap hari.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Artikel 2</h5>
                    <p class="card-text">Cara olahraga ringan di rumah untuk menjaga kebugaran.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Artikel 3</h5>
                    <p class="card-text">Tips tidur cukup dan berkualitas untuk kesehatan tubuh.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
