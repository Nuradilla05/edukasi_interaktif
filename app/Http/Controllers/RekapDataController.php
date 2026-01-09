<?php

namespace App\Http\Controllers;

use App\Models\RekapData;
use Illuminate\Http\Request;

class RekapDataController extends Controller
{
    /**
     * Menampilkan daftar rekap data siswa
     */
    public function index()
    {
        $rekap = RekapData::all();
        return view('rekapdata.index', compact('rekap'));
    }

    /**
     * Menampilkan form tambah data siswa
     */
    public function create()
    {
        return view('rekapdata.create');
    }

    /**
     * Menyimpan data siswa baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'nilai_rapor' => 'required|integer',
            'nilai_tes' => 'required|integer',
        ]);

        RekapData::create($request->all());

        return redirect()->route('rekapdata.index')
            ->with('success', 'Data rekap siswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit data siswa
     */
    public function edit($id)
    {
        $rekap = RekapData::findOrFail($id);
        return view('rekapdata.edit', compact('rekap'));
    }

    /**
     * Memperbarui data siswa
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'nilai_rapor' => 'required|integer',
            'nilai_tes' => 'required|integer',
        ]);

        $rekap = RekapData::findOrFail($id);
        $rekap->update($request->all());

        return redirect()->route('rekapdata.index')
            ->with('success', 'Data rekap siswa berhasil diperbarui.');
    }

    /**
     * Menghapus data siswa
     */
    public function destroy($id)
    {
        $rekap = RekapData::findOrFail($id);
        $rekap->delete();

        return redirect()->route('rekapdata.index')
            ->with('success', 'Data rekap siswa berhasil dihapus.');
    }
}
