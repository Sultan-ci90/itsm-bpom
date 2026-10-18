<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Bidang;

class LokasiController extends Controller
{
    /**
     * Menampilkan daftar master lokasi
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Lokasi::orderBy('nama_lokasi', 'asc');

        if ($search) {
            $query->where('nama_lokasi', 'like', "%{$search}%");
        }

        $lokasis = $query->paginate(15)->withQueryString();

        return view('master.lokasi.index', compact('lokasis', 'search'));
    }

    /**
     * Menyimpan data lokasi baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:150|unique:lokasis,nama_lokasi',
        ], [
            'nama_lokasi.required' => 'Nama lokasi wajib diisi.',
            'nama_lokasi.unique' => 'Nama lokasi ini sudah terdaftar.',
        ]);

        Lokasi::create([
            'nama_lokasi' => trim($validated['nama_lokasi']),
            'bidang_id' => null,
        ]);

        return redirect()->route('master.lokasi.index')
            ->with('success', 'Lokasi baru berhasil ditambahkan.');
    }

    /**
     * Mengupdate data lokasi
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:150|unique:lokasis,nama_lokasi,' . $lokasi->id,
        ], [
            'nama_lokasi.required' => 'Nama lokasi wajib diisi.',
            'nama_lokasi.unique' => 'Nama lokasi ini sudah digunakan.',
        ]);

        $lokasi->update([
            'nama_lokasi' => trim($validated['nama_lokasi']),
            'bidang_id' => null,
        ]);

        return redirect()->route('master.lokasi.index')
            ->with('success', 'Data lokasi berhasil diperbarui.');
    }

    /**
     * Menghapus data lokasi
     */
    public function destroy(Lokasi $lokasi)
    {
        $nama = $lokasi->nama_lokasi;
        $lokasi->delete();

        return redirect()->route('master.lokasi.index')
            ->with('success', "Lokasi '{$nama}' berhasil dihapus.");
    }

    /**
     * Ambil daftar lokasi terurut A-Z untuk AJAX
     */
    public function getByBidang(Request $request, $bidangId = null)
    {
        $lokasis = Lokasi::orderBy('nama_lokasi', 'asc')->pluck('nama_lokasi')->toArray();

        if (empty($lokasis)) {
            $lokasis = ['Ruang Staff Tata Usaha', 'Aula BPOM', 'Ruang Rapat Utama'];
        }

        return response()->json([
            'default_lokasi' => $lokasis[0] ?? '',
            'lokasis' => $lokasis,
        ]);
    }
}
