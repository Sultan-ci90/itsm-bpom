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
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DetailKerusakanSheet implements FromQuery, WithTitle, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithFreezePane, WithCustomChunkSize
{
    protected string $startDate;
    protected string $endDate;
    protected int $rowNumber = 0;

    public function __construct(string $startDate, string $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function title(): string
    {
        return 'Detail';
    }

    public function query(): EloquentBuilder
    {
        return Ticket::query()
            ->with(['asset', 'pelapor.bidang', 'resolution.pemeriksa'])
            ->whereBetween('tgl_pelaporan', [$this->startDate, $this->endDate])
            ->orderBy('tgl_pelaporan', 'asc')
            ->orderBy('id', 'asc');
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
        $isAset = ($ticket->jenis_kendala ?? ($ticket->asset_id ? 'aset' : 'lainnya')) === 'aset';
        $jenisKendalaLabel = $isAset ? 'Aset / Perangkat TIK' : 'Lainnya (Non-Aset)';

        return [
            $this->rowNumber,
            $ticket->nomor_aduan,
            $ticket->tgl_pelaporan ? Carbon::parse($ticket->tgl_pelaporan)->translatedFormat('d/m/Y') : '-',
            $ticket->pelapor->nama ?? '-',
            $jenisKendalaLabel,
            $isAset ? ($ticket->asset?->kode_barang ?? '-') : '-',
            $isAset ? ($ticket->asset?->nama_barang ?? '-') : '-',
            $ticket->deskripsi_masalah ?? '-',
            $ticket->status,
            $res?->tgl_analisa ? Carbon::parse($res->tgl_analisa)->translatedFormat('d/m/Y') : '-',
            $res?->pemeriksa->nama ?? '-',
            $res?->jenis_penyelesaian ?? '-',
            $res?->hasil ?? '-',
        ];
    }

    public function styles(Worksheet $sheet): ?array
    {
        // Style header row (Row 1)
        $sheet->getStyle('A1:M1')->applyFromArray([
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
