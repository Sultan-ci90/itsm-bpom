<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    /**
     * Cari pegawai berdasarkan nama atau NIP untuk searchable dropdown.
     */
    public function search(Request $request): JsonResponse
    {
        $keyword = trim($request->input('q', ''));

        $query = User::with('bidang')
            ->select('id', 'nama', 'nip', 'bidang_id', 'role');

        if ($keyword !== '') {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('nip', 'like', "%{$keyword}%");
            });
        }

        $users = $query->orderBy('nama', 'asc')
            ->limit(20)
            ->get()
            ->map(function ($user) {
                $bidangName = $user->bidang->nama_bidang ?? 'Umum';
                return [
                    'id' => $user->id,
                    'nama' => $user->nama,
                    'nip' => $user->nip,
                    'bidang_id' => $user->bidang_id,
                    'bidang_nama' => $bidangName,
                    'role' => $user->role,
                    'label' => "{$user->nama} ({$user->nip} - {$bidangName})",
                ];
            });

        return response()->json($users);
    }
}
