<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    // Menampilkan daftar jurusan SMK
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    // Form tambah jurusan
    public function create()
    {
        return view('jurusan.create');
    }

    // Simpan data jurusan baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_jurusan'   => 'required|string|max:20|unique:jurusan,kode_jurusan',
            'nama_jurusan'   => 'required|string|max:255',
            'keterangan'     => 'nullable|string|max:255',
            'kepala_jurusan' => 'nullable|string|max:255',
        ]);

        Jurusan::create([
            'kode_jurusan'   => $request->kode_jurusan,
            'nama_jurusan'   => $request->nama_jurusan,
            'keterangan'     => $request->keterangan,
            'kepala_jurusan' => $request->kepala_jurusan,
        ]);

        return redirect()->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    // Form edit jurusan
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    // Update data jurusan
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_jurusan'   => 'required|string|max:20|unique:jurusan,kode_jurusan,' . $id,
            'nama_jurusan'   => 'required|string|max:255',
            'keterangan'     => 'nullable|string|max:255',
            'kepala_jurusan' => 'nullable|string|max:255',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update([
            'kode_jurusan'   => $request->kode_jurusan,
            'nama_jurusan'   => $request->nama_jurusan,
            'keterangan'     => $request->keterangan,
            'kepala_jurusan' => $request->kepala_jurusan,
        ]);

        return redirect()->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil diperbarui.');
    }

    // Hapus jurusan
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil dihapus.');
    }
}
