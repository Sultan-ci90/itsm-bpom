<?php

namespace App\Http\Controllers;

use App\Exports\LaporanKerusakanExport;
use App\Exports\LaporanLayananExport;
use App\Http\Requests\GenerateReportRequest;
use App\Models\ServiceRequest;
use App\Models\Ticket;
use App\Services\PeriodeResolver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Tampilkan formulir pemilihan laporan dan periode.
     */
    public function index()
    {
        $currentYear = (int) date('Y');

        // Cari tahun paling awal dari database (Ticket & ServiceRequest)
        $earliestTicketDate = Ticket::min('tgl_pelaporan');
        $earliestReqDate = ServiceRequest::min('tgl_request');

        $years = [$currentYear];
        if ($earliestTicketDate) {
            $years[] = (int) date('Y', strtotime($earliestTicketDate));
        }
        if ($earliestReqDate) {
            $years[] = (int) date('Y', strtotime($earliestReqDate));
        }

        $minYear = min($years);
        // Jika data baru atau tahun min = tahun sekarang, sediakan minimal mundur 2 tahun
        if ($minYear > $currentYear - 2) {
            $minYear = $currentYear - 2;
        }

        // Urutkan tahun dari sekarang turun ke tahun paling awal
        $availableYears = range($currentYear, $minYear);

        return view('reports.index', compact('availableYears', 'currentYear'));
    }

    /**
     * Proses generate dan download file Excel laporan.
     */
    public function export(GenerateReportRequest $request)
    {
        $validated = $request->validated();
        $jenis = $validated['jenis'];

        // 1. Resolve periode menjadi start_date dan end_date
        $resolver = PeriodeResolver::resolve($validated);

        // 2. Cek apakah ada data pada rentang waktu yang dipilih
        if ($jenis === 'kerusakan') {
            $count = Ticket::whereBetween('tgl_pelaporan', [$resolver->startDate, $resolver->endDate])->count();
            if ($count === 0) {
                return back()->withInput()->with('error', 'Tidak ada data pada periode ini.');
            }

            $summaryData = $this->buildKerusakanSummary($resolver, $count);
            $fileName = "Laporan_Kerusakan_{$resolver->fileSlug}.xlsx";

            return Excel::download(
                new LaporanKerusakanExport($summaryData, $resolver->startDate, $resolver->endDate),
                $fileName
            );
        } else {
            $count = ServiceRequest::whereBetween('tgl_request', [$resolver->startDate, $resolver->endDate])->count();
            if ($count === 0) {
                return back()->withInput()->with('error', 'Tidak ada data pada periode ini.');
            }

            $summaryData = $this->buildLayananSummary($resolver, $count);
            $fileName = "Laporan_Layanan_{$resolver->fileSlug}.xlsx";

            return Excel::download(
                new LaporanLayananExport($summaryData, $resolver->startDate, $resolver->endDate),
                $fileName
            );
        }
    }

    /**
     * Susun data rekapitulasi untuk Laporan Kerusakan.
     */
    protected function buildKerusakanSummary(PeriodeResolver $resolver, int $total): array
    {
        // Rekap Status
        $defaultStatuses = [
            'Belum diperiksa' => 0,
            'Sedang diproses' => 0,
            'Selesai'         => 0,
            'Ditolak'         => 0,
        ];
        $statusCounts = Ticket::whereBetween('tgl_pelaporan', [$resolver->startDate, $resolver->endDate])
            ->selectRaw('status, count(*) as aggregate')
            ->groupBy('status')
            ->pluck('aggregate', 'status')
            ->toArray();
        $rekapStatus = array_merge($defaultStatuses, $statusCounts);

        // Rekap Kategori (Jenis Kendala)
        $rawKendala = Ticket::whereBetween('tgl_pelaporan', [$resolver->startDate, $resolver->endDate])
            ->selectRaw("COALESCE(jenis_kendala, 'lainnya') as jenis, count(*) as aggregate")
            ->groupBy('jenis')
            ->pluck('aggregate', 'jenis')
            ->toArray();

        $rekapKategori = [
            'Aset / Perangkat TIK' => (int) ($rawKendala['aset'] ?? 0),
            'Lainnya (Non-Aset)'   => (int) ($rawKendala['lainnya'] ?? 0),
        ];

        // Rekap Bulanan (jika periode lebih dari 1 bulan)
        $rekapBulanan = [];
        if ($resolver->hasMonthlyRecap) {
            $monthlyData = Ticket::whereBetween('tgl_pelaporan', [$resolver->startDate, $resolver->endDate])
                ->selectRaw("DATE_FORMAT(tgl_pelaporan, '%Y-%m') as ym, count(*) as aggregate")
                ->groupBy('ym')
                ->orderBy('ym')
                ->pluck('aggregate', 'ym')
                ->toArray();

            // Susun label bulan yang rapi
            foreach ($monthlyData as $ym => $val) {
                $monthLabel = Carbon::createFromFormat('Y-m', $ym)->translatedFormat('F Y');
                $rekapBulanan[$monthLabel] = $val;
            }
        }

        $user = auth()->user();

        return [
            'judul'           => 'LAPORAN ADUAN KENDALA TI & KERUSAKAN ASET (ITSM BPOM)',
            'jenis_label'     => 'Aduan Kendala TI & Kerusakan Aset',
            'periode_label'   => $resolver->label,
            'tgl_cetak'       => Carbon::now()->translatedFormat('d F Y H:i:s'),
            'dicetak_oleh'    => ($user->nama ?? 'Sistem') . ' (NIP: ' . ($user->nip ?? '-') . ')',
            'total_laporan'   => $total,
            'kategori_header' => 'Jenis Kendala',
            'rekap_status'    => $rekapStatus,
            'rekap_kategori'  => $rekapKategori,
            'rekap_bulanan'   => $rekapBulanan,
        ];
    }

    /**
     * Susun data rekapitulasi untuk Laporan Layanan TI.
     */
    protected function buildLayananSummary(PeriodeResolver $resolver, int $total): array
    {
        // Rekap Status
        $defaultStatuses = [
            'Diajukan' => 0,
            'Diproses' => 0,
            'Selesai'  => 0,
            'Ditolak'  => 0,
        ];
        $statusCounts = ServiceRequest::whereBetween('tgl_request', [$resolver->startDate, $resolver->endDate])
            ->selectRaw('status, count(*) as aggregate')
            ->groupBy('status')
            ->pluck('aggregate', 'status')
            ->toArray();
        $rekapStatus = array_merge($defaultStatuses, $statusCounts);

        // Rekap Kategori (Jenis Layanan)
        $rawKategori = ServiceRequest::whereBetween('tgl_request', [$resolver->startDate, $resolver->endDate])
            ->selectRaw('layanan, count(*) as aggregate')
            ->groupBy('layanan')
            ->orderByDesc('aggregate')
            ->pluck('aggregate', 'layanan')
            ->toArray();

        $rekapKategori = [];
        foreach ($rawKategori as $key => $count) {
            $formattedKey = match ($key) {
                'reset_password' => 'Reset Password',
                'tambah_akun'    => 'Tambah Akun',
                'zoom'           => 'Fasilitasi Zoom',
                'peminjaman'     => 'Peminjaman Perangkat',
                'konsultasi'     => 'Konsultasi TI',
                'operator'       => 'Bantuan Operator',
                default          => ucwords(str_replace('_', ' ', $key ?? 'Lainnya')),
            };
            $rekapKategori[$formattedKey] = $count;
        }

        // Rekap Bulanan
        $rekapBulanan = [];
        if ($resolver->hasMonthlyRecap) {
            $monthlyData = ServiceRequest::whereBetween('tgl_request', [$resolver->startDate, $resolver->endDate])
                ->selectRaw("DATE_FORMAT(tgl_request, '%Y-%m') as ym, count(*) as aggregate")
                ->groupBy('ym')
                ->orderBy('ym')
                ->pluck('aggregate', 'ym')
                ->toArray();

            foreach ($monthlyData as $ym => $val) {
                $monthLabel = Carbon::createFromFormat('Y-m', $ym)->translatedFormat('F Y');
                $rekapBulanan[$monthLabel] = $val;
            }
        }

        $user = auth()->user();

        return [
            'judul'           => 'LAPORAN PERMOHONAN LAYANAN TI (ITSM BPOM)',
            'jenis_label'     => 'Service Request / Permohonan Layanan TI',
            'periode_label'   => $resolver->label,
            'tgl_cetak'       => Carbon::now()->translatedFormat('d F Y H:i:s'),
            'dicetak_oleh'    => ($user->nama ?? 'Sistem') . ' (NIP: ' . ($user->nip ?? '-') . ')',
            'total_laporan'   => $total,
            'kategori_header' => 'Jenis Layanan TI',
            'rekap_status'    => $rekapStatus,
            'rekap_kategori'  => $rekapKategori,
            'rekap_bulanan'   => $rekapBulanan,
        ];
    }
}
