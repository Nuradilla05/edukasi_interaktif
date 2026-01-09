<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Menampilkan daftar pendaftaran siswa baru
     */
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    /**
     * Menyimpan data pendaftaran baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'nisn' => 'required|string|max:20|unique:pendaftaran,nisn',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:100',
            'jurusan' => 'required|string|max:50',
            'tanggal_daftar' => 'required|date',
            'status_proses' => 'required|string|in:Proses,Diterima,Ditolak',
        ]);

        Pendaftaran::create($validated);

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit pendaftaran
     */
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('pendaftaran.edit', compact('pendaftaran'));
    }

    /**
     * Memperbarui data pendaftaran
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'nisn' => 'required|string|max:20|unique:pendaftaran,nisn,' . $id,
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:100',
            'jurusan' => 'required|string|max:50',
            'tanggal_daftar' => 'required|date',
            'status_proses' => 'required|string|in:Proses,Diterima,Ditolak',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update($validated);

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

    /**
     * Menghapus data pendaftaran
     */
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
