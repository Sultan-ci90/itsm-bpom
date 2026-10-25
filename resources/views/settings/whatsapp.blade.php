@extends('layouts.app')

@section('content')
<div class="space-y-6">
    {{-- Breadcrumb & Title --}}
    <div class="space-y-3">
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
                <li class="text-gray-500 dark:text-gray-400">Pengaturan</li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li class="font-medium text-gray-800 dark:text-gray-200">WhatsApp Gateway</li>
            </ol>
        </nav>

        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-title-md2 font-semibold text-gray-900 dark:text-white">
                    Pengaturan WhatsApp Gateway
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    Konfigurasi integrasi Fonnte untuk notifikasi otomatis tiket aduan dan permintaan layanan IT BPOM
                </p>
            </div>
            <a href="https://fonnte.com" target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-1.5 rounded-xl border border-gray-200 bg-white px-3.5 py-2 text-xs font-medium text-gray-700 shadow-xs transition hover:bg-gray-50 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-800">
                <svg class="h-4 w-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                <span>Buka Dashboard Fonnte.com</span>
            </a>
        </div>
    </div>

    {{-- Feedback Alerts --}}
    @if(session('success'))
        <div class="flex items-center justify-between rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800 dark:border-emerald-800/40 dark:bg-emerald-900/20 dark:text-emerald-300">
            <div class="flex items-center gap-2">
                <svg class="h-5 w-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="cursor-pointer text-emerald-600 hover:opacity-75">✕</button>
        </div>
    @endif

    @if(session('error'))
        <div class="flex items-center justify-between rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800 dark:border-rose-800/40 dark:bg-rose-900/20 dark:text-rose-300">
            <div class="flex items-center gap-2">
                <svg class="h-5 w-5 text-rose-600 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="cursor-pointer text-rose-600 hover:opacity-75">✕</button>
        </div>
    @endif

    {{-- Kartu Status Koneksi Perangkat Fonnte --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-xs dark:border-gray-800 dark:bg-gray-900">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl {{ ($deviceInfo['connected'] ?? false) ? 'bg-emerald-100 text-emerald-600 dark:bg-emerald-950/50 dark:text-emerald-400' : 'bg-amber-100 text-amber-600 dark:bg-amber-950/50 dark:text-amber-400' }}">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-2">
                        <h3 class="text-base font-semibold text-gray-900 dark:text-white">Status Perangkat WhatsApp</h3>
                        @if($deviceInfo && ($deviceInfo['connected'] ?? false))
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                Terhubung (Connected)
                            </span>
                        @elseif(!empty($settings['fonnte_token']))
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-semibold text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                Tidak Terhubung (Scan QR Diperlukan)
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-semibold text-gray-600 dark:bg-gray-800 dark:text-gray-400">
                                Token Belum Diatur
                            </span>
                        @endif
                    </div>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        @if($deviceInfo && ($deviceInfo['connected'] ?? false))
                            Akun WhatsApp aktif dan siap mengirim notifikasi ke teknisi & pegawai.
                        @elseif(!empty($settings['fonnte_token']))
                            {{ $deviceInfo['reason'] ?? 'Silakan buka dashboard Fonnte dan hubungkan perangkat dengan scan QR Code WhatsApp.' }}
                        @else
                            Silakan masukkan Token API Fonnte pada formulir di bawah ini untuk mengaktifkan gateway.
                        @endif
                    </p>
                </div>
            </div>

            @if($deviceInfo && ($deviceInfo['connected'] ?? false))
                <div class="grid grid-cols-2 gap-3 border-t border-gray-100 pt-3 sm:flex sm:items-center sm:gap-6 sm:border-t-0 sm:pt-0 dark:border-gray-800">
                    <div class="rounded-lg bg-gray-50 p-2.5 dark:bg-gray-800/50">
                        <span class="block text-[11px] text-gray-400">Nomor Pengirim</span>
                        <span class="font-mono text-xs font-semibold text-gray-800 dark:text-gray-200">{{ $deviceInfo['device'] ?? '-' }}</span>
                    </div>
                    <div class="rounded-lg bg-gray-50 p-2.5 dark:bg-gray-800/50">
                        <span class="block text-[11px] text-gray-400">Sisa Kuota / Pesan</span>
                        <span class="font-mono text-xs font-semibold text-emerald-600 dark:text-emerald-400">{{ $deviceInfo['quota'] ?? '-' }}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Grid Form Konfigurasi & Uji Coba --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
        {{-- Kolom Kiri: Form Konfigurasi Utama --}}
        <div class="lg:col-span-7">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-xs dark:border-gray-800 dark:bg-gray-900">
                <div class="border-b border-gray-100 pb-4 dark:border-gray-800">
                    <h3 class="text-base font-semibold text-gray-900 dark:text-white">Konfigurasi Fonnte Gateway</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Atur kredensial API dan perilaku pengiriman pesan otomatis</p>
                </div>

                <form action="{{ route('settings.whatsapp.update') }}" method="POST" class="mt-5 space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Switch Master: Aktifkan WhatsApp Gateway --}}
                    <div class="flex items-center justify-between rounded-xl border border-gray-200 bg-gray-50/60 p-4 dark:border-gray-800 dark:bg-gray-800/40">
                        <div>
                            <label for="fonnte_enabled" class="text-sm font-semibold text-gray-900 dark:text-white cursor-pointer">
                                Aktifkan Notifikasi WhatsApp
                            </label>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                Matikan toggle ini jika ingin menjeda pengiriman pesan tanpa memengaruhi proses tiket
                            </p>
                        </div>
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input type="checkbox" id="fonnte_enabled" name="fonnte_enabled" value="1" class="peer sr-only"
                                   {{ $settings['fonnte_enabled'] ? 'checked' : '' }}>
                            <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-emerald-500 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-hidden dark:bg-gray-700"></div>
                        </label>
                    </div>

                    {{-- Token Fonnte --}}
                    <div x-data="{ show: false }">
                        <label for="fonnte_token" class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                            API Token Fonnte <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'"
                                   id="fonnte_token"
                                   name="fonnte_token"
                                   value="{{ old('fonnte_token', $settings['fonnte_token']) }}"
                                   placeholder="Contoh: abcd1234efgh5678ijkl"
                                   class="w-full rounded-xl border border-gray-300 bg-white px-4 py-2.5 pr-10 text-xs font-mono text-gray-900 transition focus:border-emerald-500 focus:outline-hidden focus:ring-1 focus:ring-emerald-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            <button type="button"
                                    @click="show = !show"
                                    class="cursor-pointer absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                                <svg x-show="!show" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="show" x-cloak class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                </svg>
                            </button>
                        </div>
                        <p class="mt-1 text-[11px] text-gray-500 dark:text-gray-400">
                            Token didapatkan pada menu <em>Device</em> di akun Fonnte Anda. Nilai ini juga dapat disimpan di file <code>.env</code> (<code>FONNTE_TOKEN</code>).
                        </p>
                    </div>

                    {{-- Nomor Target Broadcast Tambahan / Grup --}}
                    <div>
                        <label for="fonnte_target_admin" class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                            Nomor Broadcast Tambahan / ID Grup Tim IT (Opsional)
                        </label>
                        <input type="text"
                               id="fonnte_target_admin"
                               name="fonnte_target_admin"
                               value="{{ old('fonnte_target_admin', $settings['fonnte_target_admin']) }}"
                               placeholder="Contoh: 081234567890, 089876543210 atau ID Grup Fonnte"
                               class="w-full rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-xs text-gray-900 transition focus:border-emerald-500 focus:outline-hidden focus:ring-1 focus:ring-emerald-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        <p class="mt-1 text-[11px] text-gray-500 dark:text-gray-400">
                            Secara otomatis notifikasi tiket baru dikirim ke seluruh Teknisi & Admin yang memiliki nomor telepon. Tambahkan nomor HP hotline atau ID Grup Fonnte jika ingin menerima salinan pesan (pisahkan koma jika lebih dari satu).
                            <span class="block mt-0.5 text-amber-600 dark:text-amber-400">
                                ⚠️ <em>Catatan:</em> Jangan mengisi nomor bot pengirim itu sendiri karena WhatsApp tidak mengizinkan pengiriman pesan ke nomor sendiri.
                            </span>
                        </p>
                    </div>

                    {{-- Switch: Antrean Worker Database --}}
                    <div class="flex items-center justify-between rounded-xl border border-gray-200 bg-gray-50/60 p-4 dark:border-gray-800 dark:bg-gray-800/40">
                        <div>
                            <label for="fonnte_use_queue_worker" class="text-sm font-semibold text-gray-900 dark:text-white cursor-pointer">
                                Gunakan Worker Queue Terpisah
                            </label>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                <strong>Default: Nonaktif</strong>. Sistem menggunakan pengiriman cerdas <code>afterResponse()</code> yang tidak memperlambat respon web sama sekali tanpa repot menjalankan worker <code>php artisan queue:work</code>.
                            </p>
                        </div>
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input type="checkbox" id="fonnte_use_queue_worker" name="fonnte_use_queue_worker" value="1" class="peer sr-only"
                                   {{ $settings['fonnte_use_queue_worker'] ? 'checked' : '' }}>
                            <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-emerald-500 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-hidden dark:bg-gray-700"></div>
                        </label>
                    </div>

                    {{-- Switch: Notifikasi Email --}}
                    <div class="flex items-center justify-between rounded-xl border border-gray-200 bg-gray-50/60 p-4 dark:border-gray-800 dark:bg-gray-800/40">
                        <div>
                            <label for="email_notification_enabled" class="text-sm font-semibold text-gray-900 dark:text-white cursor-pointer">
                                Notifikasi Email Tiket Selesai
                            </label>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                Kirimkan juga notifikasi ke alamat email pelapor saat tiket selesai (membutuhkan SMTP aktif di .env)
                            </p>
                        </div>
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input type="checkbox" id="email_notification_enabled" name="email_notification_enabled" value="1" class="peer sr-only"
                                   {{ $settings['email_notification_enabled'] ? 'checked' : '' }}>
                            <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-emerald-500 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-hidden dark:bg-gray-700"></div>
                        </label>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="pt-2">
                        <button type="submit"
                                class="cursor-pointer inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl bg-[#10B981] px-6 py-2.5 text-xs font-semibold text-white shadow-xs transition hover:bg-emerald-600 focus:outline-hidden">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Simpan Konfigurasi</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Kolom Kanan: Uji Coba Pengiriman & Panduan --}}
        <div class="space-y-6 lg:col-span-5">
            {{-- Kartu Uji Coba Pengiriman Pesan --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-xs dark:border-gray-800 dark:bg-gray-900">
                <div class="flex items-center gap-3 border-b border-gray-100 pb-4 dark:border-gray-800">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 dark:bg-emerald-950/40 dark:text-emerald-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Uji Coba Pengiriman (Test Send)</h3>
                        <p class="text-[11px] text-gray-500 dark:text-gray-400">Tes koneksi kirim pesan ke nomor WhatsApp tujuan</p>
                    </div>
                </div>

                <form action="{{ route('settings.whatsapp.test_send') }}" method="POST" class="mt-4 space-y-4">
                    @csrf
                    <div>
                        <label for="target" class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            Nomor WhatsApp Penerima <span class="text-rose-500">*</span>
                        </label>
                        <input type="text"
                               id="target"
                               name="target"
                               placeholder="Contoh: 081234567890"
                               required
                               class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2 text-xs text-gray-900 transition focus:border-emerald-500 focus:outline-hidden focus:ring-1 focus:ring-emerald-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        <span class="mt-1 block text-[10px] text-gray-400">Format: 08xxx atau 628xxx</span>
                    </div>

                    <div>
                        <label for="message" class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            Pesan Uji Coba <span class="text-rose-500">*</span>
                        </label>
                        <textarea id="message"
                                  name="message"
                                  rows="3"
                                  required
                                  class="w-full rounded-xl border border-gray-300 bg-white p-3 text-xs text-gray-900 transition focus:border-emerald-500 focus:outline-hidden focus:ring-1 focus:ring-emerald-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white">Halo! Ini adalah pesan uji coba dari sistem ITSM BPOM via WhatsApp Gateway Fonnte. Integrasi berjalan dengan lancar.</textarea>
                    </div>

                    <button type="submit"
                            class="cursor-pointer inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-900 px-4 py-2.5 text-xs font-semibold text-white shadow-xs transition hover:bg-gray-800 dark:bg-emerald-600 dark:hover:bg-emerald-500">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        <span>Kirim Pesan Tes Sekarang</span>
                    </button>
                </form>
            </div>

            {{-- Kartu Panduan Ringkas --}}
            <div class="rounded-2xl border border-gray-200 bg-gray-50/70 p-5 dark:border-gray-800 dark:bg-gray-800/30">
                <h4 class="text-xs font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                    <svg class="h-4 w-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Panduan Singkat Integrasi Fonnte
                </h4>
                <ol class="mt-3 space-y-2 text-xs text-gray-600 dark:text-gray-400 list-decimal list-inside">
                    <li>Buka akun Anda di <a href="https://fonnte.com" target="_blank" class="font-medium text-emerald-600 underline hover:text-emerald-500">fonnte.com</a>.</li>
                    <li>Masuk ke menu <strong>Device</strong> lalu scan QR Code menggunakan aplikasi WhatsApp.</li>
                    <li>Salin <strong>API Token</strong> dan tempelkan pada kolom di atas, lalu klik <strong>Simpan</strong>.</li>
                    <li>Lakukan <strong>Uji Coba Pengiriman</strong> untuk memastikan pesan masuk ke ponsel Anda.</li>
                    <li>Pastikan nomor HP staf teknisi & pegawai terisi lengkap pada data profil/petugas.</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
