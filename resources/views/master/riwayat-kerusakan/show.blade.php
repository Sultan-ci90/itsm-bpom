@extends('layouts.app')

@section('content')
@php
    $statusBadge = [
        'Belum diperiksa' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-800/20 dark:text-yellow-400',
        'Sedang diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
        'Selesai'         => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
        'Ditolak'         => 'bg-red-100 text-red-700 dark:bg-red-800/20 dark:text-red-400',
    ];

    $kondisiBadge = $asset->status_kondisi === 'Rusak'
        ? 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-300'
        : 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-300';
@endphp

<div class="mx-auto max-w-5xl">
    {{-- Breadcrumb & Header --}}
    <div class="mb-6 space-y-3">
        <nav class="flex items-center text-xs text-gray-500 dark:text-gray-400">
            <ol class="flex flex-wrap items-center gap-1.5">
                <li>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1 transition hover:text-primary">
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
                <li class="text-gray-500 dark:text-gray-400">Master Data</li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li>
                    <a href="{{ route('master.asset_history.index') }}" class="transition hover:text-primary">
                        Riwayat Kerusakan Barang
                    </a>
                </li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li class="font-medium text-gray-800 dark:text-white/90">
                    {{ $asset->kode_barang }} (NUP {{ $asset->nup }})
                </li>
            </ol>
        </nav>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('master.asset_history.index') }}"
                   title="Kembali ke Daftar Riwayat Kerusakan Barang"
                   class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-stroke bg-white text-gray-600 shadow-xs transition hover:border-primary hover:bg-gray-50 hover:text-primary dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="h-5 w-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                        {{ $asset->nama_barang }}
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        Kode BMN: {{ $asset->kode_barang }} • NUP {{ $asset->nup }}
                    </p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2.5 self-start sm:self-auto">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $kondisiBadge }}">
                    Kondisi Saat Ini: {{ $asset->status_kondisi }}
                </span>

                @if($tickets->isNotEmpty())
                    <a href="{{ route('master.asset_history.export', $asset) }}"
                       class="inline-flex items-center gap-1.5 rounded-xl bg-success-600 px-3.5 py-2 text-xs font-semibold text-white shadow-xs transition hover:bg-success-700 dark:bg-success-600 dark:hover:bg-success-700">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Ekspor Excel</span>
                    </a>
                @endif
            </div>
        </div>
    </div>

    @if(session('error'))
        <div class="mb-6 flex items-center gap-2.5 rounded-xl border border-error-200 bg-error-50 p-4 text-sm text-error-600 dark:border-error-800/40 dark:bg-error-950/30 dark:text-error-400">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- Kartu Profil Barang BMN & Ringkasan Statistik --}}
    <div class="mb-6 rounded-2xl border border-stroke bg-white p-6 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="mb-4 flex items-center justify-between border-b border-stroke pb-3 dark:border-gray-800">
            <h3 class="text-base font-semibold text-black dark:text-white">Profil Barang BMN</h3>
            <span class="text-xs text-gray-500 dark:text-gray-400">Satuan: {{ $asset->satuan ?: 'buah' }}</span>
        </div>

        <dl class="grid grid-cols-1 gap-4 text-sm sm:grid-cols-2 lg:grid-cols-3">
            <div>
                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400">Kode Barang / NUP</dt>
                <dd class="mt-0.5 font-semibold text-black dark:text-white">{{ $asset->kode_barang }} / NUP {{ $asset->nup }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400">Merk / Tipe</dt>
                <dd class="mt-0.5 text-black dark:text-white">{{ $asset->merk_type ?: '-' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400">Jenis BMN</dt>
                <dd class="mt-0.5 text-black dark:text-white">{{ $asset->jenis_barang ?: '-' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400">Tanggal Perolehan</dt>
                <dd class="mt-0.5 text-black dark:text-white">{{ $asset->tgl_terima?->format('d/m/Y') ?? '-' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400">Lokasi Ruang</dt>
                <dd class="mt-0.5 text-black dark:text-white">{{ $asset->lokasi ?: '-' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400">Penanggung Jawab</dt>
                <dd class="mt-0.5 text-black dark:text-white">{{ $asset->penanggungJawab?->nama ?? '-' }}</dd>
            </div>
            @if($asset->spesifikasi)
                <div class="sm:col-span-2 lg:col-span-3">
                    <dt class="text-xs font-medium text-gray-500 dark:text-gray-400">Spesifikasi</dt>
                    <dd class="mt-0.5 whitespace-pre-line text-black dark:text-white">{{ $asset->spesifikasi }}</dd>
                </div>
            @endif
        </dl>

        {{-- Ringkasan Angka Kerusakan Aset --}}
        <div class="mt-6 grid grid-cols-2 gap-3 border-t border-stroke pt-5 sm:grid-cols-5 dark:border-gray-800">
            <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-900/60">
                <span class="block text-[11px] font-medium text-gray-500 dark:text-gray-400">Kerusakan Valid</span>
                <span class="mt-1 block text-lg font-bold text-black dark:text-white">{{ $stats['total_kerusakan'] }}x</span>
            </div>
            <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-900/60">
                <span class="block text-[11px] font-medium text-gray-500 dark:text-gray-400">Mandiri</span>
                <span class="mt-1 block text-lg font-bold text-green-600 dark:text-green-400">{{ $stats['mandiri'] }}</span>
            </div>
            <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-900/60">
                <span class="block text-[11px] font-medium text-gray-500 dark:text-gray-400">Pihak ke-3</span>
                <span class="mt-1 block text-lg font-bold text-blue-600 dark:text-blue-400">{{ $stats['pihak_ketiga'] }}</span>
            </div>
            <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-900/60">
                <span class="block text-[11px] font-medium text-gray-500 dark:text-gray-400">Aktif Ditangani</span>
                <span class="mt-1 block text-lg font-bold text-amber-600 dark:text-amber-400">{{ $stats['aktif'] }}</span>
            </div>
            <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-900/60 col-span-2 sm:col-span-1">
                <span class="block text-[11px] font-medium text-gray-500 dark:text-gray-400">Aduan Ditolak</span>
                <span class="mt-1 block text-lg font-bold text-red-600 dark:text-red-400">{{ $stats['ditolak'] }}</span>
            </div>
        </div>
    </div>

    {{-- Timeline Riwayat Kerusakan & Perbaikan --}}
    <div class="rounded-2xl border border-stroke bg-white p-6 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="mb-5 flex flex-col gap-1 border-b border-stroke pb-3 sm:flex-row sm:items-center sm:justify-between dark:border-gray-800">
            <h3 class="text-base font-semibold text-black dark:text-white">
                Timeline Riwayat Kerusakan & Perbaikan
            </h3>
            <span class="text-xs text-gray-500 dark:text-gray-400">
                Menampilkan {{ $tickets->count() }} riwayat aduan tercatat
            </span>
        </div>

        <div class="space-y-6">
            @forelse($tickets as $ticket)
                @php
                    $res = $ticket->resolution;
                    $isRejected = $ticket->status === 'Ditolak';
                    $catatanDitolak = $isRejected
                        ? ($res?->hasil ?? $res?->tindak_lanjut_teknis ?? $res?->analisa_teknis ?? $ticket->histories->first()?->keterangan)
                        : null;
                @endphp
                <div class="relative border-s-2 ps-5 {{ $isRejected ? 'border-red-300 dark:border-red-800/60' : 'border-brand-500/40 dark:border-brand-500/30' }}">
                    <span class="absolute -start-[7px] top-1.5 h-3 w-3 rounded-full border-2 border-white dark:border-gray-900 {{ $isRejected ? 'bg-red-500' : 'bg-brand-500' }}"></span>

                    <div class="rounded-xl border border-stroke bg-gray-50/60 p-4 dark:border-gray-800 dark:bg-white/[0.02]">
                        {{-- Baris Header Tiket --}}
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex flex-wrap items-center gap-2">
                                <a href="{{ route('incidents.show', $ticket) }}"
                                   class="text-sm font-bold text-primary hover:underline dark:text-brand-400">
                                    {{ $ticket->nomor_aduan }}
                                </a>
                                <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $statusBadge[$ticket->status] ?? 'bg-gray-100 text-gray-700' }}">
                                    {{ $ticket->status }}
                                </span>
                                @if($res && !$isRejected)
                                    <span class="inline-flex rounded-full bg-gray-200/80 px-2.5 py-0.5 text-xs font-medium text-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                        {{ $res->jenis_penyelesaian === 'mandiri' ? 'Mandiri' : $res->jenis_penyelesaian }}
                                    </span>
                                @endif
                                @if($isRejected)
                                    <span class="text-xs italic text-red-600 dark:text-red-400">
                                        (Tidak dihitung dalam frekuensi kerusakan)
                                    </span>
                                @endif
                            </div>

                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                {{ \App\Support\WitaTime::format($ticket->created_at) }}
                            </span>
                        </div>

                        {{-- Info Pelapor & Keluhan --}}
                        <div class="mt-3 space-y-2 text-sm">
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                <span class="font-medium text-gray-800 dark:text-gray-200">Pelapor:</span>
                                {{ $ticket->pelapor?->nama ?? '-' }}
                                @if($ticket->pelapor?->bidang)
                                    ({{ $ticket->pelapor->bidang->nama_bidang }})
                                @endif
                            </p>

                            <div>
                                <span class="block text-xs font-medium text-gray-500 dark:text-gray-400">Deskripsi Keluhan</span>
                                <p class="mt-0.5 whitespace-pre-line text-black dark:text-white">{{ $ticket->deskripsi_masalah }}</p>
                            </div>
                        </div>

                        {{-- Rincian Penanganan / Catatan --}}
                        @if($isRejected)
                            @if($catatanDitolak)
                                <div class="mt-3 rounded-lg border border-red-200 bg-red-50/70 p-3 text-xs dark:border-red-900/40 dark:bg-red-950/20">
                                    <span class="block font-semibold text-red-800 dark:text-red-300">Catatan Penolakan / Histori</span>
                                    <p class="mt-1 whitespace-pre-line text-red-700 dark:text-red-200">{{ $catatanDitolak }}</p>
                                </div>
                            @endif
                        @elseif($res)
                            <div class="mt-3 grid grid-cols-1 gap-3 border-t border-stroke pt-3 text-xs sm:grid-cols-2 dark:border-gray-800">
                                <div>
                                    <span class="block font-medium text-gray-500 dark:text-gray-400">Petugas / Pemeriksa (Tim IT)</span>
                                    <span class="mt-0.5 block font-semibold text-black dark:text-white">
                                        {{ $res->pemeriksa ? $res->pemeriksa->nip . ' || ' . $res->pemeriksa->nama : '-' }}
                                    </span>
                                </div>
                                <div>
                                    <span class="block font-medium text-gray-500 dark:text-gray-400">Tanggal Analisa / Tindak Lanjut</span>
                                    <span class="mt-0.5 block text-black dark:text-white">
                                        {{ ($res->tgl_hasil ?? $res->tgl_tindak_lanjut ?? $res->tgl_analisa)?->format('d/m/Y') ?? '-' }}
                                    </span>
                                </div>
                                <div class="sm:col-span-2">
                                    <span class="block font-medium text-gray-500 dark:text-gray-400">Hasil Analisa</span>
                                    <p class="mt-0.5 whitespace-pre-line text-black dark:text-white">{{ $res->analisa_teknis ?: '-' }}</p>
                                </div>
                                <div class="sm:col-span-2">
                                    <span class="block font-medium text-gray-500 dark:text-gray-400">Tindak Lanjut</span>
                                    <p class="mt-0.5 whitespace-pre-line text-black dark:text-white">{{ $res->tindak_lanjut_teknis ?: '-' }}</p>
                                </div>
                                <div class="sm:col-span-2">
                                    <span class="block font-medium text-gray-500 dark:text-gray-400">Solusi / Hasil Akhir</span>
                                    <p class="mt-0.5 whitespace-pre-line text-black dark:text-white">{{ $res->hasil ?: '-' }}</p>
                                </div>
                            </div>
                        @endif

                        {{-- Tautan Detail Aduan & Surat PDF (Pihak ke-3) --}}
                        <div class="mt-3 flex flex-wrap items-center justify-end gap-2 border-t border-stroke pt-3 dark:border-gray-800">
                            @if($res && !$isRejected && $res->jenis_penyelesaian === 'Pihak ke-3')
                                <a href="{{ route('incidents.justifikasi', $ticket) }}" target="_blank"
                                   class="inline-flex items-center gap-1.5 rounded-lg bg-blue-600 px-3 py-1.5 text-xs font-medium text-white transition hover:bg-blue-700">
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    Unduh Surat PDF (Pihak ke-3)
                                </a>
                            @endif

                            <a href="{{ route('incidents.show', $ticket) }}"
                               class="inline-flex items-center gap-1 rounded-lg border border-stroke px-3 py-1.5 text-xs font-medium text-gray-700 transition hover:border-primary hover:text-primary dark:border-gray-700 dark:text-gray-300 dark:hover:text-white">
                                <span>Detail Aduan</span>
                                <svg class="h-3.5 w-3.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-10 text-center text-gray-500 dark:text-gray-400">
                    <p class="text-sm font-medium">Barang ini belum memiliki riwayat aduan kerusakan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
