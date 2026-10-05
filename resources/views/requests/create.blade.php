@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('content')
<div class="mx-auto max-w-4xl">
    
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">Lapor Request (Layanan IT)</h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li><a class="font-medium text-primary" href="{{ route('dashboard') }}">Dashboard /</a></li>
                <li class="font-medium text-gray-500">Buat Request</li>
            </ol>
        </nav>
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
                x-data="{ layanan: $el.querySelector('[name=layanan]') ? $el.querySelector('[name=layanan]').value : '' }">
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
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Nama Pelapor</label>
                            <input type="text" value="{{ auth()->user()->nama }}" readonly class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Tanggal -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Request</label>
                            <input type="text" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" readonly class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Jenis Layanan -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Layanan <span class="text-meta-1">*</span></label>
                            <select x-model="layanan" name="layanan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="">-- Pilih Layanan --</option>
                                <option value="zoom" {{ old('layanan') == 'zoom' ? 'selected' : '' }}>Permintaan Link Zoom Meeting</option>
                                <option value="akun" {{ old('layanan') == 'akun' ? 'selected' : '' }}>Reset Password Aplikasi (Srikandi/SIPT)</option>
                                <option value="peminjaman" {{ old('layanan') == 'peminjaman' ? 'selected' : '' }}>Peminjaman Perangkat IT</option>
                                <option value="konsultasi" {{ old('layanan') == 'konsultasi' ? 'selected' : '' }}>Konsultasi / Asistensi IT</option>
                                <option value="operator" {{ old('layanan') == 'operator' ? 'selected' : '' }}>Permintaan Operator Kegiatan</option>
                            </select>
                            @error('layanan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Lokasi -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Lokasi <span class="text-meta-1">*</span></label>
                            <select name="lokasi" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="">-- Pilih Lokasi --</option>
                                @foreach($lokasis as $lokasi)
                                    <option value="{{ $lokasi }}" {{ old('lokasi') == $lokasi ? 'selected' : '' }}>{{ $lokasi }}</option>
                                @endforeach
                            </select>
                            @error('lokasi') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Deskripsi Umum -->
                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Deskripsi Tambahan</label>
                            <textarea name="deskripsi" rows="3" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">{{ old('deskripsi') }}</textarea>
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
                                    <option value="{{ $bidang->id }}" {{ old('bidang_id') == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama_bidang }}</option>
                                @endforeach
                            </select>
                            @error('bidang_id') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Nama Acara <span class="text-meta-1">*</span></label>
                            <input type="text" name="nama_acara" value="{{ old('nama_acara') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('nama_acara') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jam Mulai <span class="text-meta-1">*</span></label>
                            <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('jam_mulai') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jam Selesai <span class="text-meta-1">*</span></label>
                            <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('jam_selesai') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
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

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Bentuk Ruangan <span class="text-meta-1">*</span></label>
                            <select name="bentuk_ruangan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Classroom" {{ old('bentuk_ruangan') == 'Classroom' ? 'selected' : '' }}>Classroom</option>
                                <option value="Shape U" {{ old('bentuk_ruangan') == 'Shape U' ? 'selected' : '' }}>Shape U</option>
                                <option value="Theater" {{ old('bentuk_ruangan') == 'Theater' ? 'selected' : '' }}>Theater</option>
                            </select>
                            @error('bentuk_ruangan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jumlah Kursi <span class="text-meta-1">*</span></label>
                            {{-- `required` dihapus: input ini tersembunyi untuk layanan non-Zoom sehingga memblokir submit.
                                 Validasi tetap dilakukan server (required_if:layanan,zoom). --}}
                            <input type="number" name="jumlah_kursi" value="{{ old('jumlah_kursi') }}" min="1" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('jumlah_kursi') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: Form Dinamis Akun (Reset Password) -->
                <div x-show="layanan === 'akun'" x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Reset Password</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Pengajuan <span class="text-meta-1">*</span></label>
                            <select name="jenis_pengajuan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Reset Password" {{ old('jenis_pengajuan') == 'Reset Password' ? 'selected' : '' }}>Reset Password</option>
                                <option value="Buat Akun Baru" {{ old('jenis_pengajuan') == 'Buat Akun Baru' ? 'selected' : '' }}>Buat Akun Baru</option>
                            </select>
                            @error('jenis_pengajuan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Sistem Tujuan <span class="text-meta-1">*</span></label>
                            <select name="sistem_tujuan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Srikandi" {{ old('sistem_tujuan') == 'Srikandi' ? 'selected' : '' }}>Srikandi</option>
                                <option value="SIPT" {{ old('sistem_tujuan') == 'SIPT' ? 'selected' : '' }}>SIPT</option>
                            </select>
                            @error('sistem_tujuan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">NIP Terkait <span class="text-meta-1">*</span></label>
                            <input type="text" name="nip_terkait" value="{{ old('nip_terkait') }}" placeholder="Masukkan NIP pemilik akun" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('nip_terkait') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- SECTION 4: Form Dinamis Peminjaman -->
                <div x-show="layanan === 'peminjaman'" x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Peminjaman Perangkat</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Perangkat <span class="text-meta-1">*</span></label>
                            <input type="text" name="jenis_perangkat" value="{{ old('jenis_perangkat') }}" placeholder="Contoh: Laptop, Proyektor, Sound System" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('jenis_perangkat') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Mulai <span class="text-meta-1">*</span></label>
                            <input type="date" name="tgl_mulai" value="{{ old('tgl_mulai') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('tgl_mulai') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Kembali <span class="text-meta-1">*</span></label>
                            <input type="date" name="tgl_kembali" value="{{ old('tgl_kembali') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
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

                <!-- Tombol Submit -->
                <div class="flex justify-end border-t border-stroke pt-5 dark:border-gray-800">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-[#10B981] rounded-lg font-medium text-white text-sm hover:bg-green-700 transition">
                        Tambah Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection