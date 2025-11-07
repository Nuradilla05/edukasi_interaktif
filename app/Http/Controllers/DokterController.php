<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all();
        return view('dokter.index', compact('dokter'));
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('edukasi.Dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}
