<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RingkasanSheet implements FromArray, WithTitle, WithStyles, ShouldAutoSize
{
    protected array $data;
    protected array $styleRanges = [];

    public function __construct(array $summaryData)
    {
        $this->data = $summaryData;
    }

    public function title(): string
    {
        return 'Ringkasan';
    }

    public function array(): array
    {
        $rows = [];

        // 1. Header Judul
        $rows[] = [$this->data['judul'] ?? 'RINGKASAN LAPORAN ITSM'];
        $rows[] = ['Jenis Laporan', $this->data['jenis_label'] ?? '-'];
        $rows[] = ['Periode', $this->data['periode_label'] ?? '-'];
        $rows[] = ['Tanggal Cetak', $this->data['tgl_cetak'] ?? '-'];
        $rows[] = ['Dicetak Oleh', $this->data['dicetak_oleh'] ?? '-'];
        $rows[] = ['Total Laporan', (string) ($this->data['total_laporan'] ?? 0)];
        $rows[] = ['']; // Empty row

        // 2. Rekapitulasi Berdasarkan Status
        $startRowStatus = count($rows) + 1;
        $rows[] = ['REKAPITULASI BERDASARKAN STATUS', ''];
        $rows[] = ['Status', 'Jumlah Laporan'];

        $totalStatus = 0;
        foreach ($this->data['rekap_status'] as $status => $count) {
            $rows[] = [(string) $status, (int) $count];
            $totalStatus += (int) $count;
        }
        $rows[] = ['TOTAL', $totalStatus];
        $endRowStatus = count($rows);

        $this->styleRanges['status'] = [
            'title' => $startRowStatus,
            'header' => $startRowStatus + 1,
            'start' => $startRowStatus + 2,
            'end' => $endRowStatus,
        ];

        $rows[] = ['']; // Empty row

        // 3. Rekapitulasi Berdasarkan Kategori
        $startRowKategori = count($rows) + 1;
        $labelKategori = $this->data['kategori_header'] ?? 'Kategori';
        $rows[] = ["REKAPITULASI BERDASARKAN {$labelKategori}", ''];
        $rows[] = [$labelKategori, 'Jumlah Laporan'];

        $totalKategori = 0;
        foreach ($this->data['rekap_kategori'] as $kategori => $count) {
            $rows[] = [(string) $kategori, (int) $count];
            $totalKategori += (int) $count;
        }
        $rows[] = ['TOTAL', $totalKategori];
        $endRowKategori = count($rows);

        $this->styleRanges['kategori'] = [
            'title' => $startRowKategori,
            'header' => $startRowKategori + 1,
            'start' => $startRowKategori + 2,
            'end' => $endRowKategori,
        ];

        // 4. Rekapitulasi Bulanan (jika ada)
        if (!empty($this->data['rekap_bulanan'])) {
            $rows[] = ['']; // Empty row
            $startRowBulan = count($rows) + 1;
            $rows[] = ['REKAPITULASI LAPORAN PER BULAN', ''];
            $rows[] = ['Bulan / Periode', 'Jumlah Laporan'];

            $totalBulan = 0;
            foreach ($this->data['rekap_bulanan'] as $bln => $count) {
                $rows[] = [(string) $bln, (int) $count];
                $totalBulan += (int) $count;
            }
            $rows[] = ['TOTAL', $totalBulan];
            $endRowBulan = count($rows);

            $this->styleRanges['bulanan'] = [
                'title' => $startRowBulan,
                'header' => $startRowBulan + 1,
                'start' => $startRowBulan + 2,
                'end' => $endRowBulan,
            ];
        }

        return $rows;
    }

    public function styles(Worksheet $sheet): ?array
    {
        // 1. Judul Utama
        $sheet->mergeCells('A1:B1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('FF0F172A'));
        $sheet->getRowDimension(1)->setRowHeight(26);

        // 2. Info Metadata (Baris 2 - 6)
        $sheet->getStyle('A2:A6')->getFont()->setBold(true);
        $sheet->getStyle('B2:B6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // Styling untuk tiap blok tabel
        foreach ($this->styleRanges as $table) {
            $titleRow = $table['title'];
            $headerRow = $table['header'];
            $endRow = $table['end'];

            // Title banner
            $sheet->mergeCells("A{$titleRow}:B{$titleRow}");
            $sheet->getStyle("A{$titleRow}")->getFont()->setBold(true)->setSize(11);

            // Table headers
            $sheet->getStyle("A{$headerRow}:B{$headerRow}")->applyFromArray([
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '1E293B'], // Dark slate
                ],
                'alignment' => ['vertical' => Alignment::VERTICAL_CENTER],
            ]);

            // Table borders and total row
            $sheet->getStyle("A{$headerRow}:B{$endRow}")->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => 'CBD5E1'],
                    ],
                ],
            ]);

            // Total row bold
            $sheet->getStyle("A{$endRow}:B{$endRow}")->applyFromArray([
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'F1F5F9'],
                ],
            ]);

            // Column B numbers align right
            $sheet->getStyle("B{$headerRow}:B{$endRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        }

        return [];
    }
}
