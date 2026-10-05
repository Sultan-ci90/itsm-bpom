<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketResolution;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. STATISTIK KARTU (Cards) — dengan perbandingan bulan ini vs bulan lalu
        $bulanIni  = Carbon::now()->format('Y-m');
        $bulanLalu = Carbon::now()->subMonth()->format('Y-m');

        $hitungPerBulan = function ($query) use ($bulanIni, $bulanLalu) {
            return [
                'ini'  => (clone $query)->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$bulanIni])->count(),
                'lalu' => (clone $query)->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$bulanLalu])->count(),
            ];
        };

        $persen = function ($ini, $lalu) {
            if ($lalu == 0) return $ini > 0 ? 100 : 0;
            return round((($ini - $lalu) / $lalu) * 100);
        };

        $totalIncident = Ticket::count();
        $totalRequest = ServiceRequest::count();

        $incBulanan = $hitungPerBulan(Ticket::query());
        $reqBulanan = $hitungPerBulan(ServiceRequest::query());

        $statsDelta = [
            'incident' => ['value' => $incBulanan['ini'], 'delta' => $persen($incBulanan['ini'], $incBulanan['lalu'])],
            'request'  => ['value' => $reqBulanan['ini'],  'delta' => $persen($reqBulanan['ini'], $reqBulanan['lalu'])],
        ];

        // Hitung status incident, default 0 jika tidak ada
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
        // Chart 1: Tren Incident 6 Bulan Terakhir
        $last6Months = [];
        $incidentTrend = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $last6Months[] = $date->format('M Y');
            $incidentTrend[] = Ticket::whereMonth('created_at', $date->month)
                                     ->whereYear('created_at', $date->year)
                                     ->count();
        }

        // Chart 2: Penyelesaian Incident (Internal vs Pihak ke-3)
        $resolutionStats = TicketResolution::selectRaw('jenis_penyelesaian, COUNT(*) as total')
            ->groupBy('jenis_penyelesaian')
            ->pluck('total', 'jenis_penyelesaian');
        $resolutionData = [
            'labels' => array_keys($resolutionStats->toArray()),
            'data'   => array_values($resolutionStats->toArray()),
        ];

        // Chart 3: Request Berdasarkan Jenis Layanan
        $requestByLayanan = ServiceRequest::selectRaw('layanan, COUNT(*) as total')
            ->groupBy('layanan')
            ->pluck('total', 'layanan');
        $layananData = [
            'labels' => array_keys($requestByLayanan->toArray()),
            'data'   => array_values($requestByLayanan->toArray()),
        ];

        // Chart 4: Request Berdasarkan Status
        $requestByStatus = ServiceRequest::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');
        $requestStatusData = [
            'labels' => array_keys($requestByStatus->toArray()),
            'data'   => array_values($requestByStatus->toArray()),
        ];

        // 3. DATA TABEL (Hanya 5 Terbaru untuk performa)
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
            'last6Months', 'incidentTrend',
            'resolutionData', 'layananData', 'requestStatusData',
            'recentIncidents', 'recentRequests'
        ));
    }
}