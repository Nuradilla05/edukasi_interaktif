<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Menampilkan daftar pengumuman
     */
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('pengumuman.index', compact('pengumuman'));
    }

    /**
     * Menyimpan data pengumuman baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'keterangan' => 'required|string|max:255',
            'status' => 'required|string|in:Diterima,Ditolak,Proses',
            'tanggal_pengumuman' => 'required|date',
        ]);

        Pengumuman::create($validated);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Data pengumuman berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit pengumuman
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Memperbarui data pengumuman
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'keterangan' => 'required|string|max:255',
            'status' => 'required|string|in:Diterima,Ditolak,Proses',
            'tanggal_pengumuman' => 'required|date',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update($validated);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Data pengumuman berhasil diperbarui.');
    }

    /**
     * Menghapus data pengumuman
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
            ->with('success', 'Data pengumuman berhasil dihapus.');
    }
}
