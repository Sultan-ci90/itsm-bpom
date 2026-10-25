<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Surat Permintaan Perbaikan BMN - {{ $ticket->nomor_aduan }}</title>
<style>
    @page { size: A4 portrait; margin: 15mm 20mm; }
    body { font-family: Arial, Helvetica, sans-serif; font-size: 10pt; color: #000; line-height: 1.3; }
    .nomor-formulir { font-size: 7pt; margin-bottom: 14px; }
    .kop { text-align: center; font-weight: bold; line-height: 1.4; margin-bottom: 16px; }
    table.info { width: 100%; border-collapse: collapse; }
    table.info td { padding: 2px 0; vertical-align: top; }
    table.info td.label { width: 130px; }
    table.info td.sep { width: 12px; }
    .judul-box { margin-top: 14px; text-decoration: underline; font-weight: 500; }
    .box { border: 1px solid #000; min-height: 60px; padding: 6px; margin-bottom: 14px; }
    table.ttd { width: 100%; margin-top: 20px; text-align: center; border-collapse: collapse; }
    table.ttd td { width: 33.33%; vertical-align: middle; padding: 0 4px;   height: 72px; text-align: center}
    .ttd-space {margin: 28px 0; font-size: 9pt; text-align: center; vertical-align: middle;}
    .nama { text-decoration: underline; font-weight: bold; }
</style>
</head>
<body>

<div class="nomor-formulir">Nomor Formulir: POM-14.01/CPM.01/SOP.01/IK.17A.01.F.01</div>

<div class="kop">
    Balai Besar Pengawas Obat dan Makanan di Banjarbaru<br>
    Surat Permintaan Perbaikan BMN<br>
    No. {{ $ticket->nomor_aduan }}
</div>

<table class="info">
    <tr>
        <td class="label">Tanggal Permintaan</td>
        <td class="sep">:</td>
        <td>{{ $ticket->tgl_pelaporan ? \Carbon\Carbon::parse($ticket->tgl_pelaporan)->translatedFormat('d F Y') : '-' }}</td>
    </tr>
    <tr>
        <td class="label">Nama Pegawai</td>
        <td class="sep">:</td>
        <td>{{ $ticket->pelapor->nama ?? '-' }}</td>
    </tr>
    <tr>
        <td class="label">Bag / Bid / Lab</td>
        <td class="sep">:</td>
        <td>{{ $ticket->pelapor->bidang->nama_bidang ?? '-' }}</td>
    </tr>
    <tr>
        <td class="label">Jenis Barang</td>
        <td class="sep">:</td>
        <td>{{ $ticket->asset?->jenis_barang ?? ($ticket->jenis_kendala === 'lainnya' ? 'Non-Aset / Lainnya' : '-') }}</td>
    </tr>
    <tr>
        <td class="label">Nama Barang</td>
        <td class="sep">:</td>
        <td><b>{{ $ticket->asset?->nama_barang ?? ($ticket->jenis_kendala === 'lainnya' ? 'Aplikasi / Jaringan / Lainnya' : '-') }}</b></td>
    </tr>
    <tr>
        <td class="label">Lokasi</td>
        <td class="sep">:</td>
        <td>{{ $ticket->asset?->lokasi ?? '-' }}</td>
    </tr>
</table>

<div class="judul-box">Deskripsi Kendala :</div>
<div class="box">{{ $ticket->deskripsi_masalah ?? '-' }}</div>

<div class="judul-box">
    Analisis Pemeriksa : {{ $ticket->resolution?->tgl_analisa ? \Carbon\Carbon::parse($ticket->resolution->tgl_analisa)->translatedFormat('d F Y') : '-' }}
</div>
<div class="box">{{ $ticket->resolution?->analisa_teknis ?? '-' }}</div>

<table class="ttd">
    <tr>
        <td>Mengetahui,<br>Kepala Bagian Tata Usaha</td>
        <td>Pemeriksa</td>
        <td>Yang meminta</td>
    </tr>
    <tr>
        <td class="ttd-space">${ttd_pengirim1}</td>
        <td class="ttd-space">${ttd_pengirim2}</td>
        <td class="ttd-space">${ttd_pengirim3}</td>
    </tr>
    <tr>
        <td><span class="nama">{{ $kabag->nama }}</span><br>{{ $kabag->nip }}</td>
        <td><span class="nama">{{ $pemeriksa->nama ?? '-' }}</span><br>{{ $pemeriksa->nip ?? '-' }}</td>
        <td><span class="nama">{{ $ticket->pelapor->nama ?? '-' }}</span><br>{{ $ticket->pelapor->nip ?? '-' }}</td>
    </tr>
</table>

</body>
</html>
