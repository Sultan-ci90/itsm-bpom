<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketResolution;
use App\Models\ServiceRequest;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /** Label layanan request (urutan tetap, 0 jika belum ada data). */
    private const LAYANAN_LABELS = [
        'zoom'       => 'Zoom Meeting',
        'akun'       => 'Reset Password',
        'peminjaman' => 'Peminjaman Perangkat',
        'konsultasi' => 'Konsultasi IT',
        'operator'   => 'Operator Kegiatan',
    ];

    /** Urutan tetap supaya warna di chart selalu cocok dengan labelnya. */
    private const JENIS_PENYELESAIAN = ['Internal', 'Pihak ke-3'];
    private const STATUS_REQUEST     = ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'];

    public function index()
    {
        // 1. STATISTIK KARTU
        $totalIncident = Ticket::count();
        $totalRequest  = ServiceRequest::count();

        $statsDelta = [
            'incident' => $this->monthDelta(Ticket::query()),
            'request'  => $this->monthDelta(ServiceRequest::query()),
        ];

        $incidentStatusCounts = Ticket::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $statusIncident = [
            'Belum diperiksa' => $incidentStatusCounts['Belum diperiksa'] ?? 0,
            'Sedang diproses' => $incidentStatusCounts['Sedang diproses'] ?? 0,
            'Selesai'         => $incidentStatusCounts['Selesai'] ?? 0,
            'Ditolak'         => $incidentStatusCounts['Ditolak'] ?? 0,
        ];

        // 2. DATA CHART
        // Chart 1: Tren incident 6 bulan terakhir (nama bulan bahasa Indonesia)
        $last6Months   = [];
        $incidentTrend = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->startOfMonth()->subMonths($i);
            $last6Months[]   = $date->copy()->locale('id')->translatedFormat('M Y');
            $incidentTrend[] = Ticket::whereBetween('created_at', [
                $date->copy()->startOfMonth(),
                $date->copy()->endOfMonth(),
            ])->count();
        }

        // Chart 2: Metode penyelesaian — hanya tiket yang belum dihapus (soft delete),
        // urutan label tetap agar warna Internal/Pihak ke-3 tidak tertukar.
        $resolutionStats = TicketResolution::whereHas('ticket')
            ->selectRaw('jenis_penyelesaian, COUNT(*) as total')
            ->groupBy('jenis_penyelesaian')
            ->pluck('total', 'jenis_penyelesaian');

        $resolutionData = [
            'labels' => self::JENIS_PENYELESAIAN,
            'data'   => array_map(fn ($j) => (int) ($resolutionStats[$j] ?? 0), self::JENIS_PENYELESAIAN),
        ];

        // Chart 3: Request per jenis layanan (label ramah dibaca)
        $requestByLayanan = ServiceRequest::selectRaw('layanan, COUNT(*) as total')
            ->groupBy('layanan')
            ->pluck('total', 'layanan');

        $layananLabels = [];
        $layananValues = [];
        foreach (self::LAYANAN_LABELS as $key => $label) {
            $layananLabels[] = $label;
            $layananValues[] = (int) ($requestByLayanan[$key] ?? 0);
        }
        // Layanan di luar daftar (jika suatu saat ditambah) tetap ikut tampil
        foreach ($requestByLayanan as $key => $total) {
            if (!array_key_exists($key, self::LAYANAN_LABELS)) {
                $layananLabels[] = ucfirst($key);
                $layananValues[] = (int) $total;
            }
        }
        $layananData = ['labels' => $layananLabels, 'data' => $layananValues];

        // Chart 4: Status request — urutan tetap agar warna cocok dengan status
        $requestByStatus = ServiceRequest::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $requestStatusData = [
            'labels' => self::STATUS_REQUEST,
            'data'   => array_map(fn ($s) => (int) ($requestByStatus[$s] ?? 0), self::STATUS_REQUEST),
        ];

        // Kartu "Sudah Selesai": incident + request yang berstatus Selesai
        $selesaiIncident = (int) $statusIncident['Selesai'];
        $selesaiRequest  = (int) ($requestByStatus['Selesai'] ?? 0);
        $totalSelesai    = $selesaiIncident + $selesaiRequest;

        // 3. DATA TABEL (5 terbaru)
        $recentIncidents = Ticket::with(['asset', 'pelapor'])
            ->latest('created_at')
            ->take(5)
            ->get();

        $recentRequests = ServiceRequest::with(['user'])
            ->latest('created_at')
            ->take(5)
            ->get();

        return view('pages.dashboard.index', compact(
            'totalIncident', 'totalRequest', 'statusIncident', 'statsDelta',
            'totalSelesai', 'selesaiIncident', 'selesaiRequest',
            'last6Months', 'incidentTrend',
            'resolutionData', 'layananData', 'requestStatusData',
            'recentIncidents', 'recentRequests'
        ));
    }

    /**
     * Jumlah bulan ini vs PERIODE YANG SAMA bulan lalu.
     * Contoh: hari ini tgl 7 → tgl 1-7 bulan ini dibanding tgl 1-7 bulan lalu.
     * (Dibanding satu bulan penuh, awal bulan hampir selalu tampak turun.)
     */
    private function monthDelta($query): array
    {
        $now = Carbon::now();

        $curStart  = $now->copy()->startOfMonth();
        $curEnd    = $now->copy()->endOfDay();

        $prevStart = $now->copy()->subMonthNoOverflow()->startOfMonth();
        $prevEnd      = $prevStart->copy()->addDays($now->day - 1)->endOfDay();
        $prevMonthEnd = $prevStart->copy()->endOfMonth();
        if ($prevEnd->gt($prevMonthEnd)) {   // mis. hari ini tgl 31, bulan lalu hanya 28/30 hari
            $prevEnd = $prevMonthEnd;
        }

        $current  = (clone $query)->whereBetween('created_at', [$curStart, $curEnd])->count();
        $previous = (clone $query)->whereBetween('created_at', [$prevStart, $prevEnd])->count();

        if ($previous === 0) {
            $delta = $current > 0 ? 100.0 : 0.0;
        } else {
            $delta = round((($current - $previous) / $previous) * 100, 1);
        }

        return ['value' => $current, 'delta' => $delta];
    }
}