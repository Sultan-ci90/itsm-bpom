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
        'Lokasi'           => $ticket->asset->lokasi ?? '-',
        'Kode Barang'      => ($ticket->asset->kode_barang ?? '-') . ' / NUP ' . ($ticket->asset->nup ?? '-'),
        'Nama Perangkat'   => $ticket->asset->nama_barang ?? '-',
        'Tgl Pelaporan'    => $ticket->tgl_pelaporan->format('d/m/Y'),
        'Pelapor'          => ($ticket->pelapor->nip ?? '-') . ' || ' . ($ticket->pelapor->nama ?? '-'),
        'Bidang'           => $ticket->pelapor->bidang->nama_bidang ?? '-',
        'Penanggung Jawab' => $ticket->asset->penanggungJawab->nama ?? '-',
    ];

    // Detail service (read-only) tampil jika ada resolusi dan tiket sudah final / dilihat pelapor
    $showDetail = $res && ($isFinal || !$isStaff);
@endphp

<div class="mx-auto max-w-4xl">

    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">Detail Aduan</h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li><a class="font-medium text-primary" href="{{ route('dashboard') }}">Dashboard /</a></li>
                <li><a class="font-medium text-primary" href="{{ route('incidents.index') }}">Incident /</a></li>
                <li class="font-medium text-gray-500">{{ $ticket->nomor_aduan }}</li>
            </ol>
        </nav>
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
                <h3 class="font-medium text-black dark:text-white">Informasi Aduan</h3>
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
        @if($isStaff && !$isFinal)
        <div id="proses" class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-800">
                <h3 class="font-medium text-black dark:text-white">Proses Tiket</h3>
            </div>

            <div class="p-6.5">
                <form action="{{ route('incidents.update', $ticket) }}" method="POST" enctype="multipart/form-data"
                      x-data="{
                          jenis: @js(old('jenis_penyelesaian', $res->jenis_penyelesaian ?? 'Internal')),
                          status: @js(old('status', $ticket->status === 'Belum diperiksa' ? 'Sedang diproses' : $ticket->status))
                      }">
                    @csrf
                    @method('PUT')

                    <div class="mb-5 grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        {{-- Status --}}
                        <div>
                            <label class="{{ $label }}">Status</label>
                            <select name="status" x-model="status" class="{{ $input }}">
                                <option value="Sedang diproses">Sedang diproses</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                            @error('status') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Jenis penyelesaian (segmented toggle) --}}
                        <div>
                            <label class="{{ $label }}">Jenis Penyelesaian</label>
                            <input type="hidden" name="jenis_penyelesaian" :value="jenis">
                            <div class="inline-flex rounded-lg border border-stroke p-1 dark:border-gray-800">
                                <button type="button" @click="jenis = 'Internal'"
                                        :class="jenis === 'Internal' ? 'bg-green-700 text-white' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-meta-4'"
                                        class="rounded-md px-6 py-2 text-sm font-medium transition">Internal</button>
                                <button type="button" @click="jenis = 'Pihak ke-3'"
                                        :class="jenis === 'Pihak ke-3' ? 'bg-green-700 text-white' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-meta-4'"
                                        class="rounded-md px-6 py-2 text-sm font-medium transition">Pihak ke-3</button>
                            </div>
                            @error('jenis_penyelesaian') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Pihak ke-3: vendor, biaya, surat --}}
                    <div x-show="jenis === 'Pihak ke-3'" x-transition class="mb-5 rounded-lg border border-stroke p-5 dark:border-gray-800">
                        <h4 class="mb-4 text-base font-semibold text-black dark:text-white">Detail Pihak ke-3</h4>
                        <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                            <div>
                                <label class="{{ $label }}">Nama Vendor</label>
                                <input type="text" name="vendor" value="{{ old('vendor', $res->vendor ?? '') }}" class="{{ $input }}">
                                @error('vendor') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="{{ $label }}">Estimasi Biaya (Rp)</label>
                                <input type="number" name="estimasi_biaya" min="0" step="any" value="{{ old('estimasi_biaya', $res->estimasi_biaya ?? '') }}" class="{{ $input }}">
                                @error('estimasi_biaya') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="sm:col-span-2">
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
                    </div>

                    {{-- Analisa --}}
                    <div class="mb-5 grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        <div>
                            <label class="{{ $label }}">Tgl Analisa</label>
                            <input type="date" name="tgl_analisa" value="{{ old('tgl_analisa', $res?->tgl_analisa?->format('Y-m-d') ?? date('Y-m-d')) }}" class="{{ $input }}">
                            @error('tgl_analisa') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="{{ $label }}">Pemeriksa</label>
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
                        <label class="{{ $label }}">Analisa Tim Teknis</label>
                        <textarea name="analisa_teknis" rows="3" class="{{ $input }}">{{ old('analisa_teknis', $res->analisa_teknis ?? '') }}</textarea>
                        @error('analisa_teknis') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tindak lanjut --}}
                    <div class="mb-5 sm:w-1/2 sm:pr-2.25">
                        <label class="{{ $label }}">Tgl Tindak Lanjut</label>
                        <input type="date" name="tgl_tindak_lanjut" value="{{ old('tgl_tindak_lanjut', $res?->tgl_tindak_lanjut?->format('Y-m-d') ?? date('Y-m-d')) }}" class="{{ $input }}">
                        @error('tgl_tindak_lanjut') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-5">
                        <label class="{{ $label }}">Tindak Lanjut Tim Teknis</label>
                        <textarea name="tindak_lanjut_teknis" rows="3" class="{{ $input }}">{{ old('tindak_lanjut_teknis', $res->tindak_lanjut_teknis ?? '') }}</textarea>
                        @error('tindak_lanjut_teknis') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Hasil --}}
                    <div class="mb-5 sm:w-1/2 sm:pr-2.25">
                        <label class="{{ $label }}">Tgl Hasil <span class="text-xs font-normal text-gray-500" x-show="status === 'Selesai'">(wajib)</span></label>
                        <input type="date" name="tgl_hasil" value="{{ old('tgl_hasil', $res?->tgl_hasil?->format('Y-m-d')) }}" class="{{ $input }}">
                        @error('tgl_hasil') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="{{ $label }}">Hasil <span class="text-xs font-normal text-gray-500" x-show="status === 'Selesai'">(wajib)</span></label>
                        <textarea name="hasil" rows="3" class="{{ $input }}">{{ old('hasil', $res->hasil ?? '') }}</textarea>
                        @error('hasil') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="flex flex-col-reverse gap-3 border-t border-stroke pt-5 dark:border-gray-800 sm:flex-row sm:justify-end">
                        <template x-if="jenis === 'Pihak ke-3'">
                            @if($res && $res->jenis_penyelesaian === 'Pihak ke-3')
                                <a href="{{ route('incidents.justifikasi', $ticket) }}" target="_blank"
                                   class="inline-flex items-center justify-center rounded-lg bg-black px-5 py-2.5 text-sm font-medium text-white transition hover:bg-opacity-90 dark:bg-meta-4">
                                    Generate Surat Justifikasi
                                </a>
                            @else
                                <span class="inline-flex cursor-not-allowed items-center justify-center rounded-lg bg-gray-200 px-5 py-2.5 text-sm font-medium text-gray-500 dark:bg-meta-4"
                                      title="Simpan data Pihak ke-3 terlebih dahulu">
                                    Generate Surat Justifikasi (simpan dulu)
                                </span>
                            @endif
                        </template>
                        <button type="submit"
                                class="inline-flex items-center justify-center rounded-lg bg-green-700 px-8 py-2.5 text-sm font-medium text-white transition hover:bg-opacity-90">
                            Simpan
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
                    <div>
                        <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Vendor</dt>
                        <dd class="text-black dark:text-white">{{ $res->vendor ?: '-' }}</dd>
                    </div>
                    <div>
                        <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Estimasi Biaya</dt>
                        <dd class="text-black dark:text-white">{{ !is_null($res->estimasi_biaya) ? 'Rp ' . number_format($res->estimasi_biaya, 0, ',', '.') : '-' }}</dd>
                    </div>
                    @if($isStaff && $res->file_surat_justifikasi)
                        <div class="sm:col-span-2">
                            <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Surat Justifikasi</dt>
                            <dd><a href="{{ asset('storage/' . $res->file_surat_justifikasi) }}" target="_blank" class="text-primary underline">Lihat file</a></dd>
                        </div>
                    @endif
                @endif

                <div class="sm:col-span-2">
                    <dt class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Analisis Tim Teknis</dt>
                    <dd class="whitespace-pre-line text-black dark:text-white">{{ $res->analisa_teknis ?: '-' }}</dd>
                </div>
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