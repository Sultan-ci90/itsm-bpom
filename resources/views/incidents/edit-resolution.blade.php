@extends('layouts.app')

@section('content')
@php
    $user    = auth()->user();
    $res     = $ticket->resolution;

    $input = 'w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white';
    $label = 'mb-2.5 block text-sm font-medium text-black dark:text-white';
@endphp

<div class="mx-auto max-w-4xl">
    {{-- Header, Breadcrumb & Back Navigation --}}
    <div class="mb-6 space-y-3">
        {{-- Breadcrumb di Atas --}}
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
                <li>
                    <a href="{{ route('incidents.index') }}" class="transition hover:text-primary">
                        {{ auth()->user()->isTeknisi() || auth()->user()->isAdmin() ? 'Semua Aduan Kendala' : 'Aduan Kendala Saya' }}
                    </a>
                </li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li>
                    <a href="{{ route('incidents.show', $ticket) }}" class="transition hover:text-primary">
                        {{ $ticket->nomor_aduan }}
                    </a>
                </li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li class="font-medium text-gray-800 dark:text-white/90">
                    Edit Tindak Lanjut Aduan Kendala
                </li>
            </ol>
        </nav>

        {{-- Baris Judul & Tombol Kembali di Sebelah Kiri Judul --}}
        <div class="flex items-center gap-3">
            <a href="{{ route('incidents.show', $ticket) }}"
               title="Kembali ke Detail Aduan Kendala"
               class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-stroke bg-white text-gray-600 shadow-xs transition hover:border-primary hover:bg-gray-50 hover:text-primary dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-white">
                <svg class="h-5 w-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                    Edit Tindak Lanjut Aduan Kendala
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400">Nomor: {{ $ticket->nomor_aduan }}</p>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            <p class="mb-1 font-medium">Perbaiki kesalahan berikut:</p>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-800">
            <h3 class="font-medium text-black dark:text-white">Form Edit Tindak Lanjut ({{ $ticket->nomor_aduan }})</h3>
        </div>

        <div class="p-6.5">
            <form action="{{ route('incidents.updateResolution', $ticket) }}" method="POST" enctype="multipart/form-data"
                  x-data="{
                      jenis: @js(old('jenis_penyelesaian', $res->jenis_penyelesaian ?? 'mandiri'))
                  }">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label class="{{ $label }}">Jenis Penyelesaian</label>
                    <input type="hidden" name="jenis_penyelesaian" :value="jenis">
                    <div class="inline-flex rounded-lg border border-stroke p-1 dark:border-gray-800">
                        <button type="button" @click="jenis = 'mandiri'"
                                :class="jenis === 'mandiri' ? 'bg-green-700 text-white' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-meta-4'"
                                class="rounded-md px-6 py-2 text-sm font-medium transition">mandiri</button>
                        <button type="button" @click="jenis = 'Pihak ke-3'"
                                :class="jenis === 'Pihak ke-3' ? 'bg-green-700 text-white' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-meta-4'"
                                class="rounded-md px-6 py-2 text-sm font-medium transition">Pihak ke-3</button>
                    </div>
                    @error('jenis_penyelesaian') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                </div>

                <div x-show="jenis === 'Pihak ke-3'" x-transition class="mb-5 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-base font-semibold text-black dark:text-white">Detail Pihak ke-3</h4>
                    
                    {{-- Surat Permohonan Perbaikan (Pihak ke-3) PDF --}}
                    <div class="mb-4.5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 rounded-xl border border-blue-200 bg-blue-50/80 p-4 dark:border-blue-900/40 dark:bg-blue-950/20">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8" stroke-width="2"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-blue-900 dark:text-blue-300">Surat Permohonan Perbaikan (Pihak ke-3)</h4>
                                <p class="text-xs text-blue-700/80 dark:text-blue-400/80">Dokumen PDF resmi perbaikan BMN oleh pihak ketiga</p>
                            </div>
                        </div>
                        <a href="{{ route('incidents.justifikasi', $ticket) }}" target="_blank"
                           class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-blue-700 shadow-xs">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Unduh Surat PDF
                        </a>
                    </div>

                    <div>
                        <label class="{{ $label }}">Upload Surat Justifikasi (PDF/DOC, maks 5 MB)</label>
                        <input type="file" name="file_surat_justifikasi" class="{{ $input }} !py-2">
                        @if($res?->file_surat_justifikasi)
                            <p class="mt-1 text-xs text-success">
                                File saat ini:
                                <a href="{{ asset('storage/' . $res->file_surat_justifikasi) }}" target="_blank" class="underline">Lihat file</a>
                            </p>
                        @endif
                        @error('file_surat_justifikasi') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-5 grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                    <div>
                        <label class="{{ $label }}">Tgl Analisa <span class="text-xs font-normal text-gray-500">(opsional)</span></label>
                        <x-form.date-picker id="tgl_analisa" name="tgl_analisa" :defaultDate="old('tgl_analisa', $res?->tgl_analisa?->format('Y-m-d') ?? date('Y-m-d'))" placeholder="Pilih Tanggal Analisa" />
                        @error('tgl_analisa') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="{{ $label }}">Pemeriksa <span class="text-meta-1">*</span></label>
                        <select name="pemeriksa_id" class="{{ $input }}">
                            @foreach($pemeriksas as $p)
                                <option value="{{ $p->id }}" @selected(old('pemeriksa_id', $res->pemeriksa_id ?? $user->id) == $p->id)>
                                    {{ $p->nip }} || {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('pemeriksa_id') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-5">
                    <label class="{{ $label }}">Analisa Tim Teknis <span class="text-xs font-normal text-gray-500">(opsional)</span></label>
                    <textarea name="analisa_teknis" rows="3" placeholder="Deskripsi analisa masalah oleh tim teknis (opsional)..." class="{{ $input }}">{{ old('analisa_teknis', $res->analisa_teknis ?? '') }}</textarea>
                    @error('analisa_teknis') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5 sm:w-1/2 sm:pr-2.25">
                    <label class="{{ $label }}">Tgl Tindak Lanjut <span class="text-meta-1">*</span></label>
                    <x-form.date-picker id="tgl_tindak_lanjut" name="tgl_tindak_lanjut" :defaultDate="old('tgl_tindak_lanjut', $res?->tgl_tindak_lanjut?->format('Y-m-d') ?? date('Y-m-d'))" placeholder="Pilih Tanggal Tindak Lanjut" />
                    @error('tgl_tindak_lanjut') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label class="{{ $label }}">Tindak Lanjut Tim Teknis <span class="text-meta-1">*</span></label>
                    <textarea name="tindak_lanjut_teknis" rows="3" placeholder="Tindakan atau perbaikan teknis yang dilakukan..." class="{{ $input }}">{{ old('tindak_lanjut_teknis', $res->tindak_lanjut_teknis ?? '') }}</textarea>
                    @error('tindak_lanjut_teknis') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5 sm:w-1/2 sm:pr-2.25">
                    <label class="{{ $label }}">Tgl Hasil</label>
                    <x-form.date-picker id="tgl_hasil" name="tgl_hasil" :defaultDate="old('tgl_hasil', $res?->tgl_hasil?->format('Y-m-d'))" placeholder="Pilih Tanggal Hasil" />
                    @error('tgl_hasil') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-6">
                    <label class="{{ $label }}">Hasil</label>
                    <textarea name="hasil" rows="3" class="{{ $input }}">{{ old('hasil', $res->hasil ?? '') }}</textarea>
                    @error('hasil') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-stroke pt-5 dark:border-gray-800 sm:flex-row sm:justify-end">
                    <a href="{{ route('incidents.show', $ticket) }}"
                       class="inline-flex items-center justify-center rounded-lg border border-stroke px-5 py-2.5 text-sm font-medium text-black transition hover:bg-gray-100 dark:border-gray-800 dark:text-white dark:hover:bg-meta-4">
                        Batal
                    </a>
                    <button type="submit"
                            class="inline-flex items-center justify-center rounded-lg bg-green-700 px-8 py-2.5 text-sm font-medium text-white transition hover:bg-opacity-90">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
