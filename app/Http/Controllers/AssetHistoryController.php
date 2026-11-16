<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetHistoryController extends Controller
{
    /**
     * Menampilkan ringkasan riwayat kerusakan dan perbaikan per unit barang BMN.
     */
    public function index(Request $request)
    {
        $cakupan = (string) $request->input('cakupan', '');
        if (!in_array($cakupan, ['', 'sering_rusak', 'semua'], true)) {
            $cakupan = '';
        }

        $kondisi = (string) $request->input('kondisi', '');
        if (!in_array($kondisi, ['', 'Baik', 'Rusak', 'Rusak Berat'], true)) {
            $kondisi = '';
        }

        $sort = (string) $request->input('sort', '');
        if (!in_array($sort, ['', 'terbaru', 'nama'], true)) {
            $sort = '';
        }

        $search = trim((string) $request->input('search', ''));

        // KPI Summary Cards dihitung secara global sebelum filter/pagination
        $totalAset = Asset::count();
        $totalPernahRusak = Asset::whereHas('tickets', fn ($q) => $q->where('status', '!=', 'Ditolak'))->count();
        $totalSedangDitangani = Asset::whereHas('tickets', fn ($q) => $q->whereIn('status', ['Belum diperiksa', 'Sedang diproses']))->count();
        $totalSeringRusak = Asset::whereHas('tickets', fn ($q) => $q->where('status', '!=', 'Ditolak'), '>=', 2)->count();

        $query = Asset::query()
            ->withCount([
                'tickets as total_kerusakan_count' => fn ($q) => $q->where('status', '!=', 'Ditolak'),
                'tickets as active_kerusakan_count' => fn ($q) => $q->whereIn('status', ['Belum diperiksa', 'Sedang diproses']),
                'tickets as mandiri_count' => fn ($q) => $q->where('status', '!=', 'Ditolak')
                    ->whereHas('resolution', fn ($r) => $r->where('jenis_penyelesaian', 'mandiri')),
                'tickets as pihak_ketiga_count' => fn ($q) => $q->where('status', '!=', 'Ditolak')
                    ->whereHas('resolution', fn ($r) => $r->where('jenis_penyelesaian', 'Pihak ke-3')),
            ])
            ->withMax([
                'tickets as terakhir_rusak_at' => fn ($q) => $q->where('status', '!=', 'Ditolak'),
            ], 'created_at');

        if ($cakupan === 'sering_rusak') {
            $query->whereHas('tickets', fn ($q) => $q->where('status', '!=', 'Ditolak'), '>=', 2);
        } elseif ($cakupan === '') {
            $query->whereHas('tickets', fn ($q) => $q->where('status', '!=', 'Ditolak'));
        }

        if ($kondisi === 'Rusak') {
            $query->where(function ($q) {
                $q->where('status_kondisi', 'Rusak')
                    ->orWhere('status_kondisi', 'like', 'Rusak%');
            });
        } elseif ($kondisi !== '') {
            $query->where('status_kondisi', $kondisi);
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('kode_barang', 'like', "%{$search}%")
                    ->orWhere('nup', 'like', "%{$search}%")
                    ->orWhere('nama_barang', 'like', "%{$search}%")
                    ->orWhere('merk_type', 'like', "%{$search}%")
                    ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        if ($sort === 'terbaru') {
            $query->orderByDesc('terakhir_rusak_at')
                ->orderByDesc('total_kerusakan_count')
                ->orderBy('nama_barang');
        } elseif ($sort === 'nama') {
            $query->orderBy('nama_barang')->orderBy('nup');
        } else {
            $query->orderByDesc('total_kerusakan_count')
                ->orderByDesc('terakhir_rusak_at')
                ->orderBy('nama_barang');
        }

        $assets = $query->paginate(15)->withQueryString();

        return view('master.riwayat-kerusakan.index', compact(
            'assets',
            'cakupan',
            'kondisi',
            'sort',
            'search',
            'totalAset',
            'totalPernahRusak',
            'totalSedangDitangani',
            'totalSeringRusak'
        ));
    }

    /**
     * Menampilkan profil barang BMN dan timeline kronologis riwayat kerusakan & perbaikan.
     */
    public function show(Asset $asset)
    {
        $asset->load('penanggungJawab');

        $tickets = $asset->tickets()
            ->with([
                'pelapor.bidang',
                'reportedBy',
                'resolution.pemeriksa',
                'histories' => fn ($q) => $q->latest('created_at')->orderByDesc('id'),
            ])
            ->latest('created_at')
            ->orderByDesc('id')
            ->get();

        $validTickets = $tickets->where('status', '!=', 'Ditolak');

        $stats = [
            'total_kerusakan' => $validTickets->count(),
            'mandiri' => $validTickets->filter(fn ($t) => $t->resolution?->jenis_penyelesaian === 'mandiri')->count(),
            'pihak_ketiga' => $validTickets->filter(fn ($t) => $t->resolution?->jenis_penyelesaian === 'Pihak ke-3')->count(),
            'aktif' => $tickets->whereIn('status', ['Belum diperiksa', 'Sedang diproses'])->count(),
            'ditolak' => $tickets->where('status', 'Ditolak')->count(),
        ];

        return view('master.riwayat-kerusakan.show', compact('asset', 'tickets', 'stats'));
    }
}
