<?php

namespace App\Exports;

use App\Exports\Sheets\DetailKerusakanSheet;
use App\Exports\Sheets\RingkasanSheet;
use Maatwebsite\Excel\Concerns\Export;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanKerusakanExport implements Export, WithMultipleSheets
{
    use Exportable;
    protected array $ringkasanData;
    protected ?string $startDate;
    protected ?string $endDate;
    protected ?int $assetId;

    public function __construct(array $ringkasanData, ?string $startDate = null, ?string $endDate = null, ?int $assetId = null)
    {
        $this->ringkasanData = $ringkasanData;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->assetId = $assetId;
    }

    public function sheets(): array
    {
        return [
            new RingkasanSheet($this->ringkasanData),
            new DetailKerusakanSheet($this->startDate, $this->endDate, $this->assetId),
        ];
    }
}
