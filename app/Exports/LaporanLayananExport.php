<?php

namespace App\Exports;

use App\Exports\Sheets\DetailLayananSheet;
use App\Exports\Sheets\RingkasanSheet;
use Maatwebsite\Excel\Concerns\Export;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanLayananExport implements Export, WithMultipleSheets
{
    use Exportable;
    protected array $ringkasanData;
    protected string $startDate;
    protected string $endDate;

    public function __construct(array $ringkasanData, string $startDate, string $endDate)
    {
        $this->ringkasanData = $ringkasanData;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function sheets(): array
    {
        return [
            new RingkasanSheet($this->ringkasanData),
            new DetailLayananSheet($this->startDate, $this->endDate),
        ];
    }
}
