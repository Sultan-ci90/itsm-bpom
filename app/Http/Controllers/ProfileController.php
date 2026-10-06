<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile', [
            'title' => 'Profile',
            'user'  => Auth::user()->load(['bidang', 'panggol']),
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Kolom di tabel users bersifat NOT NULL (kecuali foto_profil), jadi wajib diisi.
        $request->validate([
            'nama'               => 'required|string|max:150',
            'email'              => 'required|string|email|max:150|unique:users,email,' . $user->id,
            'tempat_lahir'       => 'required|string|max:100',
            'tanggal_lahir'      => 'required|date|before:today',
            'jenkel'             => 'required|in:L,P',
            'status_pernikahan'  => 'required|in:Belum Menikah,Menikah,Janda,Duda', // sesuai enum database
            'no_telp'            => 'required|string|max:20',
            'alamat'             => 'required|string|max:1000',
            'password'           => 'nullable|string|min:6',
            'foto_profil_base64' => 'nullable|string|max:4000000',
            'hapus_foto'         => 'nullable|in:0,1',
        ]);

        $user->nama              = $request->nama;
        $user->email             = $request->email;
        $user->tempat_lahir      = $request->tempat_lahir;
        $user->tanggal_lahir     = $request->tanggal_lahir;
        $user->jenkel            = $request->jenkel;
        $user->status_pernikahan = $request->status_pernikahan;
        $user->no_telp           = $request->no_telp;
        $user->alamat            = $request->alamat;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Foto: hapus ATAU ganti (hasil crop dari browser, dikirim sebagai base64)
        $oldPhoto = $user->foto_profil;
        $replaced = false;

        if ($request->input('hapus_foto') === '1') {
            $user->foto_profil = null;
            $replaced = true;
        } elseif ($request->filled('foto_profil_base64')) {
            $user->foto_profil = $this->storeBase64Photo($request->foto_profil_base64);
            $replaced = true;
        }

        $user->save();

        // File lama baru dihapus setelah data berhasil disimpan
        if ($replaced && $oldPhoto && Storage::disk('public')->exists($oldPhoto)) {
            Storage::disk('public')->delete($oldPhoto);
        }

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Validasi & simpan gambar base64 (JPG/PNG, maks 2 MB). Isi file diperiksa
     * sungguh-sungguh sebagai gambar, bukan hanya mengandalkan prefix data URI.
     */
    private function storeBase64Photo(string $dataUri): string
    {
        $invalid = fn () => ValidationException::withMessages([
            'foto_profil_base64' => 'Foto tidak valid. Gunakan gambar JPG atau PNG maksimal 2 MB.',
        ]);

        if (!preg_match('/^data:image\/(jpeg|jpg|png);base64,/i', $dataUri)) {
            throw $invalid();
        }

        $binary = base64_decode(substr($dataUri, strpos($dataUri, ',') + 1), true);

        if ($binary === false || strlen($binary) > 2 * 1024 * 1024) {
            throw $invalid();
        }

        $info = @getimagesizefromstring($binary);

        if (!$info || !in_array($info['mime'], ['image/jpeg', 'image/png'], true)) {
            throw $invalid();
        }

        $ext  = $info['mime'] === 'image/png' ? 'png' : 'jpg';
        $path = 'profiles/' . Str::random(30) . '.' . $ext;

        Storage::disk('public')->put($path, $binary);

        return $path;
    }
}