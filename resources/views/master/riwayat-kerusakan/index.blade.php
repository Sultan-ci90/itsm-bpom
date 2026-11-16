@extends('layouts.app')

@section('content')
@php
    $cakupanLabels = [
        '' => 'Pernah Rusak (≥ 1x)',
        'sering_rusak' => 'Sering Rusak (≥ 2x)',
        'semua' => 'Semua Barang Master',
    ];
@endphp

<div>
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
                <li class="font-medium text-gray-800 dark:text-white/90">Riwayat Kerusakan Barang</li>
            </ol>
        </nav>

        <div>
            <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                Riwayat Kerusakan Barang
            </h2>
            <p class="text-xs text-gray-500 dark:text-gray-400">
                Pantau frekuensi kerusakan dan rekam jejak perbaikan per unit barang BMN (tiket berstatus Ditolak tidak dihitung dalam frekuensi kerusakan)
            </p>
        </div>
    </div>

    {{-- 4 Kartu Statistik Ringkas (KPI Global) --}}
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl border border-stroke bg-white p-5 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Aset BMN</span>
                    <h4 class="mt-1 text-2xl font-bold text-black dark:text-white">{{ number_format($totalAset) }}</h4>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Seluruh unit barang pada master data</p>
        </div>

        <div class="rounded-2xl border border-stroke bg-white p-5 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Pernah Rusak (≥ 1x)</span>
                    <h4 class="mt-1 text-2xl font-bold text-black dark:text-white">{{ number_format($totalPernahRusak) }}</h4>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600 dark:bg-amber-900/20 dark:text-amber-400">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
            </div>
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Memiliki minimal 1 aduan valid</p>
        </div>

        <div class="rounded-2xl border border-stroke bg-white p-5 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Sedang Ditangani</span>
                    <h4 class="mt-1 text-2xl font-bold text-black dark:text-white">{{ number_format($totalSedangDitangani) }}</h4>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
            </div>
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Belum diperiksa / sedang diproses</p>
        </div>

        <div class="rounded-2xl border border-stroke bg-white p-5 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Sering Rusak (≥ 2x)</span>
                    <h4 class="mt-1 text-2xl font-bold text-black dark:text-white">{{ number_format($totalSeringRusak) }}</h4>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-red-600 dark:bg-red-900/20 dark:text-red-400">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/>
                    </svg>
                </div>
            </div>
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Perlu perhatian khusus / peremajaan</p>
        </div>
    </div>

    {{-- Toolbar Pencarian & Filter + Tabel Live AJAX --}}
    <div x-data="liveTable()">
        <div class="mb-6 rounded-2xl border border-stroke bg-white p-4 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <form x-ref="form" @submit.prevent="applyFilter()" method="GET" action="{{ route('master.asset_history.index') }}" class="flex flex-col gap-3 lg:flex-row lg:items-center">
                <div class="relative flex-1">
                    <input type="text"
                           name="search"
                           value="{{ $search }}"
                           placeholder="Cari kode barang, NUP, nama barang, merk, atau lokasi..."
                           @input.debounce.350ms="applyFilter()"
                           class="w-full rounded-xl border border-stroke bg-transparent py-2.5 ps-10 pe-4 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                    <svg class="absolute start-3.5 top-3 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:flex-wrap lg:flex-nowrap">
                    <select name="cakupan"
                            @change="applyFilter()"
                            aria-label="Filter cakupan aset"
                            class="cursor-pointer rounded-xl border border-stroke bg-transparent px-4 py-2.5 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        @foreach($cakupanLabels as $value => $label)
                            <option value="{{ $value }}" @selected($cakupan === $value)>{{ $label }}</option>
                        @endforeach
                    </select>

                    <select name="kondisi"
                            @change="applyFilter()"
                            aria-label="Filter kondisi aset"
                            class="cursor-pointer rounded-xl border border-stroke bg-transparent px-4 py-2.5 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        <option value="" @selected($kondisi === '')>Semua Kondisi</option>
                        <option value="Baik" @selected($kondisi === 'Baik')>Baik</option>
                        <option value="Rusak" @selected($kondisi === 'Rusak')>Rusak (Semua)</option>
                        <option value="Rusak Berat" @selected($kondisi === 'Rusak Berat')>Rusak Berat</option>
                    </select>

                    <select name="sort"
                            @change="applyFilter()"
                            aria-label="Urutkan daftar aset"
                            class="cursor-pointer rounded-xl border border-stroke bg-transparent px-4 py-2.5 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        <option value="" @selected($sort === '')>Terbanyak Rusak</option>
                        <option value="terbaru" @selected($sort === 'terbaru')>Terakhir Rusak</option>
                        <option value="nama" @selected($sort === 'nama')>Nama Barang (A-Z)</option>
                    </select>

                    <button type="button"
                            @click.prevent="resetFilters()"
                            x-show="hasFilters"
                            x-cloak
                            class="cursor-pointer inline-flex items-center justify-center rounded-xl border border-stroke px-4 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-800">
                        Reset
                    </button>
                </div>
            </form>
        </div>

        {{-- Tabel Aset dengan Loading Overlay Spinner --}}
        <div class="relative min-h-[200px]">
            <div x-show="loading" x-cloak
                 class="absolute inset-0 z-30 flex items-center justify-center rounded-2xl bg-white/60 backdrop-blur-[1px] transition-opacity duration-200 dark:bg-gray-900/60">
                <div class="inline-flex items-center gap-2.5 rounded-xl border border-gray-200 bg-white px-4 py-2.5 shadow-theme-sm dark:border-gray-700 dark:bg-gray-800">
                    <svg class="h-5 w-5 animate-spin text-[#10B981]" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300">Memuat data...</span>
                </div>
            </div>

            <div x-ref="tableWrapper">
                <div class="w-full max-w-full overflow-hidden rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
                    {{-- Tampilan Desktop Table (>= sm) --}}
                    <div x-ref="tableContainer" class="hidden sm:block w-full max-w-full overflow-x-auto custom-scrollbar">
                        <table class="w-full text-start">
                            <thead>
                                <tr class="border-b border-stroke text-xs uppercase tracking-wider text-gray-500 dark:border-gray-800 dark:text-gray-400">
                                    <th class="px-5 py-4 font-semibold text-start whitespace-nowrap">Kode & NUP</th>
                                    <th class="px-5 py-4 font-semibold text-start">Nama & Merk Barang</th>
                                    <th class="px-5 py-4 font-semibold text-start">Lokasi Ruang</th>
                                    <th class="px-5 py-4 font-semibold text-start whitespace-nowrap">Kondisi</th>
                                    <th class="px-5 py-4 font-semibold text-start whitespace-nowrap">Total Rusak</th>
                                    <th class="px-5 py-4 font-semibold text-start whitespace-nowrap">Terakhir Rusak</th>
                                    <th class="px-5 py-4 font-semibold text-end whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-stroke text-sm dark:divide-gray-800">
                                @forelse($assets as $asset)
                                    @php
                                        $totalRusak = (int) ($asset->total_kerusakan_count ?? 0);
                                        $aktifCount = (int) ($asset->active_kerusakan_count ?? 0);
                                        $mandiriCount = (int) ($asset->mandiri_count ?? 0);
                                        $pihakKetigaCount = (int) ($asset->pihak_ketiga_count ?? 0);

                                        $rusakBadge = $totalRusak >= 2
                                            ? 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-300'
                                            : ($totalRusak === 1
                                                ? 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300'
                                                : 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400');

                                        $kondisiBadge = str_starts_with($asset->status_kondisi ?? '', 'Rusak')
                                            ? 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-300'
                                            : 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-300';

                                        $terakhirRusak = $asset->terakhir_rusak_at
                                            ? \App\Support\WitaTime::format(\Carbon\Carbon::parse($asset->terakhir_rusak_at))
                                            : '-';
                                    @endphp
                                    <tr class="transition hover:bg-gray-50/70 dark:hover:bg-white/[0.02]">
                                        <td class="px-5 py-4 whitespace-nowrap align-top">
                                            <span class="block font-semibold text-gray-900 dark:text-white">{{ $asset->kode_barang }}</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">NUP: {{ $asset->nup }}</span>
                                        </td>
                                        <td class="px-5 py-4 align-top">
                                            <a href="{{ route('master.asset_history.show', $asset) }}" class="font-semibold text-gray-900 transition hover:text-primary dark:text-white dark:hover:text-brand-400">
                                                {{ $asset->nama_barang }}
                                            </a>
                                            <span class="mt-0.5 block text-xs text-gray-500 dark:text-gray-400">
                                                {{ $asset->merk_type ?: '-' }}
                                                @if($asset->jenis_barang)
                                                    • {{ $asset->jenis_barang }}
                                                @endif
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 text-gray-700 dark:text-gray-300 align-top">
                                            {{ $asset->lokasi ?: '-' }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap align-top">
                                            <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $kondisiBadge }}">
                                                {{ $asset->status_kondisi }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap align-top">
                                            <div class="flex flex-col items-start gap-1">
                                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $rusakBadge }}">
                                                    {{ $totalRusak }}x rusak
                                                </span>
                                                @if($totalRusak > 0)
                                                    <span class="text-[11px] text-gray-500 dark:text-gray-400">
                                                        Mandiri: {{ $mandiriCount }} • Pihak ke-3: {{ $pihakKetigaCount }}
                                                    </span>
                                                @endif
                                                @if($aktifCount > 0)
                                                    <span class="inline-flex items-center rounded-md bg-blue-50 px-1.5 py-0.5 text-[11px] font-medium text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
                                                        {{ $aktifCount }} sedang ditangani
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-xs text-gray-600 dark:text-gray-300 align-top">
                                            {{ $terakhirRusak }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-end align-top">
                                            <a href="{{ route('master.asset_history.show', $asset) }}"
                                               class="inline-flex items-center gap-1.5 rounded-lg border border-stroke px-3 py-1.5 text-xs font-medium text-gray-700 transition hover:border-primary hover:text-primary dark:border-gray-700 dark:text-gray-300 dark:hover:border-brand-400 dark:hover:text-white">
                                                <span>Lihat Riwayat</span>
                                                <svg class="h-3.5 w-3.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-12 text-center text-gray-500 dark:text-gray-400">
                                            <svg class="mx-auto mb-3 h-10 w-10 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                            <p class="text-sm font-medium">Tidak ada data barang yang sesuai filter.</p>
                                            <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">Coba ubah cakupan ke "Semua Barang Master" atau reset filter pencarian.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Tampilan Mobile Cards (< sm) --}}
                    <div class="block divide-y divide-stroke sm:hidden dark:divide-gray-800">
                        @forelse($assets as $asset)
                            @php
                                $totalRusak = (int) ($asset->total_kerusakan_count ?? 0);
                                $aktifCount = (int) ($asset->active_kerusakan_count ?? 0);
                                $rusakBadge = $totalRusak >= 2
                                    ? 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-300'
                                    : ($totalRusak === 1
                                        ? 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300'
                                        : 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400');
                                $kondisiBadge = str_starts_with($asset->status_kondisi ?? '', 'Rusak')
                                    ? 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-300'
                                    : 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-300';
                                $terakhirRusak = $asset->terakhir_rusak_at
                                    ? \App\Support\WitaTime::format(\Carbon\Carbon::parse($asset->terakhir_rusak_at))
                                    : '-';
                            @endphp
                            <div class="p-4 space-y-2.5">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <span class="text-xs font-medium text-gray-500 dark:text-gray-400">{{ $asset->kode_barang }} • NUP {{ $asset->nup }}</span>
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                            {{ $asset->nama_barang }}
                                        </h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $asset->merk_type ?: '-' }} • {{ $asset->lokasi ?: '-' }}</p>
                                    </div>
                                    <span class="shrink-0 inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $rusakBadge }}">
                                        {{ $totalRusak }}x rusak
                                    </span>
                                </div>

                                <div class="flex flex-wrap items-center gap-2 text-xs">
                                    <span class="inline-flex rounded-full px-2 py-0.5 font-semibold {{ $kondisiBadge }}">
                                        Kondisi: {{ $asset->status_kondisi }}
                                    </span>
                                    @if($aktifCount > 0)
                                        <span class="inline-flex rounded-md bg-blue-50 px-2 py-0.5 font-medium text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
                                            {{ $aktifCount }} aktif
                                        </span>
                                    @endif
                                </div>

                                <div class="flex items-center justify-between pt-1 text-xs text-gray-500 dark:text-gray-400">
                                    <span>Terakhir: {{ $terakhirRusak }}</span>
                                    <a href="{{ route('master.asset_history.show', $asset) }}"
                                       class="inline-flex items-center gap-1 font-semibold text-primary hover:underline">
                                        <span>Lihat Riwayat</span>
                                        <svg class="h-3.5 w-3.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="p-8 text-center text-sm text-gray-500 dark:text-gray-400">
                                Tidak ada data barang yang sesuai filter.
                            </div>
                        @endforelse
                    </div>

                    @if($assets->hasPages())
                        <div class="border-t border-stroke p-4 dark:border-gray-800">
                            {{ $assets->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
