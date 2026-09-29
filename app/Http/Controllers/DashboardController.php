<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Statistik Ticket
        |--------------------------------------------------------------------------
        | Ambil status yang BENAR-BENAR ada di database.
        */
        $ticketStats = Ticket::query()
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->orderBy('status')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Total Ticket
        |--------------------------------------------------------------------------
        */
        $totalTickets = Ticket::count();

        /*
        |--------------------------------------------------------------------------
        | Data untuk statistic cards
        |--------------------------------------------------------------------------
        | Menggunakan status dari database.
        |
        | Jika status tidak ada, nilainya otomatis 0.
        */
        $statusCounts = $ticketStats->pluck('total', 'status');

        /*
        |--------------------------------------------------------------------------
        | Data Chart
        |--------------------------------------------------------------------------
        | Kita kirim array sederhana ke Blade.
        */
        $chartLabels = $ticketStats
            ->pluck('status')
            ->values();

        $chartData = $ticketStats
            ->pluck('total')
            ->values();

        return view('pages.dashboard.index', compact(
            'user',
            'ticketStats',
            'statusCounts',
            'totalTickets',
            'chartLabels',
            'chartData'
        ));
    }
}