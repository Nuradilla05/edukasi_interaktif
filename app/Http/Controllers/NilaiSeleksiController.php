<?php

namespace App\Http\Controllers;

use App\Models\NilaiSeleksi;
use Illuminate\Http\Request;

class NilaiSeleksiController extends Controller
{
    public function index()
    {
        $nilaiseleksi = NilaiSeleksi::all();
        return view('nilaiseleksi.index', compact('nilaiseleksi'));
    }

    public function create()
    {
        return view('nilaiseleksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namapendaftar' => 'required|string|max:255',
            'nilairapor'    => 'required|numeric|min:0|max:100',
            'nilaites'      => 'required|numeric|min:0|max:100',
            'keterangan'    => 'nullable|string|max:255',
        ]);

        $nilaiakhir = ($request->nilairapor + $request->nilaites) / 2;

        NilaiSeleksi::create([
            'namapendaftar' => $request->namapendaftar,
            'nilairapor'    => $request->nilairapor,
            'nilaites'      => $request->nilaites,
            'nilaiakhir'    => $nilaiakhir,
            'keterangan'    => $request->keterangan,
        ]);

        return redirect()->route('nilaiseleksi.index');
    }

    public function edit($id)
    {
        $nilaiseleksi = NilaiSeleksi::findOrFail($id);
        return view('nilaiseleksi.edit', compact('nilaiseleksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namapendaftar' => 'required|string|max:255',
            'nilairapor'    => 'required|numeric|min:0|max:100',
            'nilaites'      => 'required|numeric|min:0|max:100',
            'keterangan'    => 'nullable|string|max:255',
        ]);

        $nilaiakhir = ($request->nilairapor + $request->nilaites) / 2;

        $nilaiseleksi = NilaiSeleksi::findOrFail($id);
        $nilaiseleksi->update([
            'namapendaftar' => $request->namapendaftar,
            'nilairapor'    => $request->nilairapor,
            'nilaites'      => $request->nilaites,
            'nilaiakhir'    => $nilaiakhir,
            'keterangan'    => $request->keterangan,
        ]);

        return redirect()->route('nilaiseleksi.index');
    }

    public function destroy($id)
    {
        NilaiSeleksi::findOrFail($id)->delete();
        return redirect()->route('nilaiseleksi.index');
    }
}
