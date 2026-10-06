{{-- Halaman cetak Surat Justifikasi (standalone, tanpa layout).
     CATATAN: sesuaikan redaksi/kop dengan template resmi BPOM sebelum dipakai. --}}
@php
    $res = $ticket->resolution;
    $tanggal = \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Justifikasi {{ $ticket->nomor_aduan }}</title>
    <style>
        body { font-family: "Times New Roman", serif; font-size: 12pt; color: #000; margin: 0; background: #f3f4f6; }
        .toolbar { padding: 12px; text-align: center; background: #fff; border-bottom: 1px solid #ddd; }
        .toolbar button { padding: 8px 20px; font-size: 14px; cursor: pointer; border: 0; border-radius: 6px; background: #3C50E0; color: #fff; }
        .page { width: 210mm; min-height: 297mm; margin: 16px auto; padding: 20mm; background: #fff; box-sizing: border-box; }
        h1 { font-size: 14pt; text-align: center; margin: 0; text-transform: uppercase; }
        h2 { font-size: 13pt; text-align: center; margin: 4px 0 0; text-decoration: underline; }
        .nomor { text-align: center; margin: 4px 0 20px; }
        table.data { width: 100%; border-collapse: collapse; margin: 12px 0; }
        table.data td { padding: 3px 4px; vertical-align: top; }
        table.data td:first-child { width: 38%; }
        table.data td:nth-child(2) { width: 3%; }
        p { text-align: justify; line-height: 1.5; margin: 8px 0; }
        .ttd { width: 100%; margin-top: 36px; }
        .ttd td { width: 50%; text-align: center; vertical-align: top; }
        .space { height: 70px; }
        @media print {
            body { background: #fff; }
            .toolbar { display: none; }
            .page { margin: 0; padding: 15mm 20mm; width: auto; min-height: auto; }
        }
    </style>
</head>
<body>
    <div class="toolbar">
        <button onclick="window.print()">Cetak / Simpan PDF</button>
    </div>

    <div class="page">
        <h1>Badan Pengawas Obat dan Makanan</h1>
        <hr>
        <h2>Surat Justifikasi Perbaikan oleh Pihak Ketiga</h2>
        <div class="nomor">Nomor Aduan: {{ $ticket->nomor_aduan }}</div>

        <p>Yang bertanda tangan di bawah ini menyatakan bahwa perangkat berikut tidak dapat diperbaiki secara internal oleh tim IT dan memerlukan perbaikan oleh pihak ketiga:</p>

        <table class="data">
            <tr><td>Nama Perangkat</td><td>:</td><td>{{ $ticket->asset->nama_barang ?? '-' }}</td></tr>
            <tr><td>Kode Barang / NUP</td><td>:</td><td>{{ $ticket->asset->kode_barang ?? '-' }} / {{ $ticket->asset->nup ?? '-' }}</td></tr>
            <tr><td>Lokasi</td><td>:</td><td>{{ $ticket->asset->lokasi ?? '-' }}</td></tr>
            <tr><td>Penanggung Jawab</td><td>:</td><td>{{ $ticket->asset->penanggungJawab->nama ?? '-' }}</td></tr>
            <tr><td>Pelapor</td><td>:</td><td>{{ $ticket->pelapor->nama ?? '-' }} ({{ $ticket->pelapor->bidang->nama_bidang ?? '-' }})</td></tr>
            <tr><td>Tanggal Pelaporan</td><td>:</td><td>{{ $ticket->tgl_pelaporan->format('d/m/Y') }}</td></tr>
            <tr><td>Deskripsi Masalah</td><td>:</td><td>{{ $ticket->deskripsi_masalah }}</td></tr>
            <tr><td>Hasil Analisa Tim Teknis</td><td>:</td><td>{{ $res->analisa_teknis ?: '-' }}</td></tr>
            <tr><td>Tindak Lanjut</td><td>:</td><td>{{ $res->tindak_lanjut_teknis ?: '-' }}</td></tr>
            <tr><td>Vendor / Pihak Ketiga</td><td>:</td><td>{{ $res->vendor ?: '-' }}</td></tr>
            <tr><td>Estimasi Biaya</td><td>:</td><td>{{ !is_null($res->estimasi_biaya) ? 'Rp ' . number_format($res->estimasi_biaya, 0, ',', '.') : '-' }}</td></tr>
        </table>

        <p>Demikian surat justifikasi ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>

        <p style="text-align:right;">Banjarmasin, {{ $tanggal }}</p>

        <table class="ttd">
            <tr>
                <td>
                    Pemeriksa / Teknisi
                    <div class="space"></div>
                    <strong><u>{{ $res->pemeriksa->nama ?? '........................' }}</u></strong><br>
                    NIP. {{ $res->pemeriksa->nip ?? '........................' }}
                </td>
                <td>
                    Mengetahui,<br>Kasubbag Tata Usaha
                    <div class="space"></div>
                    <strong><u>........................</u></strong><br>
                    NIP. ........................
                </td>
            </tr>
        </table>
    </div>
</body>
</html>