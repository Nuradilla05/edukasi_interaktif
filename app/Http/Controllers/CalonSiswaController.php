<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;

class CalonSiswaController extends Controller
{
    /**
     * Menampilkan semua data calon siswa
     */
    public function index()
    {
        $calonSiswa = CalonSiswa::all();
        return view('calonsiswa.index', compact('calonSiswa'));
    }

    /**
     * Menampilkan form tambah calon siswa
     */
    public function create()
    {
        return view('calonsiswa.create');
    }

    /**
     * Menyimpan data calon siswa ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn'         => 'required|string|max:20|unique:calonsiswa,nisn',
            'asal_sekolah' => 'required|string|max:255',
            'alamat'       => 'nullable|string|max:255',
        ]);

        CalonSiswa::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nisn'         => $request->nisn,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat'       => $request->alamat,
        ]);

        return redirect()->route('calonsiswa.index')
            ->with('success', 'Data calon siswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit calon siswa
     */
    public function edit($id)
    {
        $calonSiswa = CalonSiswa::findOrFail($id);
        return view('calonsiswa.edit', compact('calonSiswa'));
    }

    /**
     * Update data calon siswa
     */
    public function update(Request $request, $id)
    {
        $calonSiswa = CalonSiswa::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn'         => 'required|string|max:20|unique:calonsiswa,nisn,' . $calonSiswa->id,
            'asal_sekolah' => 'required|string|max:255',
            'alamat'       => 'nullable|string|max:255',
        ]);

        $calonSiswa->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nisn'         => $request->nisn,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat'       => $request->alamat,
        ]);

        return redirect()->route('calonsiswa.index')
            ->with('success', 'Data calon siswa berhasil diperbarui.');
    }

    /**
     * Hapus data calon siswa
     */
    public function destroy($id)
    {
        $calonSiswa = CalonSiswa::findOrFail($id);
        $calonSiswa->delete();

        return redirect()->route('calonsiswa.index')
            ->with('success', 'Data calon siswa berhasil dihapus.');
    }
}
