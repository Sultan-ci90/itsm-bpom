<?php

namespace App\Exports\Sheets;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithFreezePane;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DetailKerusakanSheet implements FromQuery, WithTitle, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithFreezePane, WithCustomChunkSize
{
    protected ?string $startDate;
    protected ?string $endDate;
    protected ?int $assetId;
    protected int $rowNumber = 0;

    public function __construct(?string $startDate = null, ?string $endDate = null, ?int $assetId = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->assetId = $assetId;
    }

    public function title(): string
    {
        return 'Detail';
    }

    public function query(): EloquentBuilder
    {
        $query = Ticket::query()
            ->with(['asset', 'pelapor.bidang', 'resolution.pemeriksa'])
            ->orderBy('tgl_pelaporan', 'asc')
            ->orderBy('id', 'asc');

        if ($this->startDate !== null && $this->endDate !== null) {
            $query->whereBetween('tgl_pelaporan', [$this->startDate, $this->endDate]);
        }

        if ($this->assetId !== null) {
            $query->where('asset_id', $this->assetId);
        }

        return $query;
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function freezePane(): string
    {
        return 'A2';
    }

    public function headings(): array
    {
        if ($this->assetId !== null) {
            return [
                'No',
                'Nomor Aduan',
                'Tanggal Pelaporan',
                'Nama Pelapor',
                'Kode Barang',
                'Nama Barang',
                'Deskripsi Masalah',
                'Petugas Pemeriksa',
                'Jenis Penyelesaian',
                'Tgl Analisa',
                'Hasil Analisa',
                'Tgl Tindak Lanjut',
                'Hasil Tindak Lanjut',
                'Tanggal Hasil',
                'Hasil',
            ];
        }

        return [
            'No',
            'Nomor Aduan',
            'Tanggal Pelaporan',
            'Nama Pelapor',
            'Jenis Kendala',
            'Kode Barang',
            'Nama Barang',
            'Deskripsi Masalah',
            'Status',
            'Tgl Analisa',
            'Petugas Pemeriksa',
            'Jenis Penyelesaian',
            'Hasil Akhir',
        ];
    }

    /**
     * @param Ticket $ticket
     */
    public function map($ticket): array
    {
        $this->rowNumber++;

        $res = $ticket->resolution;
        $tglPelaporan = $this->formatDate($ticket->tgl_pelaporan);

        if ($this->assetId !== null) {
            return [
                $this->rowNumber,
                $ticket->nomor_aduan,
                $tglPelaporan,
                $ticket->pelapor->nama ?? '-',
                $ticket->asset?->kode_barang ?? '-',
                $ticket->asset?->nama_barang ?? '-',
                $this->formatText($ticket->deskripsi_masalah),
                $res?->pemeriksa->nama ?? '-',
                $this->formatText($res?->jenis_penyelesaian),
                $this->formatDate($res?->tgl_analisa),
                $this->formatText($res?->analisa_teknis),
                $this->formatDate($res?->tgl_tindak_lanjut),
                $this->formatText($res?->tindak_lanjut_teknis),
                $this->formatDate($res?->tgl_hasil),
                $this->formatText($res?->hasil),
            ];
        }

        $isAset = ($ticket->jenis_kendala ?? ($ticket->asset_id ? 'aset' : 'lainnya')) === 'aset';

        return [
            $this->rowNumber,
            $ticket->nomor_aduan,
            $tglPelaporan,
            $ticket->pelapor->nama ?? '-',
            $isAset ? 'Aset / Perangkat TIK' : 'Lainnya (Non-Aset)',
            $isAset ? ($ticket->asset?->kode_barang ?? '-') : '-',
            $isAset ? ($ticket->asset?->nama_barang ?? '-') : '-',
            $this->formatText($ticket->deskripsi_masalah),
            $ticket->status,
            $this->formatDate($res?->tgl_analisa),
            $res?->pemeriksa->nama ?? '-',
            $this->formatText($res?->jenis_penyelesaian),
            $this->formatText($res?->hasil),
        ];
    }

    protected function formatDate($date): string
    {
        return $date ? Carbon::parse($date)->translatedFormat('d/m/Y') : '-';
    }

    protected function formatText(?string $value): string
    {
        return ($value !== null && $value !== '') ? $value : '-';
    }

    public function styles(Worksheet $sheet): ?array
    {
        $lastCol = Coordinate::stringFromColumnIndex(count($this->headings()));

        // Style header row (Row 1)
        $sheet->getStyle("A1:{$lastCol}1")->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '0F766E'], // Deep teal
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
        ]);

        $sheet->getRowDimension(1)->setRowHeight(28);

        return [];
    }
}
