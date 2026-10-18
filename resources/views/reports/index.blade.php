@extends('layouts.app')

@section('content')
<div x-data="{
    periode: '{{ old('periode', 'semester') }}',
    tahunAwal2Thn: {{ old('tahun_awal_2thn', $currentYear - 1) }},
    get tahunAkhir2Thn() {
        return parseInt(this.tahunAwal2Thn || {{ $currentYear - 1 }}) + 1;
    }
}">
    {{-- Breadcrumb --}}
    <x-common.page-breadcrumb pageTitle="Laporan & Rekapitulasi" />

    {{-- Feedback Alerts --}}
    @if(session('error'))
        <div class="mb-6 flex items-center justify-between rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            <div class="flex items-center gap-2.5">
                <svg class="h-5 w-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            <p class="font-semibold mb-1">Periksa kembali kriteria laporan:</p>
            <ul class="list-disc ps-5 space-y-0.5 text-xs">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Card Form Filter Laporan --}}
        <div class="lg:col-span-2 rounded-2xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="mb-6 border-b border-gray-100 pb-4 dark:border-gray-800">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Konfigurasi Ekspor Laporan
                </h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    Pilih jenis data dan periode laporan untuk mengunduh rekapitulasi komprehensif dalam format Excel (.xlsx)
                </p>
            </div>

            <form action="{{ route('reports.export') }}" method="POST" class="space-y-6">
                @csrf

                {{-- 1. Pilihan Jenis Laporan --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                        1. Jenis Laporan <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <label class="flex cursor-pointer items-start gap-3 rounded-xl border p-4 transition"
                               :class="'{{ old('jenis', 'kerusakan') }}' === 'kerusakan' ? 'border-brand-500 bg-brand-50/40 dark:bg-brand-950/20' : 'border-gray-200 dark:border-gray-800'">
                            <input type="radio" name="jenis" value="kerusakan"
                                   class="mt-1 text-brand-500 focus:ring-brand-500"
                                   {{ old('jenis', 'kerusakan') === 'kerusakan' ? 'checked' : '' }}>
                            <div>
                                <span class="block text-sm font-semibold text-gray-900 dark:text-white">
                                    Laporan Kerusakan Aset
                                </span>
                                <span class="block text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                                    Aduan kendala perangkat, analisa teknis, & hasil penanganan tiket
                                </span>
                            </div>
                        </label>

                        <label class="flex cursor-pointer items-start gap-3 rounded-xl border p-4 transition"
                               :class="'{{ old('jenis') }}' === 'layanan' ? 'border-brand-500 bg-brand-50/40 dark:bg-brand-950/20' : 'border-gray-200 dark:border-gray-800'">
                            <input type="radio" name="jenis" value="layanan"
                                   class="mt-1 text-brand-500 focus:ring-brand-500"
                                   {{ old('jenis') === 'layanan' ? 'checked' : '' }}>
                            <div>
                                <span class="block text-sm font-semibold text-gray-900 dark:text-white">
                                    Laporan Layanan TI
                                </span>
                                <span class="block text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                                    Permohonan Zoom, akun baru, reset password, & peminjaman
                                </span>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 2. Pilihan Model Periode --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                        2. Model Rentang Periode <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-2">
                        {{-- Per Tanggal --}}
                        <label class="flex flex-col items-center justify-center p-3 rounded-xl border cursor-pointer text-center transition"
                               :class="periode === 'tanggal' ? 'border-brand-500 bg-brand-50 text-brand-600 dark:bg-brand-950/30 dark:text-brand-400 font-semibold' : 'border-gray-200 hover:border-gray-300 dark:border-gray-800 text-gray-600 dark:text-gray-400'">
                            <input type="radio" name="periode" value="tanggal" x-model="periode" class="sr-only">
                            <span class="text-xs">Per Tanggal</span>
                        </label>

                        {{-- Per Bulan --}}
                        <label class="flex flex-col items-center justify-center p-3 rounded-xl border cursor-pointer text-center transition"
                               :class="periode === 'bulan' ? 'border-brand-500 bg-brand-50 text-brand-600 dark:bg-brand-950/30 dark:text-brand-400 font-semibold' : 'border-gray-200 hover:border-gray-300 dark:border-gray-800 text-gray-600 dark:text-gray-400'">
                            <input type="radio" name="periode" value="bulan" x-model="periode" class="sr-only">
                            <span class="text-xs">Per Bulan</span>
                        </label>

                        {{-- Per 6 Bulan (Semester) --}}
                        <label class="flex flex-col items-center justify-center p-3 rounded-xl border cursor-pointer text-center transition"
                               :class="periode === 'semester' ? 'border-brand-500 bg-brand-50 text-brand-600 dark:bg-brand-950/30 dark:text-brand-400 font-semibold' : 'border-gray-200 hover:border-gray-300 dark:border-gray-800 text-gray-600 dark:text-gray-400'">
                            <input type="radio" name="periode" value="semester" x-model="periode" class="sr-only">
                            <span class="text-xs">Per 6 Bulan</span>
                        </label>

                        {{-- Per Tahun --}}
                        <label class="flex flex-col items-center justify-center p-3 rounded-xl border cursor-pointer text-center transition"
                               :class="periode === 'tahun' ? 'border-brand-500 bg-brand-50 text-brand-600 dark:bg-brand-950/30 dark:text-brand-400 font-semibold' : 'border-gray-200 hover:border-gray-300 dark:border-gray-800 text-gray-600 dark:text-gray-400'">
                            <input type="radio" name="periode" value="tahun" x-model="periode" class="sr-only">
                            <span class="text-xs">Per Tahun</span>
                        </label>

                        {{-- Per 2 Tahun --}}
                        <label class="flex flex-col items-center justify-center p-3 rounded-xl border cursor-pointer text-center transition col-span-2 sm:col-span-1"
                               :class="periode === 'dua_tahun' ? 'border-brand-500 bg-brand-50 text-brand-600 dark:bg-brand-950/30 dark:text-brand-400 font-semibold' : 'border-gray-200 hover:border-gray-300 dark:border-gray-800 text-gray-600 dark:text-gray-400'">
                            <input type="radio" name="periode" value="dua_tahun" x-model="periode" class="sr-only">
                            <span class="text-xs">Per 2 Tahun</span>
                        </label>
                    </div>
                </div>

                {{-- 3. Input Parameter Dinamis Berdasarkan Periode --}}
                <div class="rounded-xl border border-dashed border-gray-300 bg-gray-50/70 p-4.5 dark:border-gray-700 dark:bg-gray-900/40">
                    {{-- A. Panel Per Tanggal --}}
                    <div x-show="periode === 'tanggal'" x-cloak class="space-y-3">
                        <div class="flex items-center gap-2 text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            <span>📅 Rentang Tanggal Spesifik (Maksimal 2 Tahun)</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="mb-1 block text-xs text-gray-600 dark:text-gray-400">Dari Tanggal</label>
                                <input type="date" name="tanggal_awal"
                                       value="{{ old('tanggal_awal', date('Y-m-01')) }}"
                                       :disabled="periode !== 'tanggal'"
                                       class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 outline-none transition focus:border-brand-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white disabled:opacity-50">
                            </div>
                            <div>
                                <label class="mb-1 block text-xs text-gray-600 dark:text-gray-400">Sampai Tanggal</label>
                                <input type="date" name="tanggal_akhir"
                                       value="{{ old('tanggal_akhir', date('Y-m-d')) }}"
                                       :disabled="periode !== 'tanggal'"
                                       class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 outline-none transition focus:border-brand-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white disabled:opacity-50">
                            </div>
                        </div>
                    </div>

                    {{-- B. Panel Per Bulan --}}
                    <div x-show="periode === 'bulan'" x-cloak class="space-y-3">
                        <div class="flex items-center gap-2 text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            <span>🗓️ Rentang Bulan (Maksimal 24 Bulan)</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="mb-1 block text-xs text-gray-600 dark:text-gray-400">Dari Bulan</label>
                                <input type="month" name="bulan_awal"
                                       value="{{ old('bulan_awal', date('Y-01')) }}"
                                       :disabled="periode !== 'bulan'"
                                       class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 outline-none transition focus:border-brand-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white disabled:opacity-50">
                            </div>
                            <div>
                                <label class="mb-1 block text-xs text-gray-600 dark:text-gray-400">Sampai Bulan</label>
                                <input type="month" name="bulan_akhir"
                                       value="{{ old('bulan_akhir', date('Y-m')) }}"
                                       :disabled="periode !== 'bulan'"
                                       class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 outline-none transition focus:border-brand-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white disabled:opacity-50">
                            </div>
                        </div>
                    </div>

                    {{-- C. Panel Per 6 Bulan (Semester) --}}
                    <div x-show="periode === 'semester'" x-cloak class="space-y-3">
                        <div class="flex items-center gap-2 text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            <span>📊 Laporan Semester (6 Bulan)</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="mb-1 block text-xs text-gray-600 dark:text-gray-400">Pilih Tahun</label>
                                <select name="tahun_semester"
                                        :disabled="periode !== 'semester'"
                                        class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 outline-none transition focus:border-brand-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white disabled:opacity-50">
                                    @foreach($availableYears as $yr)
                                        <option value="{{ $yr }}" {{ (string)old('tahun_semester', $currentYear) === (string)$yr ? 'selected' : '' }}>
                                            Tahun {{ $yr }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="mb-1 block text-xs text-gray-600 dark:text-gray-400">Pilih Semester</label>
                                <select name="semester"
                                        :disabled="periode !== 'semester'"
                                        class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 outline-none transition focus:border-brand-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white disabled:opacity-50">
                                    <option value="1" {{ old('semester', (date('n') <= 6 ? '1' : '2')) == '1' ? 'selected' : '' }}>
                                        Semester 1 (Januari - Juni)
                                    </option>
                                    <option value="2" {{ old('semester', (date('n') <= 6 ? '1' : '2')) == '2' ? 'selected' : '' }}>
                                        Semester 2 (Juli - Desember)
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- D. Panel Per Tahun --}}
                    <div x-show="periode === 'tahun'" x-cloak class="space-y-3">
                        <div class="flex items-center gap-2 text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            <span>📅 Laporan Tahunan Penuh (1 Januari - 31 Desember)</span>
                        </div>
                        <div>
                            <label class="mb-1 block text-xs text-gray-600 dark:text-gray-400">Pilih Tahun</label>
                            <select name="tahun"
                                    :disabled="periode !== 'tahun'"
                                    class="w-full sm:w-1/2 rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 outline-none transition focus:border-brand-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white disabled:opacity-50">
                                @foreach($availableYears as $yr)
                                    <option value="{{ $yr }}" {{ (string)old('tahun', $currentYear) === (string)$yr ? 'selected' : '' }}>
                                        Tahun {{ $yr }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- E. Panel Per 2 Tahun --}}
                    <div x-show="periode === 'dua_tahun'" x-cloak class="space-y-3">
                        <div class="flex items-center gap-2 text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            <span>📈 Laporan Rentang 2 Tahun Berurutan</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 items-center">
                            <div>
                                <label class="mb-1 block text-xs text-gray-600 dark:text-gray-400">Tahun Awal</label>
                                <select name="tahun_awal_2thn"
                                        x-model="tahunAwal2Thn"
                                        :disabled="periode !== 'dua_tahun'"
                                        class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 outline-none transition focus:border-brand-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white disabled:opacity-50">
                                    @foreach($availableYears as $yr)
                                        <option value="{{ $yr }}" {{ (string)old('tahun_awal_2thn', $currentYear - 1) === (string)$yr ? 'selected' : '' }}>
                                            Tahun {{ $yr }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="mb-1 block text-xs text-gray-600 dark:text-gray-400">Tahun Akhir (Otomatis +1)</label>
                                <div class="flex items-center h-[42px] px-3.5 rounded-xl border border-gray-200 bg-gray-100 text-sm font-semibold text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                    <span x-text="'Tahun ' + tahunAkhir2Thn"></span>
                                    <span class="ms-auto text-[11px] font-normal text-gray-500">(Read-only)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-500 dark:text-gray-400">
                            💡 Data yang diambil: 1 Januari <span x-text="tahunAwal2Thn"></span> sampai 31 Desember <span x-text="tahunAkhir2Thn"></span>.
                        </p>
                    </div>
                </div>

                {{-- Action Submit --}}
                <div class="pt-2">
                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2.5 rounded-xl bg-[#10B981] px-6 py-3.5 text-sm font-semibold text-white shadow-xs transition hover:bg-green-700 cursor-pointer">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Generate & Unduh Laporan Excel (.xlsx)</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Card Informasi & Spesifikasi Excel --}}
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white flex items-center gap-2 mb-3">
                    <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Struktur File Hasil Ekspor
                </h4>
                <div class="space-y-3.5 text-xs text-gray-600 dark:text-gray-400">
                    <div class="rounded-xl border border-gray-100 p-3 bg-gray-50/70 dark:border-gray-800 dark:bg-gray-900/40">
                        <span class="font-bold text-gray-800 dark:text-gray-200 block mb-1">📄 Sheet 1: Ringkasan</span>
                        <ul class="list-disc ps-4 space-y-0.5">
                            <li>Judul laporan & identitas instansi</li>
                            <li>Periode & tanggal cetak</li>
                            <li>Identitas operator / dicetak oleh</li>
                            <li>Tabel rekapitulasi status tiket/request</li>
                            <li>Tabel rekapitulasi jenis barang / layanan</li>
                            <li>Tabel tren volume laporan per bulan</li>
                        </ul>
                    </div>

                    <div class="rounded-xl border border-gray-100 p-3 bg-gray-50/70 dark:border-gray-800 dark:bg-gray-900/40">
                        <span class="font-bold text-gray-800 dark:text-gray-200 block mb-1">📋 Sheet 2: Detail</span>
                        <ul class="list-disc ps-4 space-y-0.5">
                            <li>Daftar lengkap seluruh tiket/permohonan</li>
                            <li>Header kolom beku (Freeze Top Row)</li>
                            <li>Lebar kolom otomatis (Auto-Size)</li>
                            <li>Diproses secara streaming/chunking memory-safe</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-blue-100 bg-blue-50/50 p-5 dark:border-blue-900/30 dark:bg-blue-950/20">
                <div class="flex items-start gap-3">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400 font-bold text-xs">
                        i
                    </span>
                    <div class="text-xs text-blue-900 dark:text-blue-300 space-y-1">
                        <p class="font-semibold">Aturan Rentang Periode</p>
                        <p>
                            Untuk menjaga efisiensi kinerja server, batas rentang maksimum laporan yang dapat diekspor dalam satu file adalah <strong>2 Tahun</strong>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
