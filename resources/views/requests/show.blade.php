@extends('layouts.app')

@section('content')
@php
    $user     = auth()->user();
    $isStaff  = $user->isTeknisi() || $user->isAdmin();
    $isFinal  = in_array($req->status, ['Selesai', 'Ditolak']);
    $res      = $req->resolution;

    $badge = [
        'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
        'Diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
        'Diajukan' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-800/20 dark:text-yellow-400',
        'Ditolak' => 'bg-red-200 text-red-600 dark:bg-red-800/20 dark:text-red-300',
        'Belum diperiksa' => 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-300',
    ];

    $layananLabel = [
        'lainnya'        => 'Lainnya (Permintaan Layanan Umum)',
        'zoom'           => 'Link Zoom Meeting',
        'reset_password' => 'Reset Password Akun Aplikasi',
        'tambah_akun'    => 'Tambah / Pembuatan Akun Baru',
        'akun'           => 'Reset Password / Akun Aplikasi',
        'peminjaman'     => 'Peminjaman Perangkat IT',
        'konsultasi'     => 'Konsultasi / Asistensi IT',
        'operator'       => 'Operator Kegiatan',
    ];

    $input = 'w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white';
    $label = 'mb-2.5 block text-sm font-medium text-black dark:text-white';

    // Mode proses (dibuka lewat tombol penindakan)
    $isProsesMode = request()->boolean('proses') || request('proses') == '1';

    // Detail resolusi ditampilkan jika ada data resolusi dan (tiket sudah final / dilihat pelapor / sedang mode detail)
    $showResolutionDetail = $res && ($isFinal || !$isStaff || !$isProsesMode);
@endphp

<div class="mx-auto max-w-4xl space-y-6">

    {{-- Header, Breadcrumb & Back Navigation --}}
    <div class="space-y-3">
        {{-- Breadcrumb di Atas --}}
        <nav class="flex items-center text-xs text-gray-500 dark:text-gray-400">
            <ol class="flex flex-wrap items-center gap-1.5">
                <li>
                    <a href="{{ auth()->user()->isPelapor() ? route('home') : route('dashboard') }}" class="inline-flex items-center gap-1 transition hover:text-primary">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li>
                    <a href="{{ route('requests.index') }}" class="transition hover:text-primary">
                        {{ $isStaff ? 'Semua Permintaan Layanan' : 'Permintaan Layanan Saya' }}
                    </a>
                </li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li class="font-medium text-gray-800 dark:text-white/90">
                    {{ $req->nomor_request }}
                </li>
            </ol>
        </nav>

        {{-- Baris Judul & Tombol Kembali di Sebelah Kiri Judul --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('requests.index') }}"
                   title="Kembali ke Daftar Permintaan Layanan"
                   class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-stroke bg-white text-gray-600 shadow-xs transition hover:border-primary hover:bg-gray-50 hover:text-primary dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="h-5 w-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                        Detail Permintaan Layanan
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Nomor: {{ $req->nomor_request }}</p>
                </div>
            </div>

            @if($isStaff && !$isFinal)
                <div class="flex items-center gap-3">
                    @if(!$isProsesMode)
                        <a href="{{ route('requests.show', $req->id) }}?proses=1#proses"
                           class="inline-flex items-center gap-2 rounded-lg bg-green-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-opacity-90">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/><path d="M9 14l2 2 4-4"/>
                            </svg>
                            Tindak Lanjuti / Proses Permintaan
                        </a>
                    @else
                        <a href="{{ route('requests.show', $req->id) }}"
                           class="inline-flex items-center gap-2 rounded-lg border border-stroke px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-meta-4">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                            Sembunyikan Form Penindakan
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            <p class="mb-1 font-medium">Perbaiki kesalahan berikut:</p>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ========================================================= --}}
    {{-- 1. INFORMASI PERMINTAAN (BAGIAN ATAS - READ ONLY)         --}}
    {{-- ========================================================= --}}
    <div class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex items-center justify-between border-b border-stroke px-6.5 py-4 dark:border-gray-800">
            <h3 class="font-medium text-black dark:text-white">Informasi Permintaan</h3>
            <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $badge[$req->status] ?? $badge['Diajukan'] }}">
                {{ $req->status }}
            </span>
        </div>
        <div class="p-6.5">
            <dl class="grid grid-cols-1 gap-4.5 sm:grid-cols-2 text-sm">
                <div>
                    <dt class="mb-1 font-medium text-gray-500 dark:text-gray-400">Nomor Permintaan</dt>
                    <dd class="font-semibold text-black dark:text-white">{{ $req->nomor_request }}</dd>
                </div>
                <div>
                    <dt class="mb-1 font-medium text-gray-500 dark:text-gray-400">Tanggal Pengajuan</dt>
                    <dd class="text-black dark:text-white">{{ $req->tgl_request?->format('d/m/Y') ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="mb-1 font-medium text-gray-500 dark:text-gray-400">Pemohon</dt>
                    <dd class="text-black dark:text-white">{{ $req->user->nama }} (NIP: {{ $req->user->nip }})</dd>
                </div>
                <div>
                    <dt class="mb-1 font-medium text-gray-500 dark:text-gray-400">Bidang Pemohon</dt>
                    <dd class="text-black dark:text-white">{{ $req->user->bidang->nama_bidang ?? 'Umum' }}</dd>
                </div>
                <div>
                    <dt class="mb-1 font-medium text-gray-500 dark:text-gray-400">Lokasi / Ruangan</dt>
                    <dd class="text-black dark:text-white">{{ $req->lokasi }}</dd>
                </div>
                <div>
                    <dt class="mb-1 font-medium text-gray-500 dark:text-gray-400">Jenis Layanan</dt>
                    <dd class="font-medium text-primary">{{ $layananLabel[$req->layanan] ?? ucfirst($req->layanan) }}</dd>
                </div>

                {{-- Penjelasan Kebutuhan / Deskripsi Umum --}}
                @if($req->deskripsi)
                <div class="sm:col-span-2 rounded-lg bg-gray-50 p-4 dark:bg-gray-800/40 border border-gray-100 dark:border-gray-800">
                    <dt class="mb-1 font-semibold text-gray-700 dark:text-gray-300">Penjelasan / Deskripsi Permintaan:</dt>
                    <dd class="whitespace-pre-line text-black dark:text-white">{{ $req->deskripsi }}</dd>
                </div>
                @endif
            </dl>

            {{-- Detail Spesifik: Zoom --}}
            @if($req->layanan === 'zoom' && $req->detailZoom)
                <div class="mt-6 border-t border-stroke pt-5 dark:border-gray-800">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wider text-gray-700 dark:text-gray-300">Rincian Kegiatan Zoom:</h4>
                    <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2 text-sm">
                        <div class="sm:col-span-2">
                            <dt class="text-gray-500 dark:text-gray-400">Nama Acara:</dt>
                            <dd class="font-medium text-black dark:text-white">{{ $req->detailZoom->nama_acara }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Bidang:</dt>
                            <dd class="text-black dark:text-white">{{ $req->detailZoom->bidang->nama_bidang ?? '-' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Jenis Acara:</dt>
                            <dd class="text-black dark:text-white">{{ $req->detailZoom->jenis_acara }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Waktu:</dt>
                            <dd class="text-black dark:text-white">{{ $req->detailZoom->jam_mulai }} - {{ $req->detailZoom->jam_selesai }} WITA</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Bantuan Operator:</dt>
                            <dd class="text-black dark:text-white">{{ $req->detailZoom->butuh_operator }}</dd>
                        </div>
                    </dl>
                </div>
            @endif

            {{-- Detail Spesifik: Akun (Reset Password / Tambah Akun) --}}
            @if(in_array($req->layanan, ['reset_password', 'tambah_akun', 'akun']) && $req->detailAkun)
                <div class="mt-6 border-t border-stroke pt-5 dark:border-gray-800">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                        {{ $req->layanan === 'tambah_akun' ? 'Rincian Penambahan Akun Baru:' : 'Rincian Reset Password Akun:' }}
                    </h4>
                    <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2 text-sm">
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Jenis Pengajuan:</dt>
                            <dd class="font-medium text-black dark:text-white">{{ $req->detailAkun->jenis_pengajuan }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Sistem / Aplikasi Tujuan:</dt>
                            <dd class="font-medium text-black dark:text-white">{{ $req->detailAkun->sistem_tujuan }}</dd>
                        </div>

                    </dl>
                </div>
            @endif

            {{-- Detail Spesifik: Peminjaman --}}
            @if($req->layanan === 'peminjaman' && $req->detailPeminjaman)
                <div class="mt-6 border-t border-stroke pt-5 dark:border-gray-800">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wider text-gray-700 dark:text-gray-300">Rincian Peminjaman:</h4>
                    <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2 text-sm">
                        <div class="sm:col-span-2">
                            <dt class="text-gray-500 dark:text-gray-400">Jenis Perangkat:</dt>
                            <dd class="font-medium text-black dark:text-white">{{ $req->detailPeminjaman->jenis_perangkat }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Tanggal Mulai:</dt>
                            <dd class="text-black dark:text-white">{{ $req->detailPeminjaman->tgl_mulai ? \Carbon\Carbon::parse($req->detailPeminjaman->tgl_mulai)->format('d/m/Y') : '-' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Tanggal Kembali:</dt>
                            <dd class="text-black dark:text-white">{{ $req->detailPeminjaman->tgl_kembali ? \Carbon\Carbon::parse($req->detailPeminjaman->tgl_kembali)->format('d/m/Y') : '-' }}</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-gray-500 dark:text-gray-400">Keperluan:</dt>
                            <dd class="text-black dark:text-white whitespace-pre-line">{{ $req->detailPeminjaman->keperluan }}</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-gray-500 dark:text-gray-400">Lokasi Penggunaan:</dt>
                            <dd class="text-black dark:text-white">{{ $req->detailPeminjaman->lokasi_penggunaan ?? '-' }}</dd>
                        </div>
                    </dl>
                </div>
            @endif
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- 2. DETAIL HASIL TINDAK LANJUT (READ ONLY)                 --}}
    {{-- Tampil jika sudah ada resolusi (untuk pelapor & teknisi)   --}}
    {{-- ========================================================= --}}
    @if($showResolutionDetail)
    <div class="rounded-2xl border border-primary/20 bg-primary/5 p-6.5 shadow-default dark:border-primary/30 dark:bg-primary/10">
        <div class="mb-4 flex items-center justify-between border-b border-primary/20 pb-3 dark:border-primary/30">
            <h3 class="text-lg font-semibold text-black dark:text-white flex items-center gap-2">
                <span>ðŸ“‹ Hasil Tindak Lanjut Tim IT</span>
            </h3>
            <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $badge[$req->status] ?? $badge['Diajukan'] }}">
                Status: {{ $req->status }}
            </span>
        </div>

        <dl class="grid grid-cols-1 gap-4.5 sm:grid-cols-2 text-sm">
            <div>
                <dt class="mb-1 font-medium text-gray-500 dark:text-gray-400">Petugas Penindak Lanjut</dt>
                <dd class="font-semibold text-black dark:text-white">
                    {{ $res->petugas?->nama ?? '-' }} 
                    @if($res->petugas?->nip)
                        <span class="text-xs text-gray-500 dark:text-gray-400">({{ $res->petugas->nip }})</span>
                    @endif
                </dd>
            </div>
            <div>
                <dt class="mb-1 font-medium text-gray-500 dark:text-gray-400">Tanggal Tindak Lanjut</dt>
                <dd class="font-semibold text-black dark:text-white">{{ $res->tgl_tindak_lanjut?->format('d/m/Y') ?? '-' }}</dd>
            </div>

            {{-- Jika Status Ditolak --}}
            @if($req->status === 'Ditolak' && $res->alasan_penolakan)
            <div class="sm:col-span-2 rounded-lg bg-red-50 p-4 border border-red-200 dark:bg-red-900/20 dark:border-red-800/40">
                <dt class="font-semibold text-red-700 dark:text-red-400">Alasan Penolakan:</dt>
                <dd class="mt-1 text-black dark:text-white whitespace-pre-line">{{ $res->alasan_penolakan }}</dd>
            </div>
            @endif

            {{-- Catatan Tindakan Teknisi --}}
            @if($res->tindak_lanjut)
            <div class="sm:col-span-2">
                <dt class="mb-1 font-medium text-gray-500 dark:text-gray-400">Tindakan / Solusi yang Dilakukan:</dt>
                <dd class="rounded-lg bg-white p-4 text-black dark:bg-gray-900 dark:text-white border border-stroke dark:border-gray-800 whitespace-pre-line">{{ $res->tindak_lanjut }}</dd>
            </div>
            @endif

            {{-- OUTPUT LAYANAN AKUN (2 FIELD: PASSWORD BARU & INSTRUKSI LOGIN) --}}
            @if(in_array($req->layanan, ['reset_password', 'tambah_akun', 'akun']) && ($res->akun_password_baru || $res->akun_instruksi_login))
            <div class="sm:col-span-2 rounded-xl border border-blue-200 bg-blue-50/70 p-5 dark:border-blue-900/50 dark:bg-blue-950/20 space-y-3">
                <h4 class="font-semibold text-primary dark:text-blue-400 flex items-center gap-2">
                    <span>ðŸ”‘ Kredensial Akun Baru</span>
                </h4>
                @if($res->akun_password_baru)
                <div>
                    <dt class="text-xs uppercase font-medium text-gray-500 dark:text-gray-400">Password Baru / Sementara:</dt>
                    <dd class="mt-1 inline-block rounded-md bg-white px-3 py-1.5 font-mono text-base font-bold text-primary dark:bg-gray-900 dark:text-blue-300 border border-blue-200 dark:border-blue-900">
                        {{ $res->akun_password_baru }}
                    </dd>
                </div>
                @endif
                @if($res->akun_instruksi_login)
                <div>
                    <dt class="text-xs uppercase font-medium text-gray-500 dark:text-gray-400">Instruksi Login:</dt>
                    <dd class="mt-1 whitespace-pre-line text-sm text-black dark:text-white">
                        {{ $res->akun_instruksi_login }}
                    </dd>
                </div>
                @endif
            </div>
            @endif

            {{-- OUTPUT LAYANAN ZOOM --}}
            @if($req->layanan === 'zoom' && ($res->zoom_link || $res->zoom_meeting_id))
            <div class="sm:col-span-2 rounded-xl border border-green-200 bg-green-50/70 p-5 dark:border-green-900/50 dark:bg-green-950/20 space-y-3">
                <h4 class="font-semibold text-green-700 dark:text-green-400 flex items-center gap-2">
                    <span>ðŸŽ¥ Link & Informasi Zoom Meeting</span>
                </h4>
                @if($res->zoom_link)
                <div>
                    <dt class="text-xs uppercase font-medium text-gray-500 dark:text-gray-400">Link Zoom:</dt>
                    <dd class="mt-1">
                        <a href="{{ $res->zoom_link }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 font-medium text-primary hover:underline break-all">
                            {{ $res->zoom_link }}
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </dd>
                </div>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                    @if($res->zoom_meeting_id)
                    <div>
                        <dt class="text-xs uppercase font-medium text-gray-500 dark:text-gray-400">Meeting ID:</dt>
                        <dd class="mt-0.5 font-mono font-semibold text-black dark:text-white">{{ $res->zoom_meeting_id }}</dd>
                    </div>
                    @endif
                    @if($res->zoom_passcode)
                    <div>
                        <dt class="text-xs uppercase font-medium text-gray-500 dark:text-gray-400">Passcode:</dt>
                        <dd class="mt-0.5 font-mono font-semibold text-black dark:text-white">{{ $res->zoom_passcode }}</dd>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            {{-- OUTPUT LAYANAN PEMINJAMAN --}}
            @if($req->layanan === 'peminjaman' && ($res->pinjam_perangkat_diserahkan || $res->pinjam_catatan_pengembalian))
            <div class="sm:col-span-2 rounded-xl border border-stroke bg-white p-5 dark:border-gray-800 dark:bg-gray-900 space-y-3">
                <h4 class="font-semibold text-black dark:text-white">ðŸ“¦ Catatan Penyerahan & Pengembalian:</h4>
                @if($res->pinjam_perangkat_diserahkan)
                <div>
                    <dt class="text-xs uppercase font-medium text-gray-500 dark:text-gray-400">Perangkat / NUP yang Diserahkan:</dt>
                    <dd class="mt-1 font-medium text-black dark:text-white">{{ $res->pinjam_perangkat_diserahkan }}</dd>
                </div>
                @endif
                @if($res->pinjam_catatan_pengembalian)
                <div>
                    <dt class="text-xs uppercase font-medium text-gray-500 dark:text-gray-400">Catatan Pengembalian:</dt>
                    <dd class="mt-1 whitespace-pre-line text-black dark:text-white">{{ $res->pinjam_catatan_pengembalian }}</dd>
                </div>
                @endif
            </div>
            @endif
        </dl>
    </div>
    @endif

    {{-- ========================================================= --}}
    {{-- KONFIRMASI PENYELESAIAN LAYANAN OLEH PEMOHON              --}}
    {{-- Hanya aktif dan muncul jika status permohonan 'Selesai'   --}}
    {{-- ========================================================= --}}
    @if($req->status === 'Selesai')
    <div class="rounded-2xl border border-stroke bg-white p-6 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3.5">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl {{ $req->konfirmasi_selesai_at ? 'bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400' : 'bg-brand-50 text-brand-600 dark:bg-brand-950/40 dark:text-brand-400' }}">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-black dark:text-white">
                        Konfirmasi Penyelesaian Layanan
                    </h3>
                    @if($req->konfirmasi_selesai_at)
                        <p class="text-xs text-green-700 dark:text-green-400 font-medium mt-0.5">
                            ✓ Layanan telah dikonfirmasi selesai diterima oleh Pemohon pada {{ $req->konfirmasi_selesai_at->translatedFormat('d F Y, H:i') }} WIB.
                        </p>
                    @else
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                            @if(auth()->id() === $req->user_id || auth()->id() === $req->reported_by)
                                Apakah permintaan layanan TI Anda telah diselesaikan dan diterima dengan baik? Silakan tekan tombol konfirmasi selesai di samping.
                            @else
                                Menunggu konfirmasi penerimaan layanan selesai dari pemohon ({{ $req->user?->nama ?? 'Pegawai' }}).
                            @endif
                        </p>
                    @endif
                </div>
            </div>

            <div class="shrink-0">
                @if(auth()->id() === $req->user_id || auth()->id() === $req->reported_by)
                    @if(!$req->konfirmasi_selesai_at)
                        <form action="{{ route('requests.confirmCompleted', $req->id) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin mengonfirmasi bahwa permohonan layanan ini telah selesai diterima dengan baik?')">
                            @csrf
                            <button type="submit"
                                    class="inline-flex items-center gap-2 rounded-xl bg-green-700 px-5 py-2.5 text-sm font-semibold text-white shadow-xs transition hover:bg-green-800 cursor-pointer">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Konfirmasi Selesai
                            </button>
                        </form>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-xl border border-green-200 bg-green-50 px-4 py-2 text-xs font-semibold text-green-700 dark:border-green-800/40 dark:bg-green-900/20 dark:text-green-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Telah Dikonfirmasi
                        </span>
                    @endif
                @else
                    @if($req->konfirmasi_selesai_at)
                        <span class="inline-flex items-center gap-1.5 rounded-xl border border-green-200 bg-green-50 px-4 py-2 text-xs font-semibold text-green-700 dark:border-green-800/40 dark:bg-green-900/20 dark:text-green-400">
                            ✓ Dikonfirmasi Pemohon
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-xl border border-amber-200 bg-amber-50 px-4 py-2 text-xs font-semibold text-amber-700 dark:border-amber-800/40 dark:bg-amber-900/20 dark:text-amber-400">
                            Menunggu Konfirmasi Pemohon
                        </span>
                    @endif
                @endif
            </div>
        </div>
    </div>
    @endif

    {{-- ========================================================================= --}}
    {{-- RUANG DISKUSI & KONFIRMASI TIKET (REALTIME WEBSOCKET CHAT) - DINONAKTIFKAN --}}
    {{-- Kode chat disimpan sebagai arsip/cadangan. Hapus @if(false) jika dibutuhkan lagi. --}}
    {{-- ========================================================================= --}}
    @if(false)
    @if($req->status === 'Selesai')
    <div id="diskusi" 
         x-data="serviceRequestChat({
            requestId: {{ $req->id }},
            currentUserId: {{ auth()->id() }},
            currentUserName: @js(auth()->user()->nama),
            currentUserAvatar: @js(auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : null),
            isStaff: {{ $isStaff ? 'true' : 'false' }},
            isChatActive: {{ $req->isChatActive() ? 'true' : 'false' }},
            isChatClosed: {{ $req->is_chat_closed ? 'true' : 'false' }},
            isExpired: {{ $req->isChatExpired() ? 'true' : 'false' }},
            ticketStatus: @js($req->status),
            completedAt: @js(($req->completed_at ?? ($req->status === 'Selesai' ? now() : null))?->toIso8601String()),
            serverTime: @js(now()->toIso8601String()),
            chatStoreUrl: @js(route('requests.chats.store', $req->id)),
            chatToggleUrl: @js(route('requests.chats.toggle', $req->id)),
            messagesCount: {{ $req->chats->count() }}
         })"
         x-init="initChat()"
         class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-stroke px-6.5 py-4 dark:border-gray-800 gap-3">
            <div>
                <h3 class="text-base font-semibold text-black dark:text-white flex items-center gap-2">
                    <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    Ruang Diskusi & Konfirmasi Tiket
                </h3>
                <p class="text-xs text-gray-500 dark:text-gray-400">Komunikasi langsung secara realtime antara Pelapor dan Tim IT</p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                {{-- Status Sesi Badge --}}
                <template x-if="isChatActive">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800/40">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Sesi Aktif
                        <template x-if="ticketStatus === 'Selesai' && countdownText">
                            <span class="text-[10px] text-emerald-600 dark:text-emerald-400 font-mono" title="Maksimal 2 hari setelah status selesai" x-text="'(' + countdownText + ')'"></span>
                        </template>
                    </span>
                </template>
                <template x-if="!isChatActive && isChatClosed">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-xs font-medium text-red-700 dark:bg-red-950/40 dark:text-red-400 border border-red-200 dark:border-red-800/40">
                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                        Ditutup Operator
                    </span>
                </template>
                <template x-if="!isChatActive && !isChatClosed && isExpired">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-xs font-medium text-amber-700 dark:bg-amber-950/40 dark:text-amber-400 border border-amber-200 dark:border-amber-800/40">
                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                        Kadaluwarsa (2 Hari)
                    </span>
                </template>

                {{-- Counter Badge --}}
                <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                    <span x-text="messagesCount"></span> Pesan
                </span>

                {{-- Operator Control Button (Hanya Teknisi / Admin) --}}
                @if($isStaff)
                    <button type="button"
                            @click="toggleChat()"
                            :disabled="isToggling"
                            class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1 text-xs font-medium transition cursor-pointer"
                            :class="isChatClosed 
                                ? 'bg-emerald-600 text-white hover:bg-emerald-700' 
                                : 'bg-gray-100 text-gray-700 hover:bg-red-50 hover:text-red-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-red-900/30 dark:hover:text-red-400 border border-stroke dark:border-gray-700'">
                        <template x-if="isChatClosed">
                            <span class="flex items-center gap-1">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/></svg>
                                <span x-text="isToggling ? 'Memproses...' : 'Buka Sesi Chat'"></span>
                            </span>
                        </template>
                        <template x-if="!isChatClosed">
                            <span class="flex items-center gap-1">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <span x-text="isToggling ? 'Memproses...' : 'Hentikan Diskusi'"></span>
                            </span>
                        </template>
                    </button>
                @endif
            </div>
        </div>

        <div class="p-6.5">
            {{-- Message Stream Container --}}
            <div class="mb-5 space-y-4 max-h-[420px] overflow-y-auto pr-2" id="chat-messages-container" x-init="$el.scrollTop = $el.scrollHeight">
                @forelse($req->chats as $chat)
                    @if($chat->is_system)
                        {{-- System Event Message --}}
                        <div id="chat-item-{{ $chat->id }}" class="flex justify-center my-3">
                            <div class="inline-flex items-center gap-2 rounded-full border border-yellow-200 bg-yellow-50 px-4 py-1.5 text-xs text-yellow-800 dark:border-yellow-900/40 dark:bg-yellow-900/20 dark:text-yellow-400">
                                <svg class="h-3.5 w-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <span>{{ $chat->pesan }}</span>
                                <span class="text-[10px] text-yellow-600 dark:text-yellow-500">• {{ $chat->created_at->format('H:i') }}</span>
                            </div>
                        </div>
                    @else
                        @php
                            $isMe = (auth()->id() === $chat->user_id);
                            $isStaffChat = $chat->user && ($chat->user->isTeknisi() || $chat->user->isAdmin());
                        @endphp
                        <div id="chat-item-{{ $chat->id }}" class="flex gap-3 {{ $isMe ? 'justify-end' : 'justify-start' }}">
                            {{-- Avatar Left (if other person) --}}
                            @if(!$isMe)
                                <div class="h-8 w-8 shrink-0 rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300 flex items-center justify-center font-bold text-xs uppercase overflow-hidden">
                                    @if($chat->user?->foto_profil)
                                        <img src="{{ asset('storage/' . $chat->user->foto_profil) }}" alt="{{ $chat->user->nama }}" class="h-full w-full object-cover">
                                    @else
                                        {{ substr($chat->user?->nama ?? 'U', 0, 1) }}
                                    @endif
                                </div>
                            @endif

                            <div class="max-w-[85%] sm:max-w-[70%] {{ $isMe ? 'items-end' : 'items-start' }} flex flex-col">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-xs font-semibold text-black dark:text-white">
                                        {{ $isMe ? 'Anda' : ($chat->user?->nama ?? 'Pengguna') }}
                                    </span>
                                    @if($isStaffChat)
                                        <span class="rounded bg-green-100 px-1.5 py-0.5 text-[10px] font-medium text-green-700 dark:bg-green-800/30 dark:text-green-400">Tim IT</span>
                                    @endif
                                    <span class="text-[10px] text-gray-400">
                                        {{ $chat->created_at->format('H:i, d M') }}
                                    </span>
                                </div>
                                <div class="rounded-2xl px-4 py-2.5 text-sm leading-relaxed shadow-xs
                                    {{ $isMe 
                                        ? 'bg-green-700 text-white rounded-tr-none' 
                                        : 'bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-gray-100 rounded-tl-none border border-stroke dark:border-gray-700' }}">
                                    {{ $chat->pesan }}
                                </div>
                            </div>

                            {{-- Avatar Right (if me) --}}
                            @if($isMe)
                                <div class="h-8 w-8 shrink-0 rounded-full bg-green-700 text-white flex items-center justify-center font-bold text-xs uppercase overflow-hidden">
                                    @if(auth()->user()->foto_profil)
                                        <img src="{{ asset('storage/' . auth()->user()->foto_profil) }}" alt="{{ auth()->user()->nama }}" class="h-full w-full object-cover">
                                    @else
                                        {{ substr(auth()->user()->nama, 0, 1) }}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif
                @empty
                    <div id="chat-empty-notice" class="rounded-xl border border-dashed border-gray-200 p-8 text-center dark:border-gray-800">
                        <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-gray-400 dark:bg-gray-800">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <h4 class="text-sm font-medium text-black dark:text-white">Belum Ada Pesan Diskusi</h4>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            Gunakan kolom di bawah jika ada pertanyaan, klarifikasi, atau kendala lanjutan terkait request ini.
                        </p>
                    </div>
                @endforelse
            </div>

            {{-- Form Kirim Pesan (Hanya jika Sesi Aktif) --}}
            <template x-if="isChatActive">
                <form @submit.prevent="sendMessage()" class="border-t border-stroke pt-4 dark:border-gray-800">
                    <div class="flex flex-col sm:flex-row gap-3 items-end">
                        <div class="w-full">
                            <textarea x-model="pesanText"
                                      @keydown.enter.exact.prevent="sendMessage()"
                                      rows="2" 
                                      required 
                                      maxlength="2000"
                                      :disabled="isSubmitting"
                                      :placeholder="placeholderText"
                                      placeholder="Ketik pesan diskusi di sini... (Batas aktif chat: hingga 2 hari setelah status Selesai • Enter untuk kirim)"
                                      class="w-full rounded-xl border border-stroke bg-transparent py-2.5 px-4 text-sm text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white disabled:opacity-60"></textarea>
                        </div>
                        <button type="submit"
                                :disabled="isSubmitting || !pesanText.trim()"
                                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-green-700 px-6 py-2.5 text-sm font-medium text-white transition hover:bg-opacity-90 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                            <span x-text="isSubmitting ? 'Mengirim...' : 'Kirim'"></span>
                            <svg x-show="!isSubmitting" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                    <template x-if="ticketStatus === 'Selesai'">
                        <div class="mt-2 text-xs text-yellow-600 dark:text-yellow-400 flex flex-col sm:flex-row sm:items-center justify-between gap-1.5 bg-yellow-50/60 dark:bg-yellow-950/20 px-3 py-2 rounded-xl border border-yellow-200/50 dark:border-yellow-900/30">
                            <div class="flex items-center gap-1.5">
                                <svg class="h-4 w-4 shrink-0 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Tiket berstatus <strong>Selesai</strong>. Jika Anda mengirim kendala/komplain, silahkan chat jika masih ada kendala.</span>
                            </div>
                            <template x-if="countdownText">
                                <span class="shrink-0 font-mono font-medium text-[11px] text-yellow-700 dark:text-yellow-400 bg-yellow-100 dark:bg-yellow-900/50 px-2 py-0.5 rounded-lg border border-yellow-200 dark:border-yellow-800">
                                    ⏳ Batas aktif: <strong x-text="countdownText"></strong>
                                </span>
                            </template>
                        </div>
                    </template>
                </form>
            </template>

            {{-- Banner Sesi Tidak Aktif / Ditutup --}}
            <template x-if="!isChatActive">
                <div class="border-t border-stroke pt-4 dark:border-gray-800">
                    <div class="rounded-xl border p-4 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-3"
                         :class="isChatClosed 
                            ? 'border-red-200 bg-red-50/70 text-red-900 dark:border-red-900/40 dark:bg-red-950/20 dark:text-red-300' 
                            : 'border-amber-200 bg-amber-50/70 text-amber-900 dark:border-amber-900/40 dark:bg-amber-950/20 dark:text-amber-300'">
                        <div class="flex items-center gap-3">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full"
                                 :class="isChatClosed ? 'bg-red-100 text-red-600 dark:bg-red-900/50' : 'bg-amber-100 text-amber-600 dark:bg-amber-900/50'">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold" x-text="isChatClosed ? 'Sesi Diskusi Telah Ditutup oleh Operator' : 'Sesi Diskusi Telah Berakhir (Kadaluwarsa)'"></h4>
                                <p class="text-xs opacity-80" x-text="isChatClosed ? 'Operator telah mengakhiri sesi diskusi tiket ini. Riwayat percakapan di atas tetap tersimpan sebagai arsip.' : 'Tiket telah selesai lebih dari 2 hari. Sesi diskusi otomatis ditutup.'"></p>
                            </div>
                        </div>
                        @if($isStaff)
                            <button type="button" 
                                    @click="toggleChat()" 
                                    :disabled="isToggling"
                                    class="shrink-0 rounded-lg bg-emerald-600 px-4 py-2 text-xs font-semibold text-white shadow-xs transition hover:bg-emerald-700 cursor-pointer">
                                Buka Sesi Chat
                            </button>
                        @endif
                    </div>
                </div>
            </template>
        </div>
    </div>
    @endif
    @endif

    {{-- ========================================================= --}}
    {{-- 3. FORM TINDAK LANJUT TIM IT (BAGIAN BAWAH)               --}}
    {{-- Hanya tampil untuk Teknisi / Admin                        --}}
    {{-- ========================================================= --}}
    @if($isStaff && !$isFinal && $isProsesMode)
    <div id="proses" class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex items-center justify-between border-b border-stroke px-6.5 py-4 dark:border-gray-800">
            <h3 class="font-medium text-black dark:text-white">
                {{ $res ? 'Perbarui Tindak Lanjut' : 'Form Tindak Lanjut Tim IT' }}
            </h3>
            @if($isFinal)
                <span class="text-xs text-gray-500 dark:text-gray-400">Status saat ini: {{ $req->status }}</span>
            @endif
        </div>

        <div class="p-6.5">
            <form action="{{ route('requests.update', $req->id) }}" method="POST"
                  x-data="{
                      status: @js(old('status', $req->status === 'Diajukan' ? 'Diproses' : $req->status)),
                      layanan: @js($req->layanan)
                  }">
                @csrf
                @method('PUT')

                {{-- Status & Petugas --}}
                <div class="mb-5 grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                    <div>
                        <label class="{{ $label }}">Status Permintaan <span class="text-meta-1">*</span></label>
                        <select name="status" x-model="status" class="{{ $input }}">
                            <option value="Diproses">Diproses</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                        @error('status') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="{{ $label }}">Petugas Penindak Lanjut <span class="text-meta-1">*</span></label>
                        <select name="petugas_id" class="{{ $input }}">
                            @foreach($petugasList as $p)
                                <option value="{{ $p->id }}" @selected(old('petugas_id', $res?->petugas_id ?? $user->id) == $p->id)>
                                    {{ $p->nama }} ({{ $p->nip }})
                                </option>
                            @endforeach
                        </select>
                        @error('petugas_id') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Tanggal Tindak Lanjut --}}
                <div class="mb-5 sm:w-1/2 sm:pr-2.25">
                    <label class="{{ $label }}">Tanggal Tindak Lanjut <span class="text-meta-1">*</span></label>
                    <input type="date" name="tgl_tindak_lanjut" 
                           value="{{ old('tgl_tindak_lanjut', $res?->tgl_tindak_lanjut?->format('Y-m-d') ?? date('Y-m-d')) }}" 
                           class="{{ $input }}">
                    @error('tgl_tindak_lanjut') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                </div>

                {{-- FORM DINAMIS: LAYANAN AKUN (2 FIELD: PASSWORD BARU & INSTRUKSI LOGIN) --}}
                @if(in_array($req->layanan, ['reset_password', 'tambah_akun', 'akun']))
                <div class="mb-5 rounded-xl border border-stroke bg-gray-50/50 p-5 dark:border-gray-800 dark:bg-gray-900/40">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wider text-black dark:text-white flex items-center gap-1.5">
                        <span>ðŸ”‘ Output Akun / Reset Password:</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="{{ $label }}">Password Baru / Sementara</label>
                            <input type="text" name="akun_password_baru" 
                                   value="{{ old('akun_password_baru', $res?->akun_password_baru ?? '') }}" 
                                   placeholder="Contoh: Bpom@2026 (atau biarkan kosong jika dikirim via email)" 
                                   class="{{ $input }}">
                            @error('akun_password_baru') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="{{ $label }}">Instruksi Login</label>
                            <textarea name="akun_instruksi_login" rows="3" 
                                      placeholder="Contoh: Silakan login ke aplikasi Srikandi menggunakan password baru di atas, lalu segera ubah password Anda pada menu Profil." 
                                      class="{{ $input }}">{{ old('akun_instruksi_login', $res?->akun_instruksi_login ?? '') }}</textarea>
                            @error('akun_instruksi_login') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
                @endif

                {{-- FORM DINAMIS: LAYANAN ZOOM --}}
                @if($req->layanan === 'zoom')
                <div class="mb-5 rounded-xl border border-stroke bg-gray-50/50 p-5 dark:border-gray-800 dark:bg-gray-900/40">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wider text-black dark:text-white flex items-center gap-1.5">
                        <span>ðŸŽ¥ Informasi Link Zoom Meeting:</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="{{ $label }}">Link / URL Zoom Meeting</label>
                            <input type="url" name="zoom_link" 
                                   value="{{ old('zoom_link', $res?->zoom_link ?? '') }}" 
                                   placeholder="https://us02web.zoom.us/j/..." 
                                   class="{{ $input }}">
                            @error('zoom_link') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="{{ $label }}">Meeting ID</label>
                                <input type="text" name="zoom_meeting_id" 
                                       inputmode="numeric"
                                       oninput="this.value = this.value.replace(/[^0-9\s-]/g, '')"
                                       value="{{ old('zoom_meeting_id', $res?->zoom_meeting_id ?? '') }}" 
                                       placeholder="Contoh: 812 3456 7890" 
                                       class="{{ $input }}">
                                @error('zoom_meeting_id') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="{{ $label }}">Passcode</label>
                                <input type="text" name="zoom_passcode" 
                                       value="{{ old('zoom_passcode', $res?->zoom_passcode ?? '') }}" 
                                       placeholder="Contoh: bpom2026" 
                                       class="{{ $input }}">
                                @error('zoom_passcode') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- FORM DINAMIS: LAYANAN PEMINJAMAN --}}
                @if($req->layanan === 'peminjaman')
                <div class="mb-5 rounded-xl border border-stroke bg-gray-50/50 p-5 dark:border-gray-800 dark:bg-gray-900/40">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wider text-black dark:text-white">
                        ðŸ“¦ Penyerahan & Pengembalian Perangkat:
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="{{ $label }}">Perangkat / No. NUP yang Diserahkan</label>
                            <input type="text" name="pinjam_perangkat_diserahkan" 
                                   value="{{ old('pinjam_perangkat_diserahkan', $res?->pinjam_perangkat_diserahkan ?? '') }}" 
                                   placeholder="Contoh: Laptop Asus ExpertBook (NUP: 0012) + Charger & Tas" 
                                   class="{{ $input }}">
                            @error('pinjam_perangkat_diserahkan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="{{ $label }}">Catatan Pengembalian (kondisi / kelengkapan)</label>
                            <textarea name="pinjam_catatan_pengembalian" rows="2" 
                                      placeholder="Diisi saat barang dikembalikan pemohon..." 
                                      class="{{ $input }}">{{ old('pinjam_catatan_pengembalian', $res?->pinjam_catatan_pengembalian ?? '') }}</textarea>
                            @error('pinjam_catatan_pengembalian') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
                @endif

                {{-- Tindakan / Solusi Tim IT (Wajib jika tidak ditolak) --}}
                <div class="mb-5" x-show="status !== 'Ditolak'">
                    <label class="{{ $label }}">
                        Tindakan yang Dilakukan / Solusi Tim IT <span class="text-meta-1">*</span>
                    </label>
                    <textarea name="tindak_lanjut" rows="3" 
                              placeholder="Jelaskan tindakan apa yang telah dilakukan tim IT untuk menyelesaikan permintaan ini..." 
                              class="{{ $input }}">{{ old('tindak_lanjut', $res?->tindak_lanjut ?? '') }}</textarea>
                    @error('tindak_lanjut') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                </div>

                {{-- Alasan Penolakan (Wajib jika status = Ditolak) --}}
                <div class="mb-5" x-show="status === 'Ditolak'" x-transition>
                    <label class="{{ $label }}">
                        Alasan Penolakan <span class="text-meta-1">*</span>
                    </label>
                    <textarea name="alasan_penolakan" rows="3" 
                              placeholder="Jelaskan alasan mengapa permintaan ini tidak dapat dipenuhi..." 
                              class="{{ $input }}">{{ old('alasan_penolakan', $res?->alasan_penolakan ?? '') }}</textarea>
                    @error('alasan_penolakan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                </div>

                {{-- Tombol Submit --}}
                <div class="flex justify-end border-t border-stroke pt-5 dark:border-gray-800">
                    <button type="submit" 
                            class="inline-flex items-center justify-center rounded-lg bg-green-700 px-8 py-2.5 text-sm font-medium text-white transition hover:bg-opacity-90">
                        {{ $res ? 'Simpan Perubahan' : 'Simpan Tindak Lanjut' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

</div>
@endsection

@if(false)
{{-- Skrip chat dinonaktifkan sementara. Hapus @if(false) dan @endif jika fitur chat diaktifkan kembali. --}}
@push('scripts')
<script>
function serviceRequestChat(config) {
    return {
        requestId: config.requestId,
        currentUserId: config.currentUserId,
        currentUserName: config.currentUserName,
        currentUserAvatar: config.currentUserAvatar,
        isStaff: config.isStaff,
        isChatActive: config.isChatActive,
        isChatClosed: config.isChatClosed,
        isExpired: config.isExpired,
        ticketStatus: config.ticketStatus,
        completedAt: config.completedAt,
        serverTime: config.serverTime,
        chatStoreUrl: config.chatStoreUrl,
        chatToggleUrl: config.chatToggleUrl,
        pesanText: '',
        isSubmitting: false,
        isToggling: false,
        hasLoadedEcho: false,
        messagesCount: config.messagesCount,
        countdownText: '',
        countdownInterval: null,
        clockOffset: 0,
        placeholderText: config.ticketStatus === 'Selesai' 
            ? 'Ketik pesan/kendala... (Memuat batas waktu aktif... • Enter untuk kirim)' 
            : 'Ketik pesan diskusi di sini... (Batas aktif chat: hingga 2 hari setelah status Selesai • Enter untuk kirim)',

        initChat() {
            if (this.serverTime) {
                this.clockOffset = Date.now() - new Date(this.serverTime).getTime();
            }
            if (this.ticketStatus === 'Selesai' && !this.isExpired) {
                this.startCountdown();
            }
            this.updatePlaceholder();
            this.scrollToBottom();
            this.setupEcho();
        },

        startCountdown() {
            this.updateCountdown();
            if (this.countdownInterval) clearInterval(this.countdownInterval);
            this.countdownInterval = setInterval(() => {
                this.updateCountdown();
            }, 1000);
        },

        stopCountdown() {
            if (this.countdownInterval) {
                clearInterval(this.countdownInterval);
                this.countdownInterval = null;
            }
            this.countdownText = '';
            this.updatePlaceholder();
        },

        updateCountdown() {
            if (this.ticketStatus !== 'Selesai') {
                this.stopCountdown();
                return;
            }

            const completedMs = this.completedAt ? new Date(this.completedAt).getTime() : Date.now();
            const expiryMs = completedMs + (48 * 60 * 60 * 1000); // 2 hari = 48 jam
            const currentMs = Date.now() - this.clockOffset;
            const diffSeconds = Math.floor((expiryMs - currentMs) / 1000);

            if (diffSeconds <= 0) {
                this.countdownText = '00:00:00 (Kadaluwarsa)';
                this.isExpired = true;
                this.isChatActive = false;
                this.stopCountdown();
                return;
            }

            const days = Math.floor(diffSeconds / 86400);
            const hours = Math.floor((diffSeconds % 86400) / 3600);
            const minutes = Math.floor((diffSeconds % 3600) / 60);
            const seconds = diffSeconds % 60;

            const pad = (n) => String(n).padStart(2, '0');

            if (days > 0) {
                this.countdownText = `${days} hari ${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
            } else {
                this.countdownText = `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
            }
            this.updatePlaceholder();
        },

        updatePlaceholder() {
            if (!this.isChatActive) {
                this.placeholderText = this.isChatClosed
                    ? 'Sesi diskusi telah ditutup oleh operator.'
                    : 'Sesi diskusi telah kadaluwarsa (maksimal 2 hari setelah status selesai).';
                return;
            }

            if (this.ticketStatus === 'Selesai') {
                if (this.countdownText) {
                    this.placeholderText = `Ketik pesan/kendala... (Batas aktif chat: ${this.countdownText} • Enter untuk kirim)`;
                } else {
                    this.placeholderText = 'Ketik pesan/kendala... (Batas aktif chat: 2 hari setelah status Selesai • Enter untuk kirim)';
                }
                return;
            }

            this.placeholderText = 'Ketik pesan diskusi di sini... (Batas aktif chat: hingga 2 hari setelah status Selesai • Enter untuk kirim)';
        },

        setupEcho() {
            if (window.Echo && !this.hasLoadedEcho) {
                this.hasLoadedEcho = true;
                window.Echo.private(`service-request.${this.requestId}`)
                    .listen('ServiceRequestChatMessageSent', (e) => {
                        this.appendMessage({
                            id: e.id,
                            user_id: e.user_id,
                            user_nama: e.user_nama,
                            user_avatar: e.user_avatar,
                            is_staff: e.is_staff,
                            is_system: e.is_system,
                            pesan: e.pesan,
                            created_time: e.created_time,
                            created_datetime: e.created_datetime,
                            is_me: (e.user_id === this.currentUserId)
                        });
                        if (e.was_reopened && e.new_ticket_status) {
                            this.ticketStatus = e.new_ticket_status;
                            this.stopCountdown();
                        }
                    })
                    .listen('ServiceRequestChatStatusChanged', (e) => {
                        this.isChatClosed = e.is_chat_closed;
                        this.isChatActive = e.is_chat_active;
                        if (!this.isChatClosed && this.ticketStatus === 'Selesai' && !this.isExpired) {
                            this.startCountdown();
                        }
                    });
            } else if (!window.Echo) {
                setTimeout(() => this.setupEcho(), 500);
            }
        },

        scrollToBottom() {
            this.$nextTick(() => {
                const c = document.getElementById('chat-messages-container');
                if (c) c.scrollTop = c.scrollHeight;
            });
        },

        async sendMessage() {
            const text = this.pesanText.trim();
            if (!text || this.isSubmitting) return;

            this.isSubmitting = true;
            const token = document.querySelector('meta[name=csrf-token]')?.content || '';

            try {
                const res = await fetch(this.chatStoreUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'X-Socket-ID': window.Echo?.socketId() || ''
                    },
                    body: JSON.stringify({ pesan: text })
                });

                const data = await res.json();
                if (data.success && data.chat) {
                    this.pesanText = '';
                    this.appendMessage(data.chat);
                    if (data.sys_chat) {
                        this.appendMessage({
                            ...data.sys_chat,
                            is_system: true
                        });
                    }
                    if (data.was_reopened) {
                        this.ticketStatus = 'Diproses';
                        this.stopCountdown();
                    }
                } else {
                    alert(data.message || 'Gagal mengirim pesan.');
                }
            } catch (err) {
                console.error('Chat error:', err);
                alert('Gagal mengirim pesan. Silakan coba kembali.');
            } finally {
                this.isSubmitting = false;
                this.scrollToBottom();
            }
        },

        async toggleChat() {
            if (this.isToggling) return;
            const actionLabel = this.isChatClosed ? 'membuka kembali' : 'menghentikan/mengunci';
            if (!confirm(`Apakah Anda yakin ingin ${actionLabel} sesi diskusi tiket ini?`)) {
                return;
            }

            this.isToggling = true;
            const token = document.querySelector('meta[name=csrf-token]')?.content || '';

            try {
                const res = await fetch(this.chatToggleUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'X-Socket-ID': window.Echo?.socketId() || ''
                    }
                });

                const data = await res.json();
                if (data.success) {
                    this.isChatClosed = data.is_chat_closed;
                    this.isChatActive = data.is_chat_active;
                    if (data.sys_chat) {
                        this.appendMessage({
                            ...data.sys_chat,
                            is_system: true
                        });
                    }
                    if (!this.isChatClosed && this.ticketStatus === 'Selesai' && !this.isExpired) {
                        this.startCountdown();
                    } else if (this.isChatClosed) {
                        this.stopCountdown();
                    }
                } else {
                    alert(data.message || 'Gagal mengubah status sesi chat.');
                }
            } catch (err) {
                console.error('Toggle chat error:', err);
                alert('Terjadi kesalahan saat mengubah status sesi chat.');
            } finally {
                this.isToggling = false;
            }
        },

        appendMessage(msg) {
            const emptyNotice = document.getElementById('chat-empty-notice');
            if (emptyNotice) emptyNotice.remove();

            const container = document.getElementById('chat-messages-container');
            if (!container) return;

            if (msg.id && document.getElementById('chat-item-' + msg.id)) {
                return;
            }

            this.messagesCount++;
            const wrapper = document.createElement('div');
            wrapper.id = 'chat-item-' + (msg.id || Date.now());

            if (msg.is_system) {
                wrapper.className = 'flex justify-center my-3';
                wrapper.innerHTML = `
                    <div class="inline-flex items-center gap-2 rounded-full border border-yellow-200 bg-yellow-50 px-4 py-1.5 text-xs text-yellow-800 dark:border-yellow-900/40 dark:bg-yellow-900/20 dark:text-yellow-400">
                        <svg class="h-3.5 w-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <span>${this.escapeHtml(msg.pesan)}</span>
                        <span class="text-[10px] text-yellow-600 dark:text-yellow-500">• ${msg.created_time || 'Baru saja'}</span>
                    </div>
                `;
            } else {
                const isMe = (msg.is_me ?? (msg.user_id === this.currentUserId));
                wrapper.className = `flex gap-3 ${isMe ? 'justify-end' : 'justify-start'}`;

                let avatarHtml = '';
                if (msg.user_avatar) {
                    avatarHtml = `<img src="${msg.user_avatar}" alt="${this.escapeHtml(msg.user_nama)}" class="h-full w-full object-cover">`;
                } else {
                    avatarHtml = (msg.user_nama ? msg.user_nama.charAt(0).toUpperCase() : 'U');
                }

                const staffBadge = msg.is_staff 
                    ? `<span class="rounded bg-green-100 px-1.5 py-0.5 text-[10px] font-medium text-green-700 dark:bg-green-800/30 dark:text-green-400">Tim IT</span>` 
                    : '';

                const timeStr = msg.created_datetime || (msg.created_time ? msg.created_time + ', Hari ini' : 'Baru saja');
                const senderLabel = isMe ? 'Anda' : this.escapeHtml(msg.user_nama || 'Pengguna');

                wrapper.innerHTML = `
                    ${!isMe ? `
                        <div class="h-8 w-8 shrink-0 rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300 flex items-center justify-center font-bold text-xs uppercase overflow-hidden">
                            ${avatarHtml}
                        </div>
                    ` : ''}
                    <div class="max-w-[85%] sm:max-w-[70%] ${isMe ? 'items-end' : 'items-start'} flex flex-col">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs font-semibold text-black dark:text-white">${senderLabel}</span>
                            ${staffBadge}
                            <span class="text-[10px] text-gray-400">${timeStr}</span>
                        </div>
                        <div class="rounded-2xl px-4 py-2.5 text-sm leading-relaxed  shadow-xs ${isMe ? 'bg-green-700 text-white rounded-tr-none' : 'bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-gray-100 rounded-tl-none border border-stroke dark:border-gray-700'}">
                            ${this.escapeHtml(msg.pesan)}
                        </div>
                    </div>
                    ${isMe ? `
                        <div class="h-8 w-8 shrink-0 rounded-full bg-green-700 text-white flex items-center justify-center font-bold text-xs uppercase overflow-hidden">
                            ${avatarHtml}
                        </div>
                    ` : ''}
                `;
            }

            container.appendChild(wrapper);
            this.scrollToBottom();
        },

        escapeHtml(str) {
            if (!str) return '';
            const p = document.createElement('p');
            p.textContent = str;
            return p.innerHTML;
        }
    };
}
</script>
@endpush
@endif

