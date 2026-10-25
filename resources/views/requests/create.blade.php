@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('content')
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
                    <a href="{{ (auth()->user()->isTeknisi() || auth()->user()->isAdmin()) ? route('requests.all') : route('requests.index') }}" class="transition hover:text-primary">
                        {{ auth()->user()->isTeknisi() || auth()->user()->isAdmin() ? 'Semua Permintaan Layanan TIK' : 'Permintaan Layanan Saya' }}
                    </a>
                </li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li class="font-medium text-gray-800 dark:text-white/90">
                    Buat Permintaan Layanan
                </li>
            </ol>
        </nav>

        {{-- Baris Judul & Tombol Kembali di Sebelah Kiri Judul --}}
        <div class="flex items-center gap-3">
            <a href="{{ (auth()->user()->isTeknisi() || auth()->user()->isAdmin()) ? route('requests.all') : route('requests.index') }}"
               title="Kembali ke Daftar Permintaan Layanan"
               class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-stroke bg-white text-gray-600 shadow-xs transition hover:border-primary hover:bg-gray-50 hover:text-primary dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-white">
                <svg class="h-5 w-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                    Buat Permintaan Layanan
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400">Ajukan permohonan layanan teknologi informasi baru</p>
            </div>
        </div>
    </div>

    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-800">
            <h3 class="font-medium text-black dark:text-white">Formulir Permintaan Layanan</h3>
        </div>
        
        <div class="p-6.5">
            <!-- Alpine.js Data untuk Form Dinamis -->
            {{-- Nilai awal `layanan` dibaca langsung dari elemen select (bukan via string Blade)
                 agar atribut x-data tidak pernah rusak oleh karakter kutip → Alpine selalu init. --}}
            <form action="{{ route('requests.store') }}" method="POST"
                x-data="{ 
                    layanan: $el.querySelector('[name=layanan]') ? $el.querySelector('[name=layanan]').value : 'lainnya',
                    submitting: false
                }"
                @submit="submitting = true">
                @csrf

                @if ($errors->any())
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
                        <p class="mb-1 font-medium">Perbaiki kesalahan berikut:</p>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Error dari controller (mis. gagal simpan ke database) --}}
                @if (session('error'))
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- SECTION 1: Data Umum -->
                <div class="mb-6">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Informasi Umum</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        
                        <!-- Nama Pelapor -->
                        @if($isStaff)
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">
                                Nama Pelapor <span class="text-meta-1">*</span>
                            </label>
                            <select id="pelapor_select_request" name="pelapor_id" required
                                    class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                @foreach($users as $userItem)
                                    <option value="{{ $userItem->id }}" class="bg-white text-black dark:bg-gray-900 dark:text-white" @selected(old('pelapor_id', auth()->id()) == $userItem->id)>
                                        {{ $userItem->nama }} (NIP: {{ $userItem->nip ?? '-' }} • {{ $userItem->bidang->nama_bidang ?? 'Umum' }}){{ $userItem->id === auth()->id() ? ' ★ (Anda)' : '' }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Pilih atau ketik Nama / NIP pegawai yang bersangkutan, atau biarkan default (Anda sendiri).
                            </p>
                            @error('pelapor_id') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                        @else
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Nama Pelapor</label>
                            <input type="text" value="{{ auth()->user()->nama }} ({{ auth()->user()->bidang->nama_bidang ?? 'Umum' }})" readonly class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        </div>
                        @endif

                        <!-- Tanggal -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Permintaan</label>
                            <input type="text" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" readonly class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Jenis Layanan (Default: Lainnya) -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Layanan <span class="text-meta-1">*</span></label>
                            <select x-model="layanan" name="layanan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="lainnya" {{ old('layanan', 'lainnya') == 'lainnya' ? 'selected' : '' }}>Lainnya (Permintaan Layanan Umum)</option>
                                <option value="zoom" {{ old('layanan') == 'zoom' ? 'selected' : '' }}>Permintaan Link Zoom Meeting</option>
                                <option value="reset_password" {{ old('layanan') == 'reset_password' ? 'selected' : '' }}>Reset Password Akun Aplikasi</option>
                                <option value="tambah_akun" {{ old('layanan') == 'tambah_akun' ? 'selected' : '' }}>Tambah / Pembuatan Akun Baru</option>
                                <option value="peminjaman" {{ old('layanan') == 'peminjaman' ? 'selected' : '' }}>Peminjaman Perangkat IT</option>
                                <option value="konsultasi" {{ old('layanan') == 'konsultasi' ? 'selected' : '' }}>Konsultasi / Asistensi IT</option>
                                <option value="operator" {{ old('layanan') == 'operator' ? 'selected' : '' }}>Permintaan Operator Kegiatan</option>
                            </select>
                            @error('layanan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Lokasi Ruangan -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">
                                Lokasi Ruangan <span class="text-meta-1">*</span>
                            </label>
                            <select id="lokasi_select" name="lokasi" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                @foreach($lokasis as $lokasi)
                                    <option value="{{ $lokasi }}" {{ old('lokasi', $defaultLokasi) == $lokasi ? 'selected' : '' }}>
                                        {{ $lokasi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lokasi') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: Form Dinamis Zoom -->
                <div x-show="layanan === 'zoom'" x-cloak x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Zoom Meeting</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Bidang <span class="text-meta-1">*</span></label>
                            <select name="bidang_id" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="">-- Pilih Bidang --</option>
                                @foreach($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}" {{ old('bidang_id', auth()->user()->bidang_id) == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama_bidang }}</option>
                                @endforeach
                            </select>
                            @error('bidang_id') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Nama Acara <span class="text-meta-1">*</span></label>
                            <input type="text" name="nama_acara" value="{{ old('nama_acara') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('nama_acara') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Acara <span class="text-meta-1">*</span></label>
                            <x-form.date-picker id="tgl_acara" name="tgl_acara" :defaultDate="old('tgl_acara')" placeholder="Pilih Tanggal Acara" />
                            @error('tgl_acara') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <x-form.time-range-picker 
                                startName="jam_mulai" 
                                endName="jam_selesai" 
                                :startValue="old('jam_mulai')" 
                                :endValue="old('jam_selesai')" 
                                :alpineRequired="'layanan === \'zoom\''" />
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Acara <span class="text-meta-1">*</span></label>
                            <select name="jenis_acara" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Rapat" {{ old('jenis_acara') == 'Rapat' ? 'selected' : '' }}>Rapat</option>
                                <option value="Webinar" {{ old('jenis_acara') == 'Webinar' ? 'selected' : '' }}>Webinar</option>
                                <option value="Hybrid" {{ old('jenis_acara') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                            @error('jenis_acara') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Butuh Operator? <span class="text-meta-1">*</span></label>
                            <select name="butuh_operator" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Tidak" {{ old('butuh_operator') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="Ya" {{ old('butuh_operator') == 'Ya' ? 'selected' : '' }}>Ya</option>
                            </select>
                            @error('butuh_operator') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                    </div>
                </div>

                <!-- SECTION 3: Form Dinamis Akun (Reset Password / Tambah Akun) -->
                <div x-show="layanan === 'reset_password' || layanan === 'tambah_akun' || layanan === 'akun'" x-cloak x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white" x-text="layanan === 'tambah_akun' ? 'Detail Tambah Akun Baru' : 'Detail Reset Password Akun'">Detail Akun</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Sistem / Aplikasi Tujuan <span class="text-meta-1">*</span></label>
                            <select name="sistem_tujuan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Srikandi" {{ old('sistem_tujuan') == 'Srikandi' ? 'selected' : '' }}>Srikandi</option>
                                <option value="SIPT" {{ old('sistem_tujuan') == 'SIPT' ? 'selected' : '' }}>SIPT</option>
                                <option value="Email BPOM" {{ old('sistem_tujuan') == 'Email BPOM' ? 'selected' : '' }}>Email BPOM (@pom.go.id)</option>
                                <option value="Lainnya" {{ old('sistem_tujuan') == 'Lainnya' ? 'selected' : '' }}>Aplikasi Lainnya</option>
                            </select>
                            @error('sistem_tujuan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>


                    </div>
                </div>

                <!-- SECTION 4: Form Dinamis Peminjaman -->
                <div x-show="layanan === 'peminjaman'" x-cloak x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Peminjaman Perangkat</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Perangkat <span class="text-meta-1">*</span></label>
                            <input type="text" name="jenis_perangkat" value="{{ old('jenis_perangkat') }}" placeholder="Contoh: Laptop, Proyektor, Sound System" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('jenis_perangkat') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Mulai <span class="text-meta-1">*</span></label>
                            <x-form.date-picker id="tgl_mulai" name="tgl_mulai" :defaultDate="old('tgl_mulai')" placeholder="Pilih Tanggal Mulai" />
                            @error('tgl_mulai') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Kembali <span class="text-meta-1">*</span></label>
                            <x-form.date-picker id="tgl_kembali" name="tgl_kembali" :defaultDate="old('tgl_kembali')" placeholder="Pilih Tanggal Kembali" />
                            @error('tgl_kembali') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Keperluan <span class="text-meta-1">*</span></label>
                            <textarea name="keperluan" rows="2" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">{{ old('keperluan') }}</textarea>
                            @error('keperluan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Lokasi Penggunaan <span class="text-meta-1">*</span></label>
                            <input type="text" name="lokasi_penggunaan" value="{{ old('lokasi_penggunaan') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('lokasi_penggunaan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                    <!-- Deskripsi / Keterangan Permintaan (Posisi Paling Bawah) -->
                <div class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">
                        Deskripsi / Penjelasan Permintaan
                        <span class="text-meta-1" x-show="layanan === 'lainnya'">*</span>
                    </label>
                    <textarea name="deskripsi" rows="4"
                        :required="layanan === 'lainnya'"
                        placeholder="Jelaskan kebutuhan atau permohonan layanan Anda secara rinci (contoh: bantuan instalasi software, setting email, perbaikan koneksi, dll)..."
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                    <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                        Catatan tambahan atau uraian rinci permohonan layanan. Wajib diisi bila memilih jenis layanan "Lainnya".
                    </p>
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end border-t border-stroke pt-5 dark:border-gray-800">
                    <button type="submit" :disabled="submitting"
                            class="inline-flex items-center px-5 py-2.5 bg-[#10B981] rounded-lg font-medium text-white text-sm hover:bg-green-700 transition focus:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60 cursor-pointer">
                        <span x-show="!submitting">Ajukan Permintaan Layanan</span>
                        <span x-cloak x-show="submitting">Mengajukan...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if($isStaff)
@push('scripts')
<script>
    const USER_BIDANG = @json($users->pluck('bidang_id', 'id'));

    document.addEventListener('DOMContentLoaded', function () {
        const pelaporEl = document.getElementById('pelapor_select_request');
        const lokasiSelect = document.getElementById('lokasi_select');
        const zoomBidangSelect = document.querySelector('select[name="bidang_id"]');

        const initPelaporSelect = () => {
            if (!pelaporEl || typeof TomSelect === 'undefined' || pelaporEl.tomselect) return;

            new TomSelect(pelaporEl, {
                create: false,
                sortField: { field: 'text', direction: 'asc' },
                placeholder: 'Ketik Nama atau NIP pegawai...',
                maxOptions: 500,
                onChange: function(value) {
                    if (!value) return;

                    const bidangId = USER_BIDANG[value] ?? null;

                    // Jika ada dropdown Bidang pada form Zoom, sinkronkan ke bidang user terpilih
                    if (zoomBidangSelect && bidangId) {
                        zoomBidangSelect.value = bidangId;
                    }
                }
            });
        };

        if (typeof TomSelect !== 'undefined') {
            initPelaporSelect();
        } else {
            window.addEventListener('load', initPelaporSelect);
        }
        window.addEventListener('spa:navigated', initPelaporSelect);
    });
</script>
@endpush
@endif
@endsection