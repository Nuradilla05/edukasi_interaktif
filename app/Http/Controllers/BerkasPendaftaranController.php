<?php

namespace App\Http\Controllers;

use App\Models\BerkasPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkasPendaftaranController extends Controller
{
    /**
     * Menampilkan daftar berkas pendaftaran
     */
    public function index()
    {
        $berkas = BerkasPendaftaran::all();
        return view('berkaspendaftaran.index', compact('berkas'));
    }

    /**
     * Menyimpan data berkas pendaftaran baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'nisn' => 'required|string|max:20',
            'file_berkas' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // max 2MB
            'status_verifikasi' => 'required|in:Proses,Diterima,Ditolak',
        ]);

        // Upload file ke folder 'public/berkas'
        if ($request->hasFile('file_berkas')) {
            $file = $request->file('file_berkas');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/berkas', $filename);
            $validated['file_berkas'] = $filename;
        }

        BerkasPendaftaran::create($validated);

        return redirect()->route('berkaspendaftaran.index')
            ->with('success', 'Berkas pendaftaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit berkas pendaftaran
     */
    public function edit($id)
    {
        $berkas = BerkasPendaftaran::findOrFail($id);
        return view('berkaspendaftaran.edit', compact('berkas'));
    }

    /**
     * Memperbarui data berkas pendaftaran
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'nisn' => 'required|string|max:20',
            'file_berkas' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'status_verifikasi' => 'required|in:Proses,Diterima,Ditolak',
        ]);

        $berkas = BerkasPendaftaran::findOrFail($id);

        // Jika ada file baru diupload, hapus file lama
        if ($request->hasFile('file_berkas')) {
            if ($berkas->file_berkas && Storage::exists('public/berkas/' . $berkas->file_berkas)) {
                Storage::delete('public/berkas/' . $berkas->file_berkas);
            }
            $file = $request->file('file_berkas');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/berkas', $filename);
            $validated['file_berkas'] = $filename;
        }

        $berkas->update($validated);

        return redirect()->route('berkaspendaftaran.index')
            ->with('success', 'Berkas pendaftaran berhasil diperbarui.');
    }

    /**
     * Menghapus data berkas pendaftaran
     */
    public function destroy($id)
    {
        $berkas = BerkasPendaftaran::findOrFail($id);

        // Hapus file dari storage
        if ($berkas->file_berkas && Storage::exists('public/berkas/' . $berkas->file_berkas)) {
            Storage::delete('public/berkas/' . $berkas->file_berkas);
        }

        $berkas->delete();

        return redirect()->route('berkaspendaftaran.index')
            ->with('success', 'Berkas pendaftaran berhasil dihapus.');
    }
}
