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
                    Edit Request
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
                    Edit Request (Layanan IT)
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400">Nomor: {{ $req->nomor_request }}</p>
            </div>
        </div>
    </div>

    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-800">
            <h3 class="font-medium text-black dark:text-white">Formulir Edit Permintaan Layanan</h3>
        </div>
        
        <div class="p-6.5">
            <!-- Alpine.js Data untuk Form Dinamis -->
            {{-- Nilai awal `layanan` dibaca langsung dari elemen select (bukan via string Blade)
                 agar atribut x-data tidak pernah rusak oleh karakter kutip → Alpine selalu init. --}}
            <form action="{{ route('requests.updateData', $req->id) }}" method="POST"
                x-data="{ layanan: $el.querySelector('[name=layanan]') ? $el.querySelector('[name=layanan]').value : 'lainnya' }">
                @csrf
                @method('PUT')

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
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Nama Pelapor</label>
                            <input type="text" value="{{ auth()->user()->nama }} ({{ auth()->user()->bidang->nama_bidang ?? 'Umum' }})" readonly class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Tanggal -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Request</label>
                            <input type="text" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" readonly class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Jenis Layanan (Default: Lainnya) -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Layanan <span class="text-meta-1">*</span></label>
                            <select x-model="layanan" name="layanan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="lainnya" {{ old('layanan', $req->layanan ?? 'lainnya') == 'lainnya' ? 'selected' : '' }}>Lainnya (Permintaan Layanan Umum)</option>
                                <option value="zoom" {{ old('layanan', $req->layanan) == 'zoom' ? 'selected' : '' }}>Permintaan Link Zoom Meeting</option>
                                <option value="reset_password" {{ old('layanan', $req->layanan) == 'reset_password' ? 'selected' : '' }}>Reset Password Akun Aplikasi</option>
                                <option value="tambah_akun" {{ old('layanan', $req->layanan) == 'tambah_akun' ? 'selected' : '' }}>Tambah / Pembuatan Akun Baru</option>
                                <option value="peminjaman" {{ old('layanan', $req->layanan) == 'peminjaman' ? 'selected' : '' }}>Peminjaman Perangkat IT</option>
                                <option value="konsultasi" {{ old('layanan', $req->layanan) == 'konsultasi' ? 'selected' : '' }}>Konsultasi / Asistensi IT</option>
                                <option value="operator" {{ old('layanan', $req->layanan) == 'operator' ? 'selected' : '' }}>Permintaan Operator Kegiatan</option>
                            </select>
                            @error('layanan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Lokasi Ruangan -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">
                                Lokasi Ruangan <span class="text-meta-1">*</span>
                            </label>
                            <select name="lokasi" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                @foreach($lokasis as $lokasi)
                                    <option value="{{ $lokasi }}" {{ old('lokasi', $req->lokasi) == $lokasi ? 'selected' : '' }}>
                                        {{ $lokasi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lokasi') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Deskripsi / Penjelasan Permintaan -->
                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">
                                Deskripsi / Penjelasan Permintaan
                                <span class="text-meta-1" x-show="layanan === 'lainnya'">*</span>
                            </label>
                            <textarea name="deskripsi" rows="4"
                                :required="layanan === 'lainnya'"
                                placeholder="Jelaskan kebutuhan atau permintaan layanan Anda secara rinci..."
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">{{ old('deskripsi', $req->deskripsi) }}</textarea>
                            @error('deskripsi') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                            <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400" x-show="layanan === 'lainnya'">
                                💡 Cukup jelaskan apa yang Anda perlukan di kolom ini, lalu klik tombol <strong>Tambah Request</strong> di bawah.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: Form Dinamis Zoom -->
                <div x-show="layanan === 'zoom'" x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Zoom Meeting</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Bidang <span class="text-meta-1">*</span></label>
                            <select name="bidang_id" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="">-- Pilih Bidang --</option>
                                @foreach($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}" {{ old('bidang_id', $req->detailZoom->bidang_id ?? '') == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama_bidang }}</option>
                                @endforeach
                            </select>
                            @error('bidang_id') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Nama Acara <span class="text-meta-1">*</span></label>
                            <input type="text" name="nama_acara" value="{{ old('nama_acara', $req->detailZoom->nama_acara ?? '') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('nama_acara') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <x-form.time-range-picker 
                                startName="jam_mulai" 
                                endName="jam_selesai" 
                                :startValue="old('jam_mulai', $req->detailZoom->jam_mulai ?? '')" 
                                :endValue="old('jam_selesai', $req->detailZoom->jam_selesai ?? '')" 
                                :required="true" />
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Acara <span class="text-meta-1">*</span></label>
                            <select name="jenis_acara" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Rapat" {{ old('jenis_acara', $req->detailZoom->jenis_acara ?? '') == 'Rapat' ? 'selected' : '' }}>Rapat</option>
                                <option value="Webinar" {{ old('jenis_acara', $req->detailZoom->jenis_acara ?? '') == 'Webinar' ? 'selected' : '' }}>Webinar</option>
                                <option value="Hybrid" {{ old('jenis_acara', $req->detailZoom->jenis_acara ?? '') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                            @error('jenis_acara') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Butuh Operator? <span class="text-meta-1">*</span></label>
                            <select name="butuh_operator" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Tidak" {{ old('butuh_operator', $req->detailZoom->butuh_operator ?? '') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="Ya" {{ old('butuh_operator', $req->detailZoom->butuh_operator ?? '') == 'Ya' ? 'selected' : '' }}>Ya</option>
                            </select>
                            @error('butuh_operator') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                    </div>
                </div>

                <!-- SECTION 3: Form Dinamis Akun (Reset Password) -->
                <!-- SECTION 3: Form Dinamis Akun (Reset Password / Tambah Akun) -->
                <div x-show="layanan === 'reset_password' || layanan === 'tambah_akun' || layanan === 'akun'" x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white" x-text="layanan === 'tambah_akun' ? 'Detail Tambah Akun Baru' : 'Detail Reset Password Akun'">Detail Akun</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Sistem / Aplikasi Tujuan <span class="text-meta-1">*</span></label>
                            <select name="sistem_tujuan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Srikandi" {{ old('sistem_tujuan', $req->detailAkun->sistem_tujuan ?? '') == 'Srikandi' ? 'selected' : '' }}>Srikandi</option>
                                <option value="SIPT" {{ old('sistem_tujuan', $req->detailAkun->sistem_tujuan ?? '') == 'SIPT' ? 'selected' : '' }}>SIPT</option>
                                <option value="Email BPOM" {{ old('sistem_tujuan', $req->detailAkun->sistem_tujuan ?? '') == 'Email BPOM' ? 'selected' : '' }}>Email BPOM (@pom.go.id)</option>
                                <option value="Lainnya" {{ old('sistem_tujuan', $req->detailAkun->sistem_tujuan ?? '') == 'Lainnya' ? 'selected' : '' }}>Aplikasi Lainnya</option>
                            </select>
                            @error('sistem_tujuan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">
                                NIP Pemilik Akun <span class="text-meta-1">*</span>
                                <span class="text-xs font-normal text-gray-500">(hanya angka)</span>
                            </label>
                            <input type="text" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="nip_terkait" value="{{ old('nip_terkait', $req->detailAkun->nip_terkait ?? '') }}" placeholder="Masukkan NIP pemilik akun" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('nip_terkait') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Email Akun <span class="text-meta-1">*</span></label>
                            <input type="email" name="email" value="{{ old('email', $req->detailAkun->email ?? '') }}" placeholder="contoh: user@pom.go.id" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('email') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div x-data="{ showPass: false }">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Password yang Diinginkan <span class="text-meta-1">*</span></label>
                            <div class="relative">
                                <input :type="showPass ? 'text' : 'password'" name="password" value="{{ old('password', $req->detailAkun->password ?? '') }}" placeholder="Masukkan password yang diinginkan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 pl-5 pr-12 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <button type="button" @click="showPass = !showPass" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-black dark:hover:text-white">
                                    <svg x-show="!showPass" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <svg x-show="showPass" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                </button>
                            </div>
                            @error('password') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- SECTION 4: Form Dinamis Peminjaman -->
                <div x-show="layanan === 'peminjaman'" x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Peminjaman Perangkat</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Perangkat <span class="text-meta-1">*</span></label>
                            <input type="text" name="jenis_perangkat" value="{{ old('jenis_perangkat', $req->detailPeminjaman->jenis_perangkat ?? '') }}" placeholder="Contoh: Laptop, Proyektor, Sound System" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('jenis_perangkat') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Mulai <span class="text-meta-1">*</span></label>
                            <x-form.date-picker id="tgl_mulai" name="tgl_mulai" :defaultDate="old('tgl_mulai', $req->detailPeminjaman->tgl_mulai ?? '')" placeholder="Pilih Tanggal Mulai" />
                            @error('tgl_mulai') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Kembali <span class="text-meta-1">*</span></label>
                            <x-form.date-picker id="tgl_kembali" name="tgl_kembali" :defaultDate="old('tgl_kembali', $req->detailPeminjaman->tgl_kembali ?? '')" placeholder="Pilih Tanggal Kembali" />
                            @error('tgl_kembali') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Keperluan <span class="text-meta-1">*</span></label>
                            <textarea name="keperluan" rows="2" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">{{ old('keperluan', $req->detailPeminjaman->keperluan ?? '') }}</textarea>
                            @error('keperluan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Lokasi Penggunaan <span class="text-meta-1">*</span></label>
                            <input type="text" name="lokasi_penggunaan" value="{{ old('lokasi_penggunaan', $req->detailPeminjaman->lokasi_penggunaan ?? '') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('lokasi_penggunaan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end border-t border-stroke pt-5 dark:border-gray-800">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-[#10B981] rounded-lg font-medium text-white text-sm hover:bg-green-700 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection