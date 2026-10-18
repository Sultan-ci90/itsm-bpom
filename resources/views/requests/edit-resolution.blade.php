@extends('layouts.app')

@section('content')
@php
    $user     = auth()->user();
    $res      = $req->resolution;

    $input = 'w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white';
    $label = 'mb-2.5 block text-sm font-medium text-black dark:text-white';
@endphp

<div class="mx-auto max-w-4xl space-y-6">

    {{-- Header, Breadcrumb & Back Navigation --}}
    <div class="space-y-3">
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
                    <a href="{{ route('requests.index') }}" class="transition hover:text-primary">
                        {{ auth()->user()->isTeknisi() || auth()->user()->isAdmin() ? 'Permintaan Layanan' : 'Request Saya' }}
                    </a>
                </li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li>
                    <a href="{{ route('requests.show', $req->id) }}" class="transition hover:text-primary">
                        {{ $req->nomor_request }}
                    </a>
                </li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li class="font-medium text-gray-800 dark:text-white/90">
                    Edit Tindak Lanjut
                </li>
            </ol>
        </nav>

        {{-- Baris Judul & Tombol Kembali di Sebelah Kiri Judul --}}
        <div class="flex items-center gap-3">
            <a href="{{ route('requests.show', $req->id) }}"
               title="Kembali ke Detail Request"
               class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-stroke bg-white text-gray-600 shadow-xs transition hover:border-primary hover:bg-gray-50 hover:text-primary dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-white">
                <svg class="h-5 w-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                    Edit Tindak Lanjut Permintaan
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400">Nomor: {{ $req->nomor_request }}</p>
            </div>
        </div>
    </div>

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

    <div class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex items-center justify-between border-b border-stroke px-6.5 py-4 dark:border-gray-800">
            <h3 class="font-medium text-black dark:text-white">
                Perbarui Tindak Lanjut
            </h3>
        </div>

        <div class="p-6.5">
            <form action="{{ route('requests.updateResolution', $req->id) }}" method="POST"
                  x-data="{
                      layanan: @js($req->layanan)
                  }">
                @csrf
                @method('PUT')

                <div class="mb-5 grid grid-cols-1 gap-4.5 sm:grid-cols-2">
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

                    <div class="sm:pr-2.25">
                        <label class="{{ $label }}">Tanggal Tindak Lanjut <span class="text-meta-1">*</span></label>
                        <input type="date" name="tgl_tindak_lanjut" 
                               value="{{ old('tgl_tindak_lanjut', $res?->tgl_tindak_lanjut?->format('Y-m-d') ?? date('Y-m-d')) }}" 
                               class="{{ $input }}">
                        @error('tgl_tindak_lanjut') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                @if(in_array($req->layanan, ['reset_password', 'tambah_akun', 'akun']))
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
                                       inputmode="numeric"
                                       oninput="this.value = this.value.replace(/[^0-9\s-]/g, '')"
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

                <div class="mb-5">
                    <label class="{{ $label }}">
                        Tindakan yang Dilakukan / Solusi Tim IT <span class="text-meta-1">*</span>
                    </label>
                    <textarea name="tindak_lanjut" rows="3" 
                              placeholder="Jelaskan tindakan apa yang telah dilakukan tim IT untuk menyelesaikan permintaan ini..." 
                              class="{{ $input }}">{{ old('tindak_lanjut', $res?->tindak_lanjut ?? '') }}</textarea>
                    @error('tindak_lanjut') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-stroke pt-5 dark:border-gray-800 sm:flex-row sm:justify-end">
                    <a href="{{ route('requests.show', $req->id) }}"
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
