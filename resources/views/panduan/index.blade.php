@extends('layouts.app')

@section('content')
<div x-data="liveTable()">
    {{-- Breadcrumb --}}
    <x-common.page-breadcrumb pageTitle="Pusat Bantuan & Panduan Mandiri" />

    {{-- Feedback Alert --}}
    @if(session('success'))
        <div class="mb-6 flex items-center justify-between rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            <div class="flex items-center gap-2.5">
                <svg class="h-5 w-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- HERO SEARCH BANNER --}}
    <div class="mb-8 overflow-hidden rounded-2xl border border-stroke bg-gradient-to-br from-emerald-500/10 via-white to-emerald-500/5 p-6 shadow-default dark:border-gray-800 dark:bg-gray-900/60 dark:from-emerald-950/20 dark:via-gray-900 dark:to-gray-900 sm:p-10">
        <div class="mx-auto max-w-2xl text-center">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3.5 py-1 text-xs font-semibold text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300">
                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Knowledge Base & FAQ IT BPOM
            </span>
            <h1 class="mt-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-3xl">
                Ada kendala apa hari ini?
            </h1>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Cari panduan langkah per langkah untuk printer, Wi-Fi, akun SSO, Zoom, dan aplikasi internal BPOM secara mandiri.
            </p>

            {{-- Form Pencarian Live --}}
            <form x-ref="form" @submit.prevent="applyFilter()" method="GET" action="{{ route('panduan.index') }}" class="mt-6 flex flex-col gap-3 sm:flex-row">
                <input type="hidden" name="kategori" value="{{ $selectedCategory }}">
                <div class="relative flex-1">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Ketik kata kunci kendala (misal: printer offline, wifi, zoom audio)..."
                           @input.debounce.350ms="applyFilter()"
                           class="w-full rounded-xl border border-stroke bg-white py-3 ps-11 pe-4 text-sm text-gray-900 shadow-xs outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                    <svg class="absolute start-4 top-3.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <button type="button"
                        @click.prevent="resetFilters()"
                        x-show="hasFilters"
                        x-cloak
                        class="inline-flex items-center justify-center rounded-xl border border-stroke bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-xs transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 cursor-pointer">
                    Reset
                </button>
            </form>
        </div>
    </div>

    {{-- BARIS TAB KATEGORI & TOMBOL AKSI STAF --}}
    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        {{-- Kategori Filter Pills --}}
        <div class="flex flex-wrap items-center gap-2">
            <button type="button"
                    @click="$refs.form.querySelector('input[name=kategori]').value = ''; applyFilter();"
                    class="inline-flex items-center gap-1.5 rounded-xl px-4 py-2 text-xs font-semibold transition cursor-pointer {{ empty($selectedCategory) ? 'bg-[#10B981] text-white shadow-xs' : 'border border-stroke bg-white text-gray-600 hover:bg-gray-50 dark:border-gray-800 dark:bg-white/[0.03] dark:text-gray-300' }}">
                <span>Semua Kategori</span>
            </button>
            @foreach($kategoriList as $key => $label)
                <button type="button"
                        @click="$refs.form.querySelector('input[name=kategori]').value = '{{ $key }}'; applyFilter();"
                        class="inline-flex items-center gap-1.5 rounded-xl px-4 py-2 text-xs font-semibold transition cursor-pointer {{ $selectedCategory === $key ? 'bg-[#10B981] text-white shadow-xs' : 'border border-stroke bg-white text-gray-600 hover:bg-gray-50 dark:border-gray-800 dark:bg-white/[0.03] dark:text-gray-300' }}">
                    <span>{{ $label }}</span>
                    @if(isset($categoryCounts[$key]) && $categoryCounts[$key] > 0)
                        <span class="rounded-full px-1.5 py-0.2 text-[10px] {{ $selectedCategory === $key ? 'bg-white/25 text-white' : 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400' }}">
                            {{ $categoryCounts[$key] }}
                        </span>
                    @endif
                </button>
            @endforeach
        </div>

        {{-- Tombol Tambah Panduan (Khusus Staff) --}}
        @if($isStaff)
            <div class="shrink-0">
                <a href="{{ route('panduan.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#10B981] px-5 py-2.5 text-sm font-semibold text-white shadow-xs transition hover:bg-green-700">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>+ Tambah Panduan</span>
                </a>
            </div>
        @endif
    </div>

    {{-- WRAPPER KONTEN & OVERLAY SPINNER --}}
    <div class="relative min-h-[300px]">
        <!-- Loading Overlay Spinner -->
        <div x-show="loading" x-cloak
             class="absolute inset-0 z-30 flex items-center justify-center rounded-2xl bg-white/60 backdrop-blur-[1px] transition-opacity duration-200 dark:bg-gray-900/60">
            <div class="inline-flex items-center gap-2.5 rounded-xl border border-gray-200 bg-white px-4 py-2.5 shadow-theme-sm dark:border-gray-700 dark:bg-gray-800">
                <svg class="h-5 w-5 animate-spin text-[#10B981]" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-xs font-medium text-gray-700 dark:text-gray-300">Memuat panduan...</span>
            </div>
        </div>

        <!-- Dynamic Content Swap via LiveTable -->
        <div x-ref="tableWrapper">
            @if($panduans->count() > 0)
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($panduans as $item)
                        <div class="group flex flex-col justify-between rounded-2xl border border-stroke bg-white p-6 shadow-default transition-all hover:-translate-y-1 hover:border-brand-500 hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03]">
                            <div>
                                <div class="flex items-center justify-between gap-2">
                                    <span class="inline-block rounded-lg border px-2.5 py-1 text-[11px] font-semibold {{ $item->kategori_badge }}">
                                        {{ $item->kategori }}
                                    </span>

                                    @if(!$item->is_published)
                                        <span class="rounded-md bg-gray-100 px-2 py-0.5 text-[10px] font-medium text-gray-600 dark:bg-gray-800 dark:text-gray-400">
                                            Draft
                                        </span>
                                    @endif
                                </div>

                                <h3 class="mt-4 text-base font-bold text-gray-900 group-hover:text-brand-500 dark:text-white line-clamp-2">
                                    <a href="{{ route('panduan.show', $item->slug) }}">
                                        {{ $item->judul }}
                                    </a>
                                </h3>

                                <p class="mt-2 text-xs leading-relaxed text-gray-500 dark:text-gray-400 line-clamp-3">
                                    {{ $item->ringkasan }}
                                </p>
                            </div>

                            <div class="mt-6 border-t border-stroke pt-4 dark:border-gray-800">
                                <div class="flex items-center justify-between text-xs text-gray-400">
                                    <div class="flex items-center gap-3">
                                        <span class="inline-flex items-center gap-1" title="Jumlah pembaca">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            {{ $item->views }}
                                        </span>
                                        <span class="inline-flex items-center gap-1 text-emerald-600 dark:text-emerald-400" title="Pembaca terbantu">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                            </svg>
                                            {{ $item->helpful_yes }}
                                        </span>
                                    </div>

                                    <a href="{{ route('panduan.show', $item->slug) }}" class="inline-flex items-center gap-1 font-semibold text-[#10B981] hover:underline">
                                        Baca Solusi &rarr;
                                    </a>
                                </div>

                                {{-- Aksi Edit/Hapus khusus Staf --}}
                                @if($isStaff)
                                    <div class="mt-3 flex items-center justify-end gap-2 border-t border-dashed border-stroke pt-2 dark:border-gray-800">
                                        <a href="{{ route('panduan.edit', $item->id) }}" class="text-[11px] font-medium text-amber-600 hover:underline dark:text-amber-400">
                                            Edit
                                        </a>
                                        <span class="text-gray-300 dark:text-gray-700">&bull;</span>
                                        <form action="{{ route('panduan.destroy', $item->id) }}" method="POST"
                                              onsubmit="return confirm('Hapus artikel panduan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[11px] font-medium text-red-600 hover:underline dark:text-red-400 cursor-pointer">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($panduans->hasPages())
                    <div class="mt-8">
                        {{ $panduans->links() }}
                    </div>
                @endif
            @else
                <div class="rounded-2xl border border-stroke bg-white p-12 text-center shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
                    <svg class="mx-auto h-12 w-12 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                    </svg>
                    <h3 class="mt-3 text-base font-semibold text-gray-800 dark:text-white">Tidak ada panduan yang cocok</h3>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Coba gunakan kata kunci pencarian yang lain atau pilih kategori yang berbeda.
                    </p>
                    <div class="mt-5">
                        <button type="button" @click.prevent="resetFilters()" class="cursor-pointer inline-flex items-center gap-1 rounded-xl bg-gray-100 px-4 py-2 text-xs font-semibold text-gray-700 transition hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                            Reset Pencarian
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
