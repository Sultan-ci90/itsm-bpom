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

        // Jika tombol simpan password diklik namun field password masih kosong
        if ($request->input('action') === 'update_password' && !$request->filled('password') && !$request->filled('current_password')) {
            return back()->withErrors([
                'current_password' => 'Silakan isi password lama dan password baru untuk mengubah password.',
            ]);
        }

        // Hanya no_telp dan alamat yang dapat diubah oleh pengguna.
        // Password diubah melalui verifikasi 3-field (password lama, password baru, password verif).
        $request->validate([
            'no_telp'               => ['required', 'string', 'regex:/^(\+62|62|0)[0-9]{8,13}$/'],
            'alamat'                => 'required|string|max:1000',
            'current_password'      => ['nullable', 'required_with:password', 'current_password'],
            'password'              => ['nullable', 'required_with:current_password', 'string', 'min:6', 'confirmed', 'different:current_password'],
            'password_confirmation' => ['nullable', 'required_with:password'],
            'foto_profil_base64'    => 'nullable|string|max:4000000',
            'hapus_foto'            => 'nullable|in:0,1',
        ], [
            'no_telp.regex'                    => 'Nomor telepon harus diawali 0, 62, atau +62 dan berisi 10 hingga 15 digit angka.',
            'current_password.required_with'   => 'Password lama wajib diisi untuk mengubah password.',
            'current_password.current_password'=> 'Password lama tidak sesuai.',
            'password.required_with'           => 'Password baru wajib diisi jika memasukkan password lama.',
            'password.confirmed'               => 'Konfirmasi password verifikasi tidak cocok dengan password baru.',
            'password.different'               => 'Password baru harus berbeda dari password lama.',
            'password.min'                     => 'Password baru minimal 6 karakter.',
        ]);

        $user->no_telp = $request->no_telp;
        $user->alamat  = $request->alamat;

        $passwordChanged = false;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $passwordChanged = true;
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

        $successMsg = $passwordChanged
            ? 'Password baru berhasil disimpan dan profil diperbarui!'
            : 'Profil berhasil diperbarui!';

        return redirect()->route('profile')->with('success', $successMsg);
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