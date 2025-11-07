<?php

namespace App\Http\Controllers;

use App\Models\LaporanKunjungan;
use Illuminate\Http\Request;

class LaporanKunjunganController extends Controller
{
    /**
     * Menampilkan daftar laporan kunjungan
     */
    public function index()
    {
        $laporankunjungan = LaporanKunjungan::all();
        return view('laporankunjungan.index', compact('laporankunjungan'));
    }

    /**
     * Menampilkan form tambah laporan kunjungan
     */
    public function create()
    {
        return view('laporankunjungan.create');
    }

    /**
     * Menyimpan data laporan kunjungan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'nama_dokter' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
            'diagnosa' => 'nullable|string|max:255',
            'tindakan' => 'nullable|string|max:255',
        ]);

        LaporanKunjungan::create($request->all());

        return redirect()->route('laporankunjungan.index')
            ->with('success', 'Data laporan kunjungan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit laporan kunjungan
     */
    public function edit($id)
    {
        $laporan = LaporanKunjungan::findOrFail($id);
        return view('laporankunjungan.edit', compact('laporan'));
    }

    /**
     * Memperbarui data laporan kunjungan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'nama_dokter' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
            'diagnosa' => 'nullable|string|max:255',
            'tindakan' => 'nullable|string|max:255',
        ]);

        $laporan = LaporanKunjungan::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('laporankunjungan.index')
            ->with('success', 'Data laporan kunjungan berhasil diperbarui.');
    }

    /**
     * Menghapus data laporan kunjungan
     */
    public function destroy($id)
    {
        $laporan = LaporanKunjungan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporankunjungan.index')
            ->with('success', 'Data laporan kunjungan berhasil dihapus.');
    }
}
