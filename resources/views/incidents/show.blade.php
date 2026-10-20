@extends('layouts.app')

@section('content')
@php
    $user    = auth()->user();
    $isStaff = $user->isTeknisi() || $user->isAdmin();
    $isFinal = in_array($ticket->status, ['Selesai', 'Ditolak']);
    $res     = $ticket->resolution;

    $badge = [
        'Belum diperiksa' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-800/20 dark:text-yellow-400',
        'Sedang diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
        'Selesai'         => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
        'Ditolak'         => 'bg-red-100 text-red-700 dark:bg-red-800/20 dark:text-red-400',
    ];

    $chip = [
        'aduan dibuat'            => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
        'status diubah'           => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
        'tindak lanjut diperbarui'=> 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400  ',
        'data diperbarui'         => 'bg-primary/10 text-primary',
    ];

    $input = 'w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white';
    $label = 'mb-2.5 block text-sm font-medium text-black dark:text-white';

    $info = [
        'Nomor Aduan'      => $ticket->nomor_aduan,
        'Tgl Pelaporan'    => $ticket->tgl_pelaporan->format('d/m/Y'),
        'Nama Perangkat'   => $ticket->asset->nama_barang ?? '-',
        'Kode Barang'      => ($ticket->asset->kode_barang ?? '-') . ' / NUP ' . ($ticket->asset->nup ?? '-'),
        'Pelapor'          => ($ticket->pelapor->nip ?? '-') . ' || ' . ($ticket->pelapor->nama ?? '-'),
        'Bidang'           => $ticket->pelapor->bidang->nama_bidang ?? '-',
        'Lokasi'           => $ticket->asset->lokasi ?? '-',
        'Penanggung Jawab' => $ticket->asset->penanggungJawab->nama ?? '-',
    ];

    // Detail service (read-only) tampil jika ada resolusi dan tiket sudah final / dilihat pelapor
    // Mode proses (dibuka lewat tombol penindakan)
    $isProsesMode = request()->boolean('proses') || request('proses') == '1';

    // Detail service (read-only) tampil jika ada resolusi dan (tiket sudah final / dilihat pelapor / sedang mode detail)
    $showDetail = $res && ($isFinal || !$isStaff || !$isProsesMode);
@endphp

<div class="mx-auto max-w-4xl">

    {{-- Header, Breadcrumb & Back Navigation --}}
    <div class="mb-6 space-y-3">
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
                    <a href="{{ route('incidents.index') }}" class="transition hover:text-primary">
                        {{ $isStaff ? 'Semua Aduan Kendala' : 'Aduan Kendala Saya' }}
                    </a>
                </li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li class="font-medium text-gray-800 dark:text-white/90">
                    {{ $ticket->nomor_aduan }}
                </li>
            </ol>
        </nav>

        {{-- Baris Judul & Tombol Kembali di Sebelah Kiri Judul --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('incidents.index') }}"
                   title="Kembali ke Daftar Aduan Kendala"
                   class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-stroke bg-white text-gray-600 shadow-xs transition hover:border-primary hover:bg-gray-50 hover:text-primary dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="h-5 w-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                        Detail Aduan Kendala
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Nomor: {{ $ticket->nomor_aduan }}</p>
                </div>
            </div>

            @if($isStaff && !$isFinal)
                <div>
                    @if(!$isProsesMode)
                        <a href="{{ route('incidents.show', $ticket) }}?proses=1#proses"
                           class="inline-flex items-center gap-2 rounded-lg bg-green-700 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-opacity-90">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/><path d="M9 14l2 2 4-4"/>
                            </svg>
                            Tindak Lanjuti / Proses Tiket
                        </a>
                    @else
                        <a href="{{ route('incidents.show', $ticket) }}"
                           class="inline-flex items-center gap-2 rounded-lg border border-stroke px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-meta-4">
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
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            {{ session('error') }}
        </div>
    @endif
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

    <div class="space-y-6">

        {{-- 1. INFORMASI ADUAN --}}
        <div class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex items-center justify-between border-b border-stroke px-6.5 py-4 dark:border-gray-800">
                <h3 class="font-medium text-black dark:text-white">Informasi Barang</h3>
                <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $badge[$ticket->status] ?? $badge['Ditolak'] }}">
                    {{ $ticket->status }}
                </span>
            </div>
            <div class="p-6.5">
                <dl class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                    @foreach($info as $k => $v)
                        <div>
                            <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $k }}</dt>
                            <dd class="text-black dark:text-white">{{ $v }}</dd>
                        </div>
                    @endforeach
                    <div class="sm:col-span-2">
                        <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi Masalah</dt>
                        <dd class="whitespace-pre-line text-black dark:text-white">{{ $ticket->deskripsi_masalah }}</dd>
                    </div>
                </dl>

                @if($ticket->foto_kendala)
                    <div class="mt-5">
                        <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Foto Kendala</p>
                        <img src="{{ asset('storage/' . $ticket->foto_kendala) }}" alt="Foto Kendala"
                             class="max-h-72 rounded-lg border border-stroke dark:border-gray-800">
                    </div>
                @endif
            </div>
        </div>

        {{-- 2. FORM PROSES TIKET (teknisi/admin, tiket belum final) --}}
        @if($isStaff && !$isFinal && $isProsesMode)
        <div id="proses" class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-800">
                <h3 class="font-medium text-black dark:text-white">Proses Tiket</h3>
            </div>

            <div class="p-6.5">
                                <form action="{{ route('incidents.update', $ticket) }}" method="POST"
                      x-data="{
                          jenis: @js(old('jenis_penyelesaian', $res->jenis_penyelesaian ?? 'mandiri'))
                      }">
                    @csrf
                    @method('PUT')

                    {{-- Info status berjalan --}}
                    <div class="mb-5 flex items-center justify-between rounded-lg border border-stroke bg-gray-50/50 p-3.5 dark:border-gray-800 dark:bg-white/[0.02]">
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Status Saat Ini:</span>
                            <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-medium 
                                {{ $ticket->status === 'Selesai' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' }}">
                                {{ $ticket->status }}
                            </span>
                        </div>
                        <span class="text-xs text-gray-400">Isi analisa & tindak lanjut untuk draft, atau lengkapi hasil untuk menyelesaikan.</span>
                    </div>

                    {{-- Bagian 1: Analisa & Tindak Lanjut --}}
                    <div class="mb-4">
                        <h4 class="text-xs font-semibold uppercase tracking-wider text-primary">1. Analisa & Tindak Lanjut</h4>
                    </div>

                    {{-- Analisa --}}
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

                    {{-- Tindak lanjut --}}
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

                    {{-- Jenis penyelesaian (segmented toggle) --}}
                    <div class="mb-5">
                        <label class="{{ $label }}">Jenis Penyelesaian <span class="text-xs font-normal text-gray-500">(pilih mandiri atau perbaikan ke pihak ke-3)</span></label>
                        <input type="hidden" name="jenis_penyelesaian" :value="jenis">
                        <div class="inline-flex rounded-lg border border-stroke p-1 dark:border-gray-800">
                            <button type="button" @click="jenis = 'mandiri'"
                                    :class="jenis === 'mandiri' ? 'bg-green-700 text-white' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-meta-4'"
                                    class="rounded-md px-6 py-2 text-sm font-medium transition cursor-pointer">mandiri</button>
                            <button type="button" @click="jenis = 'Pihak ke-3'"
                                    :class="jenis === 'Pihak ke-3' ? 'bg-green-700 text-white' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-meta-4'"
                                    class="rounded-md px-6 py-2 text-sm font-medium transition cursor-pointer">Pihak ke-3</button>
                        </div>
                        @error('jenis_penyelesaian') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Boks Biru Pihak ke-3 --}}
                    <div x-show="jenis === 'Pihak ke-3'" x-cloak x-transition 
                         class="mb-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 rounded-xl border border-blue-200 bg-blue-50 p-5 dark:border-blue-800/40 dark:bg-blue-900/20">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-800/30 dark:text-blue-400">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-blue-900 dark:text-blue-300">Surat Permohonan Perbaikan</h4>
                                <p class="text-xs text-blue-700 dark:text-blue-400/80">Otomatis di-generate oleh sistem</p>
                            </div>
                        </div>
                        <a href="{{ route('incidents.justifikasi', $ticket) }}" target="_blank"
                           class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700 shadow-xs">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            Unduh PDF
                        </a>
                    </div>

                    {{-- Tombol Simpan Draft DI BAWAH JENIS PENYELESAIAN --}}
                    <div class="my-6 rounded-xl border border-amber-200 bg-amber-50/70 p-4 dark:border-amber-900/40 dark:bg-amber-950/20 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="flex h-2 w-2 rounded-full bg-amber-500"></span>
                                <h4 class="text-sm font-semibold text-amber-900 dark:text-amber-300">Simpan Draft (Sedang Diproses)</h4>
                            </div>
                            <p class="mt-1 text-xs text-amber-700/80 dark:text-amber-400/80">Simpan analisa, tindak lanjut, serta jenis penyelesaian terlebih dahulu jika perbaikan/hasil masih dalam proses atau memerlukan waktu (misal: dibawa ke pihak ke-3).</p>
                        </div>
                        <button type="submit" name="action_type" value="draft"
                                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-amber-500 px-6 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-400 cursor-pointer">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                            Simpan Draft
                        </button>
                    </div>

                    <div class="mb-4 pt-3 border-t border-stroke dark:border-gray-800">
                        <h4 class="text-xs font-semibold uppercase tracking-wider text-primary">2. Penyelesaian & Hasil Akhir</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Lengkapi bagian ini apabila perbaikan telah tuntas dan tiket siap diselesaikan.</p>
                    </div>

                    {{-- Hasil --}}
                    <div class="mb-5 sm:w-1/2 sm:pr-2.25">
                        <label class="{{ $label }}">Tgl Hasil <span class="text-meta-1">*</span> <span class="text-xs font-normal text-gray-500">(wajib untuk menyelesaikan)</span></label>
                        <x-form.date-picker id="tgl_hasil" name="tgl_hasil" :defaultDate="old('tgl_hasil', $res?->tgl_hasil?->format('Y-m-d'))" placeholder="Pilih Tanggal Hasil" />
                        @error('tgl_hasil') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="{{ $label }}">Hasil <span class="text-meta-1">*</span> <span class="text-xs font-normal text-gray-500">(wajib untuk menyelesaikan)</span></label>
                        <textarea name="hasil" rows="3" placeholder="Deskripsi hasil perbaikan / penyelesaian akhir..." class="{{ $input }}">{{ old('hasil', $res->hasil ?? '') }}</textarea>
                        @error('hasil') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex flex-col-reverse gap-3 border-t border-stroke pt-5 dark:border-gray-800 sm:flex-row sm:justify-end">
                        <button type="submit" name="action_type" value="selesai"
                                class="inline-flex items-center justify-center gap-2 rounded-lg bg-green-700 px-8 py-2.5 text-sm font-medium text-white transition hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Simpan & Selesaikan Aduan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endif

        {{-- 3. DETAIL SERVICE (read-only) --}}
        @if($showDetail)
        <div class="rounded-2xl border border-primary/20 bg-primary/5 p-6.5 shadow-default dark:border-primary/30 dark:bg-primary/10">
            <h3 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Service</h3>
            <dl class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                <div>
                    <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Jenis Penyelesaian</dt>
                    <dd class="text-black dark:text-white">{{ $res->jenis_penyelesaian }}</dd>
                </div>
                <div>
                    <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Teknisi</dt>
                    <dd class="text-black dark:text-white">{{ $res->pemeriksa ? $res->pemeriksa->nip . ' || ' . $res->pemeriksa->nama : '-' }}</dd>
                </div>
                <div>
                    <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Tgl Analisa</dt>
                    <dd class="text-black dark:text-white">{{ $res->tgl_analisa?->format('d/m/Y') ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Tgl Perbaikan</dt>
                    <dd class="text-black dark:text-white">{{ ($res->tgl_hasil ?? $res->tgl_tindak_lanjut)?->format('d/m/Y') ?? '-' }}</dd>
                </div>

                @if($res->jenis_penyelesaian === 'Pihak ke-3')
                    @if($isStaff && $res->file_surat_justifikasi)
                        <div class="sm:col-span-2">
                            <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Surat Justifikasi</dt>
                            <dd><a href="{{ asset('storage/' . $res->file_surat_justifikasi) }}" target="_blank" class="text-primary underline">Lihat file</a></dd>
                        </div>
                    @endif
                
                    <div class="sm:col-span-2 mt-2">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 rounded-xl border border-blue-200 bg-blue-50/80 p-4 dark:border-blue-900/40 dark:bg-blue-950/20">
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
                    </div>
                @endif


                <div class="sm:col-span-2">
                    <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Tindak Lanjut</dt>
                    <dd class="whitespace-pre-line text-black dark:text-white">{{ $res->tindak_lanjut_teknis ?: '-' }}</dd>
                </div>
                <div class="sm:col-span-2">
                    <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Solusi / Hasil</dt>
                    <dd class="whitespace-pre-line text-black dark:text-white">{{ $res->hasil ?: '-' }}</dd>
                </div>
            </dl>
        </div>
        @endif

        {{-- 4. HISTORY --}}
        <div class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-800">
                <h3 class="font-medium text-black dark:text-white">History</h3>
            </div>
            <div class="p-6.5">
                <div class="space-y-5">
                    @forelse($ticket->histories as $h)
                        <div class="border-l-2 border-stroke pl-4 dark:border-gray-700">
                            <div class="flex items-center justify-between gap-3">
                                <span class="inline-flex rounded-md px-2.5 py-0.5 text-xs font-medium {{ $chip[$h->status_label] ?? 'bg-gray-100 text-gray-600 dark:bg-meta-4 dark:text-gray-300' }}">
                                    {{ ucfirst($h->status_label) }}
                                </span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $h->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <p class="mt-1 text-sm text-black dark:text-white">{{ $h->keterangan }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada riwayat.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('incidents.index') }}"
               class="inline-flex items-center rounded-lg border border-stroke px-5 py-2.5 text-sm font-medium text-black transition hover:bg-gray-100 dark:border-gray-800 dark:text-white dark:hover:bg-meta-4">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection


