<?php

namespace App\Services;

use Carbon\Carbon;
use InvalidArgumentException;

class PeriodeResolver
{
    public string $startDate;
    public string $endDate;
    public string $label;
    public string $fileSlug;
    public bool $hasMonthlyRecap = false;

    /**
     * Resolve incoming request parameters into unified start & end dates.
     *
     * @param array $params
     * @return self
     */
    public static function resolve(array $params): self
    {
        $instance = new self();
        $periode = $params['periode'] ?? null;

        switch ($periode) {
            case 'tanggal':
                $start = Carbon::parse($params['tanggal_awal'])->startOfDay();
                $end = Carbon::parse($params['tanggal_akhir'])->endOfDay();

                $instance->startDate = $start->format('Y-m-d H:i:s');
                $instance->endDate = $end->format('Y-m-d H:i:s');
                $instance->label = $start->translatedFormat('d F Y') . ' s/d ' . $end->translatedFormat('d F Y');
                $instance->fileSlug = $start->format('d_M_Y') . '_sd_' . $end->format('d_M_Y');
                $instance->hasMonthlyRecap = $start->diffInMonths($end) >= 1;
                break;

            case 'bulan':
                $start = Carbon::createFromFormat('Y-m', $params['bulan_awal'])->startOfMonth()->startOfDay();
                $end = Carbon::createFromFormat('Y-m', $params['bulan_akhir'])->endOfMonth()->endOfDay();

                $instance->startDate = $start->format('Y-m-d H:i:s');
                $instance->endDate = $end->format('Y-m-d H:i:s');
                $instance->label = $start->translatedFormat('F Y') . ' s/d ' . $end->translatedFormat('F Y');
                $instance->fileSlug = $start->format('M_Y') . '_sd_' . $end->format('M_Y');
                $instance->hasMonthlyRecap = true;
                break;

            case 'semester':
                $tahun = (int) $params['tahun_semester'];
                $sem = (int) $params['semester'];

                if ($sem === 1) {
                    $start = Carbon::create($tahun, 1, 1)->startOfDay();
                    $end = Carbon::create($tahun, 6, 30)->endOfDay();
                    $instance->label = "Semester 1 Tahun {$tahun} (Jan - Jun)";
                    $instance->fileSlug = "Semester1_{$tahun}";
                } else {
                    $start = Carbon::create($tahun, 7, 1)->startOfDay();
                    $end = Carbon::create($tahun, 12, 31)->endOfDay();
                    $instance->label = "Semester 2 Tahun {$tahun} (Jul - Des)";
                    $instance->fileSlug = "Semester2_{$tahun}";
                }

                $instance->startDate = $start->format('Y-m-d H:i:s');
                $instance->endDate = $end->format('Y-m-d H:i:s');
                $instance->hasMonthlyRecap = true;
                break;

            case 'tahun':
                $tahun = (int) $params['tahun'];
                $start = Carbon::create($tahun, 1, 1)->startOfDay();
                $end = Carbon::create($tahun, 12, 31)->endOfDay();

                $instance->startDate = $start->format('Y-m-d H:i:s');
                $instance->endDate = $end->format('Y-m-d H:i:s');
                $instance->label = "Tahun {$tahun}";
                $instance->fileSlug = (string) $tahun;
                $instance->hasMonthlyRecap = true;
                break;

            case 'dua_tahun':
                $tahunAwal = (int) $params['tahun_awal_2thn'];
                $tahunAkhir = $tahunAwal + 1;

                $start = Carbon::create($tahunAwal, 1, 1)->startOfDay();
                $end = Carbon::create($tahunAkhir, 12, 31)->endOfDay();

                $instance->startDate = $start->format('Y-m-d H:i:s');
                $instance->endDate = $end->format('Y-m-d H:i:s');
                $instance->label = "Periode 2 Tahun ({$tahunAwal} - {$tahunAkhir})";
                $instance->fileSlug = "{$tahunAwal}_{$tahunAkhir}";
                $instance->hasMonthlyRecap = true;
                break;

            default:
                throw new InvalidArgumentException("Periode '{$periode}' tidak valid.");
        }

        return $instance;
    }
}
