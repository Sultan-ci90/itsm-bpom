@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-5xl">
    {{-- Header & Breadcrumb --}}
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">
            Detail Aduan: {{ $ticket->nomor_aduan }}
        </h2>
        <a href="{{ route('incidents.index') }}" class="text-primary hover:underline text-sm">&larr; Kembali ke Daftar</a>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- KOLOM KIRI: Info Tiket & Aset --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03] p-6">
                <h3 class="mb-4 text-lg font-medium text-black dark:text-white">Informasi Kendala</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div><span class="font-medium text-gray-500">Pelapor:</span> <br> {{ $ticket->pelapor->nama }} ({{ $ticket->pelapor->bidang->nama_bidang ?? '-' }})</div>
                    <div><span class="font-medium text-gray-500">Tanggal Lapor:</span> <br> {{ $ticket->tgl_pelaporan->format('d M Y') }}</div>
                    <div class="col-span-2">
                        <span class="font-medium text-gray-500">Aset Bermasalah:</span> <br> 
                        {{ $ticket->asset->nama_barang }} <span class="text-xs text-gray-400">({{ $ticket->asset->kode_barang }} / NUP: {{ $ticket->asset->nup }})</span>
                        <br> <span class="text-xs">Lokasi: {{ $ticket->asset->lokasi }}</span>
                    </div>
                    <div class="col-span-2">
                        <span class="font-medium text-gray-500">Deskripsi Masalah:</span> <br> 
                        <p class="text-gray-800 dark:text-gray-200 whitespace-pre-line">{{ $ticket->deskripsi_masalah }}</p>
                    </div>
                    @if($ticket->foto_kendala)
                    <div class="col-span-2">
                        <span class="font-medium text-gray-500">Foto Kendala:</span> <br>
                        <img src="{{ asset('storage/' . $ticket->foto_kendala) }}" alt="Foto Kendala" class="mt-2 max-h-64 rounded border border-stroke">
                    </div>
                    @endif
                </div>
            </div>

            {{-- FORM PROSES TEKNISI (Hanya muncul untuk Teknisi/Admin dan tiket belum selesai) --}}
            @if((auth()->user()->isTeknisi() || auth()->user()->isAdmin()) && !in_array($ticket->status, ['Selesai', 'Ditolak']))
            <div class="rounded-2xl border border-primary bg-white shadow-default dark:border-primary dark:bg-white/[0.03] p-6">
                <h3 class="mb-4 text-lg font-medium text-primary">Form Proses & Tindak Lanjut</h3>
                
                <form action="{{ route('incidents.update', $ticket) }}" method="POST" enctype="multipart/form-data" 
                      x-data="{ jenis: '{{ old('jenis_penyelesaian', $ticket->resolution?->jenis_penyelesaian ?? 'Internal') }}', status: '{{ old('status', $ticket->status) }}' }">
                    @csrf
                    @method('PUT')

                    <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-black dark:text-white">Update Status</label>
                            <select name="status" x-model="status" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:bg-gray-900 dark:text-white">
                                <option value="Sedang diproses">Sedang diproses</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-black dark:text-white">Jenis Penyelesaian</label>
                            <select name="jenis_penyelesaian" x-model="jenis" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:bg-gray-900 dark:text-white">
                                <option value="Internal">Internal IT</option>
                                <option value="Pihak ke-3">Pihak ke-3 (Vendor)</option>
                            </select>
                        </div>
                    </div>

                    {{-- Conditional Fields: Pihak ke-3 --}}
                    <div x-show="jenis === 'Pihak ke-3'" x-transition class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2 p-4 bg-gray-50 dark:bg-black/20 rounded-lg border border-stroke">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-black dark:text-white">Nama Vendor</label>
                            <input type="text" name="vendor" value="{{ old('vendor', $ticket->resolution?->vendor) }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 dark:bg-gray-900">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-black dark:text-white">Estimasi Biaya (Rp)</label>
                            <input type="number" name="estimasi_biaya" value="{{ old('estimasi_biaya', $ticket->resolution?->estimasi_biaya) }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 dark:bg-gray-900">
                        </div>
                        <div class="md:col-span-2">
                            <label class="mb-2 block text-sm font-medium text-black dark:text-white">Surat Justifikasi (PDF/Doc)</label>
                            <input type="file" name="file_surat_justifikasi" class="w-full rounded-lg border-[1.5px] border-stroke py-2 px-4 dark:bg-gray-900">
                            @if($ticket->resolution?->file_surat_justifikasi)
                                <p class="text-xs text-green-600 mt-1">File saat ini: <a href="{{ asset('storage/'.$ticket->resolution->file_surat_justifikasi) }}" target="_blank" class="underline">Lihat File</a></p>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium">Tgl Analisa</label>
                            <input type="date" name="tgl_analisa" value="{{ old('tgl_analisa', $ticket->resolution?->tgl_analisa?->format('Y-m-d') ?? date('Y-m-d')) }}" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900" required>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium">Tgl Tindak Lanjut</label>
                            <input type="date" name="tgl_tindak_lanjut" value="{{ old('tgl_tindak_lanjut', $ticket->resolution?->tgl_tindak_lanjut?->format('Y-m-d') ?? date('Y-m-d')) }}" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2 block text-sm font-medium">Analisa Teknis</label>
                        <textarea name="analisa_teknis" rows="3" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900" required>{{ old('analisa_teknis', $ticket->resolution?->analisa_teknis) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2 block text-sm font-medium">Tindak Lanjut Teknis</label>
                        <textarea name="tindak_lanjut_teknis" rows="3" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900" required>{{ old('tindak_lanjut_teknis', $ticket->resolution?->tindak_lanjut_teknis) }}</textarea>
                    </div>

                    {{-- Conditional Fields: Hasil (Muncul jika status = Selesai) --}}
                    <div x-show="status === 'Selesai'" x-transition class="mb-4 p-4 bg-green-50 dark:bg-green-900/10 rounded-lg border border-green-200 dark:border-green-800">
                        <div class="mb-4">
                            <label class="mb-2 block text-sm font-medium text-green-800 dark:text-green-300">Tanggal Selesai</label>
                            <input type="date" name="tgl_hasil" value="{{ old('tgl_hasil', $ticket->resolution?->tgl_hasil?->format('Y-m-d') ?? date('Y-m-d')) }}" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-green-800 dark:text-green-300">Hasil Akhir / Kesimpulan</label>
                            <textarea name="hasil" rows="3" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900">{{ old('hasil', $ticket->resolution?->hasil) }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-primary py-3 px-8 text-center font-medium text-white hover:bg-opacity-90">
                            Simpan Tindak Lanjut
                        </button>
                    </div>
                </form>
            </div>
            @elseif($ticket->resolution && in_array($ticket->status, ['Selesai', 'Ditolak']))
            {{-- Tampilkan Resume Hasil jika tiket sudah selesai --}}
            <div class="rounded-2xl border border-green-500 bg-green-50 dark:bg-green-900/10 p-6">
                <h3 class="mb-4 text-lg font-medium text-green-800 dark:text-green-300">Resume Penyelesaian</h3>
                <p class="text-sm mb-2"><strong>Jenis:</strong> {{ $ticket->resolution->jenis_penyelesaian }} {{ $ticket->resolution->vendor ? '('.$ticket->resolution->vendor.')' : '' }}</p>
                <p class="text-sm mb-2"><strong>Hasil:</strong> {{ $ticket->resolution->hasil ?? '-' }}</p>
            </div>
            @endif
        </div>

        {{-- KOLOM KANAN: Timeline History --}}
        <div class="lg:col-span-1">
            <div class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03] p-6 sticky top-4">
                <h3 class="mb-4 text-lg font-medium text-black dark:text-white">Riwayat Tiket</h3>
                <div class="relative border-l-2 border-gray-200 dark:border-gray-700 ml-3 space-y-6">
                    @foreach($ticket->histories as $history)
                    <div class="relative pl-6">
                        <span class="absolute -left-[9px] top-1 flex h-4 w-4 items-center justify-center rounded-full bg-primary ring-4 ring-white dark:ring-boxdark"></span>
                        <p class="text-sm font-semibold text-black dark:text-white">{{ ucfirst($history->status_label) }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">{{ $history->created_at->format('d M Y, H:i') }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $history->keterangan }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection