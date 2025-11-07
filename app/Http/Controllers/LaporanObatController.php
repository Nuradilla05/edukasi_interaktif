<?php

namespace App\Http\Controllers;

use App\Models\LaporanObat;
use Illuminate\Http\Request;

class LaporanObatController extends Controller
{
    /**
     * Menampilkan daftar laporan obat
     */
    public function index()
    {
        $laporanobat = LaporanObat::all();
        return view('laporanobat.index', compact('laporanobat'));
    }

    /**
     * Menampilkan form tambah laporan obat
     */
    public function create()
    {
        return view('laporanobat.create');
    }

    /**
     * Menyimpan data laporan obat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'nama_obat' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tanggal_pemberian' => 'required|date',
        ]);

        LaporanObat::create($request->all());

        return redirect()->route('laporanobat.index')
            ->with('success', 'Data laporan obat berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit laporan obat
     */
    public function edit($id)
    {
        $laporan = LaporanObat::findOrFail($id);
        return view('laporanobat.edit', compact('laporan'));
    }

    /**
     * Memperbarui data laporan obat
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'nama_obat' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tanggal_pemberian' => 'required|date',
        ]);

        $laporan = LaporanObat::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('laporanobat.index')
            ->with('success', 'Data laporan obat berhasil diperbarui.');
    }

    /**
     * Menghapus data laporan obat
     */
    public function destroy($id)
    {
        $laporan = LaporanObat::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporanobat.index')
            ->with('success', 'Data laporan obat berhasil dihapus.');
    }
}
