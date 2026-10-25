<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketResolution;
use App\Models\ServiceRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /** Label layanan request (urutan tetap, 0 jika belum ada data). */
    private const LAYANAN_LABELS = [
        'zoom'           => 'Zoom Meeting',
        'reset_password' => 'Reset Password',
        'tambah_akun'    => 'Tambah Akun',
        'akun'           => 'Akun Aplikasi',
        'peminjaman'     => 'Peminjaman Perangkat',
        'konsultasi'     => 'Konsultasi IT',
        'operator'       => 'Operator Kegiatan',
    ];

    /** Urutan tetap supaya warna di chart selalu cocok dengan labelnya. */
    private const JENIS_PENYELESAIAN = ['mandiri', 'Pihak ke-3'];
    private const STATUS_REQUEST     = ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'];

    public function index()
    {
        if (auth()->user()?->isPelapor()) {
            return redirect()->route('home');
        }

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
        // Chart 1: Tren aduan kendala & permintaan layanan 6 bulan terakhir (nama bulan bahasa Indonesia)
        $last6Months    = [];
        $incidentTrend  = [];
        $requestTrend   = [];
        for ($i = 5; $i >= 0; $i--) {
            $date         = Carbon::now()->startOfMonth()->subMonths($i);
            $startOfMonth = $date->copy()->startOfMonth();
            $endOfMonth   = $date->copy()->endOfMonth();

            $last6Months[]   = $date->copy()->locale('id')->translatedFormat('M Y');
            $incidentTrend[] = Ticket::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            $requestTrend[]  = ServiceRequest::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        }

        // Chart 2: Metode penyelesaian — hanya tiket yang belum dihapus (soft delete),
        // urutan label tetap agar warna mandiri/Pihak ke-3 tidak tertukar.
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

        // Chart 5: Jenis Kendala (Aset TIK vs Lainnya)
        $kendalaCounts = Ticket::selectRaw('jenis_kendala, COUNT(*) as total')
            ->groupBy('jenis_kendala')
            ->pluck('total', 'jenis_kendala');

        $jenisKendalaData = [
            'labels' => ['Aset / Barang TIK', 'Lainnya (Non-Aset)'],
            'data'   => [
                (int) ($kendalaCounts['aset'] ?? 0),
                (int) ($kendalaCounts['lainnya'] ?? 0),
            ],
        ];

        // Daftar tahun untuk filter tren (minimal 3 tahun terakhir atau tahun min data)
        $currentYear = (int) Carbon::now()->year;
        $minTicketYear = Ticket::min('created_at') ? (int) Carbon::parse(Ticket::min('created_at'))->year : $currentYear;
        $minRequestYear = ServiceRequest::min('created_at') ? (int) Carbon::parse(ServiceRequest::min('created_at'))->year : $currentYear;
        $minYear = min($minTicketYear, $minRequestYear, $currentYear - 2);
        $availableYears = range($currentYear, $minYear);

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
            'last6Months', 'incidentTrend', 'requestTrend',
            'resolutionData', 'layananData', 'requestStatusData', 'jenisKendalaData',
            'availableYears', 'recentIncidents', 'recentRequests'
        ));
    }

    /**
     * Endpoint API untuk data tren aduan & permintaan (filter 6 bulan / tahunan).
     */
    public function trendData(Request $request)
    {
        $period = $request->input('period', '6months');
        $year = (int) $request->input('year', Carbon::now()->year);

        $categories = [];
        $incidentTrend = [];
        $requestTrend = [];

        if ($period === 'yearly') {
            for ($month = 1; $month <= 12; $month++) {
                $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
                $endOfMonth   = $startOfMonth->copy()->endOfMonth();

                $categories[]    = $startOfMonth->locale('id')->translatedFormat('M');
                $incidentTrend[] = Ticket::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
                $requestTrend[]  = ServiceRequest::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            }
        } else {
            // 6 bulan terakhir dinamis
            for ($i = 5; $i >= 0; $i--) {
                $date         = Carbon::now()->startOfMonth()->subMonths($i);
                $startOfMonth = $date->copy()->startOfMonth();
                $endOfMonth   = $date->copy()->endOfMonth();

                $categories[]    = $date->copy()->locale('id')->translatedFormat('M Y');
                $incidentTrend[] = Ticket::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
                $requestTrend[]  = ServiceRequest::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            }
        }

        return response()->json([
            'categories'    => $categories,
            'incidentTrend' => $incidentTrend,
            'requestTrend'  => $requestTrend,
        ]);
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