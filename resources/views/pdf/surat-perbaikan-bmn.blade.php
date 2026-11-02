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
    table.ttd { width: 100%; margin-top: 20px; text-align: center; border-collapse: collapse;  }
    table.ttd td {  vertical-align: middle; padding: 0 4px;   height: 84px; text-align: left}
    .ttd-space {margin: 28px 0 28px 20px; font-size: 9pt; text-align: left; vertical-align: middle;}
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

<div class="judul-box">
    Tindak Lanjut : {{ $ticket->resolution?->tgl_tindak_lanjut ? \Carbon\Carbon::parse($ticket->resolution->tgl_tindak_lanjut)->translatedFormat('d F Y') : '-' }}
</div>
<div class="box">{{ $ticket->resolution?->tindak_lanjut_teknis ?? '-' }}</div>

<table class="ttd">
    <tr>
        <td width="250px" class="">Mengetahui,<br>Kepala Bagian Tata Usaha</td>
        <td width=""></td> <!-- GAP -->
        <td width="200px" class="text-center">Pemeriksa</td>
        <td width=""></td> <!-- GAP -->
        <td width="">Yang meminta</td>
    </tr>
    <tr>
        <td class="ttd-space">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${ttd_pengirim3}</td>
           <td></td>
        <td class="ttd-space">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${ttd_pengirim2}</td>
           <td></td>
        <td class="ttd-space">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${ttd_pengirim1}</td>
    </tr>
    <tr>
        <td><span class="nama">{{ $kabag->nama }}</span><br>NIP.{{ $kabag->nip }}</td>
           <td></td>
        <td><span class="nama">{{ $pemeriksa->nama ?? '-' }}</span><br>NIP.{{ $pemeriksa->nip ?? '-' }}</td>
           <td></td>
        <td><span class="nama">{{ $ticket->pelapor->nama ?? '-' }}</span><br>NIP.{{ $ticket->pelapor->nip ?? '-' }}</td>
    </tr>
</table>

</body>
</html>
