<?php

namespace App\Exports\Sheets;

use App\Models\ServiceRequest;
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
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DetailLayananSheet implements FromQuery, WithTitle, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithFreezePane, WithCustomChunkSize
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
        return ServiceRequest::query()
            ->with(['user.bidang', 'resolution.petugas'])
            ->whereBetween('tgl_request', [$this->startDate, $this->endDate])
            ->orderBy('tgl_request', 'asc')
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
            'Nomor Request',
            'Tanggal Request',
            'Nama Pemohon',
            'Jenis Layanan',
            'Deskripsi / Keperluan',
            'Status',
            'Petugas Penangan',
            'Tgl Tindak Lanjut',
            'Tindak Lanjut / Solusi',
            'Alasan Penolakan',
        ];
    }

    /**
     * @param ServiceRequest $req
     */
    public function map($req): array
    {
        $this->rowNumber++;

        $res = $req->resolution;
        $layananText = match ($req->layanan) {
            'reset_password' => 'Reset Password',
            'tambah_akun'    => 'Tambah Akun',
            'zoom'           => 'Fasilitasi Zoom',
            'peminjaman'     => 'Peminjaman Perangkat',
            'konsultasi'     => 'Konsultasi TI',
            'operator'       => 'Bantuan Operator',
            default          => ucwords(str_replace('_', ' ', $req->layanan ?? '-')),
        };

        return [
            $this->rowNumber,
            $req->nomor_request,
            $req->tgl_request ? Carbon::parse($req->tgl_request)->translatedFormat('d/m/Y') : '-',
            $req->user->nama ?? '-',
            $layananText,
            $req->deskripsi ?? '-',
            $req->status,
            $res?->petugas->nama ?? '-',
            $res?->tgl_tindak_lanjut ? Carbon::parse($res->tgl_tindak_lanjut)->translatedFormat('d/m/Y') : '-',
            $res?->tindak_lanjut ?? '-',
            $res?->alasan_penolakan ?? '-',
        ];
    }

    public function styles(Worksheet $sheet): ?array
    {
        // Style header row (Row 1)
        $sheet->getStyle('A1:K1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '1D4ED8'], // Deep Blue
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
