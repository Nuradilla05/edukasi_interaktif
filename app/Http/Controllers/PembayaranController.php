<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Menampilkan daftar pembayaran
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Menyimpan data pembayaran baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:100',
            'jumlah' => 'required|numeric',
            'metode_pembayaran' => 'required|string|max:50',
            'tanggal_pembayaran' => 'required|date',
        ]);

        Pembayaran::create($validated);

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit pembayaran
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.edit', compact('pembayaran'));
    }

    /**
     * Memperbarui data pembayaran
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:100',
            'jumlah' => 'required|numeric',
            'metode_pembayaran' => 'required|string|max:50',
            'tanggal_pembayaran' => 'required|date',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($validated);

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    /**
     * Menghapus data pembayaran
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil dihapus.');
    }
}
