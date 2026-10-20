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
            case 'triwulan':
                $tahun = (int) $params['tahun_triwulan'];
                $triwulan = (int) $params['triwulan'];

                switch ($triwulan) {
                    case 1:
                        $start = Carbon::create($tahun, 1, 1)->startOfDay();
                        $end = Carbon::create($tahun, 3, 31)->endOfDay();
                        $instance->label = "Triwulan 1 Tahun {$tahun} (Januari - Maret)";
                        $instance->fileSlug = "Triwulan1_{$tahun}";
                        break;
                    case 2:
                        $start = Carbon::create($tahun, 4, 1)->startOfDay();
                        $end = Carbon::create($tahun, 6, 30)->endOfDay();
                        $instance->label = "Triwulan 2 Tahun {$tahun} (April - Juni)";
                        $instance->fileSlug = "Triwulan2_{$tahun}";
                        break;
                    case 3:
                        $start = Carbon::create($tahun, 7, 1)->startOfDay();
                        $end = Carbon::create($tahun, 9, 30)->endOfDay();
                        $instance->label = "Triwulan 3 Tahun {$tahun} (Juli - September)";
                        $instance->fileSlug = "Triwulan3_{$tahun}";
                        break;
                    case 4:
                    default:
                        $start = Carbon::create($tahun, 10, 1)->startOfDay();
                        $end = Carbon::create($tahun, 12, 31)->endOfDay();
                        $instance->label = "Triwulan 4 Tahun {$tahun} (Oktober - Desember)";
                        $instance->fileSlug = "Triwulan4_{$tahun}";
                        break;
                }

                $instance->startDate = $start->format('Y-m-d H:i:s');
                $instance->endDate = $end->format('Y-m-d H:i:s');
                $instance->hasMonthlyRecap = true;
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

            default:
                throw new InvalidArgumentException("Periode '{$periode}' tidak valid.");
        }

        return $instance;
    }
}
