@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-6xl py-10">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-black dark:text-white">Selamat Datang, {{ auth()->user()->nama }}</h1>
        <p class="mt-2 text-gray-500 dark:text-gray-400">Silakan pilih jenis layanan IT atau temukan solusi mandiri yang Anda butuhkan:</p>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        {{-- TOMBOL 1: INCIDENT (ADUAN KENDALA) --}}
        <a href="{{ route('incidents.create') }}" class="group relative flex flex-col items-center justify-between rounded-2xl border border-stroke bg-white p-8 shadow-default transition-all hover:-translate-y-1 hover:border-red-500 hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex flex-col items-center text-center">
                <div class="mb-6 flex h-18 w-18 items-center justify-center rounded-2xl bg-red-100 text-red-600 transition-colors group-hover:bg-red-600 group-hover:text-white dark:bg-red-900/30 dark:text-red-400 dark:group-hover:bg-red-600 dark:group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-9 w-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-bold text-black dark:text-white">Aduan Kendala</h3>
                <p class="text-xs leading-relaxed text-gray-500 dark:text-gray-400">
                    Lapor kendala atau kerusakan perangkat hardware, jaringan internet, atau sistem yang butuh perbaikan teknisi.
                </p>
            </div>
            <span class="mt-6 inline-flex items-center gap-1.5 text-xs font-semibold text-red-600 transition-transform group-hover:translate-x-1 dark:text-red-400">
                Buat Laporan Aduan &rarr;
            </span>
        </a>

        {{-- TOMBOL 2: REQUEST (PERMINTAAN LAYANAN) --}}
        <a href="{{ route('requests.create') }}" class="group relative flex flex-col items-center justify-between rounded-2xl border border-stroke bg-white p-8 shadow-default transition-all hover:-translate-y-1 hover:border-blue-500 hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex flex-col items-center text-center">
                <div class="mb-6 flex h-18 w-18 items-center justify-center rounded-2xl bg-blue-100 text-blue-600 transition-colors group-hover:bg-blue-600 group-hover:text-white dark:bg-blue-900/30 dark:text-blue-400 dark:group-hover:bg-blue-600 dark:group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-9 w-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z" />
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-bold text-black dark:text-white">Permintaan Layanan</h3>
                <p class="text-xs leading-relaxed text-gray-500 dark:text-gray-400">
                    Permohonan layanan IT seperti link Zoom, reset sandi akun, penambahan akun, atau peminjaman perangkat.
                </p>
            </div>
            <span class="mt-6 inline-flex items-center gap-1.5 text-xs font-semibold text-blue-600 transition-transform group-hover:translate-x-1 dark:text-blue-400">
                Ajukan Permintaan &rarr;
            </span>
        </a>

        {{-- TOMBOL 3: KNOWLEDGE BASE / PANDUAN MANDIRI --}}
        <a href="{{ route('panduan.index') }}" class="group relative flex flex-col items-center justify-between rounded-2xl border border-stroke bg-white p-8 shadow-default transition-all hover:-translate-y-1 hover:border-[#10B981] hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex flex-col items-center text-center">
                <div class="mb-6 flex h-18 w-18 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600 transition-colors group-hover:bg-[#10B981] group-hover:text-white dark:bg-emerald-900/30 dark:text-emerald-400 dark:group-hover:bg-[#10B981] dark:group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-9 w-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-bold text-black dark:text-white">Panduan Solusi Mandiri</h3>
                <p class="text-xs leading-relaxed text-gray-500 dark:text-gray-400">
                    Cari tutorial cepat dan panduan penyelesaian masalah umum (Wi-Fi, printer, audio Zoom, akun SSO) secara mandiri.
                </p>
            </div>
            <span class="mt-6 inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 transition-transform group-hover:translate-x-1 dark:text-emerald-400">
                Buka Pusat Bantuan &rarr;
            </span>
        </a>
    </div>

    {{-- Link cepat ke riwayat untuk pelapor --}}
    <div class="mt-12 flex flex-wrap items-center justify-center gap-6 text-sm">
        <a href="{{ route('incidents.index') }}" class="font-medium text-gray-600 hover:text-primary dark:text-gray-400">
            Riwayat Aduan Saya &rarr;
        </a>
        <span class="text-gray-300 dark:text-gray-700">&bull;</span>
        <a href="{{ route('requests.index') }}" class="font-medium text-gray-600 hover:text-primary dark:text-gray-400">
            Riwayat Permintaan Saya &rarr;
        </a>
    </div>
</div>
@endsection
