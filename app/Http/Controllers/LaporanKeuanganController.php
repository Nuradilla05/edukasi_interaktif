<?php

namespace App\Http\Controllers;

use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    /**
     * Menampilkan daftar laporan keuangan
     */
    public function index()
    {
        $laporankeuangan = LaporanKeuangan::all();
        return view('laporankeuangan.index', compact('laporankeuangan'));
    }

    /**
     * Menampilkan form tambah laporan keuangan
     */
    public function create()
    {
        return view('laporankeuangan.create');
    }

    /**
     * Menyimpan data laporan keuangan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'pemasukan' => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
        ]);

        LaporanKeuangan::create($request->all());

        return redirect()->route('laporankeuangan.index')
            ->with('success', 'Data laporan keuangan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit laporan keuangan
     */
    public function edit($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        return view('laporankeuangan.edit', compact('laporan'));
    }

    /**
     * Memperbarui data laporan keuangan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'pemasukan' => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
        ]);

        $laporan = LaporanKeuangan::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('laporankeuangan.index')
            ->with('success', 'Data laporan keuangan berhasil diperbarui.');
    }

    /**
     * Menghapus data laporan keuangan
     */
    public function destroy($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporankeuangan.index')
            ->with('success', 'Data laporan keuangan berhasil dihapus.');
    }
}
