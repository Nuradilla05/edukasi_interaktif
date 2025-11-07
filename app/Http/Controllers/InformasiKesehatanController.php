<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiKesehatanController extends Controller
{
    public function index() {
        return view('informasi_kesehatan.index');
    }

    public function artikel() {
        return view('informasi_kesehatan.artikel');
    }

    public function tips() {
        return view('informasi_kesehatan.tips');
    }

    public function pencegahan() {
        return view('informasi_kesehatan.pencegahan');
    }
}
