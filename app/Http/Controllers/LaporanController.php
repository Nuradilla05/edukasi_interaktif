<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Menampilkan daftar laporan penerimaan siswa baru
     */
    public function index()
    {
        $laporan = Laporan::all();
        return view('laporan.index', compact('laporan'));
    }

    /**
     * Menampilkan form tambah laporan siswa baru
     */
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Menyimpan data laporan siswa baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tanggal_pendaftaran' => 'required|date',
            'status' => 'required|string|max:50', // diterima/ditolak/proses
        ]);

        Laporan::create($request->all());

        return redirect()->route('laporan.index')
            ->with('success', 'Data laporan siswa baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit laporan siswa baru
     */
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.edit', compact('laporan'));
    }

    /**
     * Memperbarui data laporan siswa baru
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tanggal_pendaftaran' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('laporan.index')
            ->with('success', 'Data laporan siswa baru berhasil diperbarui.');
    }

    /**
     * Menghapus data laporan siswa baru
     */
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Data laporan siswa baru berhasil dihapus.');
    }
}
