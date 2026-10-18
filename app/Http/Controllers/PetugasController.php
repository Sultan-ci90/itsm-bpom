<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bidang;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Menampilkan daftar petugas (Tim IT & Admin) serta seluruh pegawai
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $roleFilter = $request->input('role');

        $query = User::with('bidang')->orderBy('role', 'asc')->orderBy('nama', 'asc');

        // Default menampilkan Tim IT dan Admin jika tidak ada filter khusus
        if ($roleFilter) {
            $query->where('role', $roleFilter);
        } else {
            $query->whereIn('role', ['teknisi', 'admin']);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $petugasList = $query->paginate(15)->withQueryString();

        // Pegawai biasa (pelapor) yang tersedia untuk diangkat menjadi Tim IT / Admin
        $availablePegawai = User::with('bidang')
            ->where('role', 'pelapor')
            ->orderBy('nama', 'asc')
            ->get();

        $bidangs = Bidang::orderBy('nama_bidang', 'asc')->get();

        // Hitung ringkasan
        $totalTeknisi = User::where('role', 'teknisi')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalPelapor = User::where('role', 'pelapor')->count();

        return view('master.petugas.index', compact(
            'petugasList',
            'availablePegawai',
            'bidangs',
            'search',
            'roleFilter',
            'totalTeknisi',
            'totalAdmin',
            'totalPelapor'
        ));
    }

    /**
     * Menambahkan / Mengangkat pegawai menjadi Tim IT atau Admin
     */
    public function store(Request $request)
    {
        $mode = $request->input('mode', 'new');

        // Mode 1: Pilih dari pegawai yang sudah terdaftar di sistem
        if ($mode === 'existing') {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'role' => 'required|in:pelapor,teknisi,admin',
            ], [
                'user_id.required' => 'Pilih pegawai yang akan ditugaskan.',
                'user_id.exists' => 'Data pegawai tidak ditemukan.',
                'role.required' => 'Pilih jenis petugas.',
                'role.in' => 'Jenis petugas tidak valid.',
            ]);

            $user = User::findOrFail($validated['user_id']);
            $user->update(['role' => $validated['role']]);

            $roleLabel = match($validated['role']) {
                'admin' => 'Administrator',
                'teknisi' => 'Tim IT (Teknisi)',
                default => 'Pegawai Biasa (Pelapor)',
            };

            return redirect()->route('master.petugas.index')
                ->with('success', "Pegawai {$user->nama} berhasil diatur perannya menjadi {$roleLabel}.");
        }

        // Mode 2: Daftarkan Pegawai / Petugas Baru dari Nol
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'nip' => ['required', 'string', 'regex:/^[0-9]{8,18}$/', 'unique:users,nip'],
            'email' => 'nullable|email|max:150|unique:users,email',
            'bidang_id' => 'nullable|exists:bidang,id',
            'role' => 'required|in:pelapor,teknisi,admin',
        ], [
            'nama.required' => 'Nama pegawai wajib diisi.',
            'nip.required' => 'NIP pegawai wajib diisi.',
            'nip.regex' => 'NIP harus berupa angka antara 8 hingga 18 digit.',
            'nip.unique' => 'NIP ini sudah terdaftar di sistem.',
            'email.unique' => 'Email ini sudah terdaftar di sistem.',
            'role.required' => 'Pilih jenis petugas / peran.',
        ]);

        $email = (!empty($validated['email'])) ? $validated['email'] : ($validated['nip'] . '@bpom.go.id');

        $user = User::create([
            'nama' => trim($validated['nama']),
            'nip' => trim($validated['nip']),
            'email' => $email,
            'password' => Hash::make('password'),
            'bidang_id' => $validated['bidang_id'] ?? null,
            'role' => $validated['role'],
            'tempat_lahir' => 'Banjarmasin',
            'tanggal_lahir' => '1995-01-01',
            'jenkel' => 'L',
            'status_kepegawaian' => 'PNS',
            'status_pernikahan' => 'Belum Menikah',
            'no_telp' => '-',
            'alamat' => '-',
        ]);

        $roleLabel = match($validated['role']) {
            'admin' => 'Administrator',
            'teknisi' => 'Tim IT (Teknisi)',
            default => 'Pegawai Biasa (Pelapor)',
        };

        return redirect()->route('master.petugas.index')
            ->with('success', "Petugas baru {$user->nama} ({$roleLabel}) berhasil ditambahkan ke database.");
    }

    /**
     * Mengubah peran / role pegawai
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:pelapor,teknisi,admin',
        ], [
            'role.required' => 'Pilih peran baru untuk pegawai.',
            'role.in' => 'Peran tidak valid.',
        ]);

        // Cegah pengguna mencabut akses dirinya sendiri
        if ($user->id === auth()->id() && $validated['role'] === 'pelapor') {
            return back()->with('error', 'Anda tidak dapat mencabut akses petugas dari akun Anda sendiri saat sedang login.');
        }

        $user->update(['role' => $validated['role']]);

        $roleLabel = match($validated['role']) {
            'admin' => 'Administrator',
            'teknisi' => 'Tim IT (Teknisi)',
            default => 'Pegawai Biasa (Pelapor)',
        };

        return redirect()->route('master.petugas.index')
            ->with('success', "Peran untuk {$user->nama} berhasil diubah menjadi {$roleLabel}.");
    }

    /**
     * Mencabut status petugas dan mengembalikan ke Pegawai Biasa (pelapor)
     */
    public function destroy(User $user)
    {
        // Cegah mencabut akun sendiri
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat mencabut peran akun Anda sendiri saat sedang login.');
        }

        $nama = $user->nama;
        $user->update(['role' => 'pelapor']);

        return redirect()->route('master.petugas.index')
            ->with('success', "Status petugas {$nama} telah dicabut dan dikembalikan ke Pegawai Biasa.");
    }
}
