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
        'lainnya'    => 'Lainnya (Permintaan Layanan Umum)',
        'zoom'       => 'Link Zoom Meeting',
        'akun'       => 'Reset Password / Akun Aplikasi',
        'peminjaman' => 'Peminjaman Perangkat IT',
        'konsultasi' => 'Konsultasi / Asistensi IT',
        'operator'   => 'Operator Kegiatan',
    ];

    $input = 'w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white';
    $label = 'mb-2.5 block text-sm font-medium text-black dark:text-white';

    // Detail resolusi ditampilkan jika ada data resolusi
    $showResolutionDetail = (bool) $res;
@endphp

<div class="mx-auto max-w-4xl space-y-6">

    {{-- Header & Breadcrumb --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                Detail Permintaan Layanan
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Nomor: {{ $req->nomor_request }}</p>
        </div>
        <a href="{{ route('requests.index') }}" class="inline-flex items-center text-sm font-medium text-primary hover:underline">
            &larr; Kembali ke Daftar Request
        </a>
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
                    <dt class="mb-1 font-medium text-gray-500 dark:text-gray-400">Nomor Request</dt>
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
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Bentuk Ruangan:</dt>
                            <dd class="text-black dark:text-white">{{ $req->detailZoom->bentuk_ruangan ?? '-' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Jumlah Kursi:</dt>
                            <dd class="text-black dark:text-white">{{ $req->detailZoom->jumlah_kursi ? $req->detailZoom->jumlah_kursi . ' Orang' : '-' }}</dd>
                        </div>
                    </dl>
                </div>
            @endif

            {{-- Detail Spesifik: Akun --}}
            @if($req->layanan === 'akun' && $req->detailAkun)
                <div class="mt-6 border-t border-stroke pt-5 dark:border-gray-800">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wider text-gray-700 dark:text-gray-300">Rincian Pengajuan Akun:</h4>
                    <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2 text-sm">
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Jenis Pengajuan:</dt>
                            <dd class="font-medium text-black dark:text-white">{{ $req->detailAkun->jenis_pengajuan }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Sistem Tujuan:</dt>
                            <dd class="font-medium text-black dark:text-white">{{ $req->detailAkun->sistem_tujuan }}</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-gray-500 dark:text-gray-400">NIP Terkait:</dt>
                            <dd class="text-black dark:text-white">{{ $req->detailAkun->nip_terkait }}</dd>
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
                <span>📋 Hasil Tindak Lanjut Tim IT</span>
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
            @if($req->layanan === 'akun' && ($res->akun_password_baru || $res->akun_instruksi_login))
            <div class="sm:col-span-2 rounded-xl border border-blue-200 bg-blue-50/70 p-5 dark:border-blue-900/50 dark:bg-blue-950/20 space-y-3">
                <h4 class="font-semibold text-primary dark:text-blue-400 flex items-center gap-2">
                    <span>🔑 Kredensial Akun Baru</span>
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
                    <span>🎥 Link & Informasi Zoom Meeting</span>
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
                <h4 class="font-semibold text-black dark:text-white">📦 Catatan Penyerahan & Pengembalian:</h4>
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
    {{-- 3. FORM TINDAK LANJUT TIM IT (BAGIAN BAWAH)               --}}
    {{-- Hanya tampil untuk Teknisi / Admin                        --}}
    {{-- ========================================================= --}}
    @if($isStaff)
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
                @if($req->layanan === 'akun')
                <div class="mb-5 rounded-xl border border-stroke bg-gray-50/50 p-5 dark:border-gray-800 dark:bg-gray-900/40">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wider text-black dark:text-white flex items-center gap-1.5">
                        <span>🔑 Output Akun / Reset Password:</span>
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
                        <span>🎥 Informasi Link Zoom Meeting:</span>
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
                        📦 Penyerahan & Pengembalian Perangkat:
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