@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
<style>
    .crop-wrapper { position: relative; width: 100%; height: 100%; border-radius: 50%; overflow: hidden; background: #f3f4f6; }
    .dark .crop-wrapper { background: #1f2937; }
    .crop-wrapper img { display: block; max-width: 100%; }

    /* Bingkai crop bulat */
    .cropper-crop-box .cropper-view-box { border-radius: 50% !important; outline: 0 !important; box-shadow: 0 0 0 1px rgba(255,255,255,.4) !important; }
    .cropper-crop-box .cropper-face { border-radius: 50% !important; background-color: transparent !important; }
    .cropper-line, .cropper-point, .cropper-dashed, .cropper-center { display: none !important; }
</style>

@php
    $input = 'shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:focus:border-brand-800';
    $label = 'mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400';
@endphp

<div x-data="profileForm()" @keydown.escape.window="isCropModalOpen && closeModal()">
    <x-common.page-breadcrumb pageTitle="User Profile" />

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-success-50 p-4 text-success-800 dark:bg-success-900/30 dark:text-success-400">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-error-50 p-4 text-error-800 dark:bg-error-900/30 dark:text-error-400">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form x-ref="profileForm" action="{{ route('profile.update') }}" method="POST"
          class="rounded-2xl border border-gray-200 bg-white p-5 lg:p-6 dark:border-gray-800 dark:bg-white/[0.03]">
        @csrf
        <div class="mb-5 flex items-center justify-between lg:mb-7">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Pengaturan Profil</h3>
            <button type="submit" class="rounded-lg bg-brand-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-brand-600">
                Simpan Perubahan
            </button>
        </div>

        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
            <!-- Kolom kiri: foto & akun -->
            <div class="flex flex-col gap-6 xl:col-span-1">

                <div class="rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
                    <h4 class="mb-4 text-base font-medium text-gray-800 dark:text-white/90">Foto Profil</h4>
                    <div class="flex flex-col items-center gap-4">
                        <button type="button" @click="openModal()" title="Ubah foto"
                                class="relative size-32 overflow-hidden rounded-full border-4 border-white shadow-md dark:border-gray-800">
                            <img :src="displayPhoto" alt="Foto profil" class="size-full object-cover" />
                        </button>

                        <input type="hidden" name="foto_profil_base64" :value="croppedImageBase64">
                        <input type="hidden" name="hapus_foto" :value="deleteFoto ? '1' : '0'">

                        <button type="button" @click="openModal()"
                                class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-white/[0.03]">
                            Ubah Foto
                        </button>
                        <p class="text-center text-xs text-gray-500 dark:text-gray-400">Format JPG atau PNG, maksimal 5 MB.</p>
                    </div>
                </div>

                <div class="rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
                    <h4 class="mb-4 text-base font-medium text-gray-800 dark:text-white/90">Informasi Akun</h4>
                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="{{ $label }}">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="{{ $input }}" required />
                        </div>
                        <div>
                            <label class="{{ $label }}">Password Baru</label>
                            <input type="password" name="password" placeholder="Biarkan kosong jika tak ingin ganti" class="{{ $input }}" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom kanan: info pribadi & kepegawaian -->
            <div class="flex flex-col gap-6 xl:col-span-2">
                <div class="rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
                    <h4 class="mb-4 text-base font-medium text-gray-800 dark:text-white/90">Informasi Pribadi</h4>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="{{ $label }}">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" class="{{ $input }}" required />
                        </div>
                        <div>
                            <label class="{{ $label }}">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}" class="{{ $input }}" />
                        </div>
                        <div>
                            <label class="{{ $label }}">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" class="{{ $input }}" />
                        </div>
                        <div>
                            <label class="{{ $label }}">Jenis Kelamin</label>
                            <select name="jenkel" class="{{ $input }}" required>
                                <option value="">-- Pilih --</option>
                                <option value="L" @selected(old('jenkel', $user->jenkel) == 'L')>Laki-laki</option>
                                <option value="P" @selected(old('jenkel', $user->jenkel) == 'P')>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="{{ $label }}">Status Pernikahan</label>
                            <select name="status_pernikahan" class="{{ $input }}" required>
                                <option value="">-- Pilih --</option>
                                @foreach(['Belum Menikah', 'Menikah', 'Janda', 'Duda'] as $s)
                                    <option value="{{ $s }}" @selected(old('status_pernikahan', $user->status_pernikahan) == $s)>{{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="{{ $label }}">No. Telepon / WA</label>
                            <input type="text" name="no_telp" value="{{ old('no_telp', $user->no_telp) }}" class="{{ $input }}" />
                        </div>
                        <div class="sm:col-span-2">
                            <label class="{{ $label }}">Alamat Lengkap</label>
                            <textarea name="alamat" rows="3" required class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white/90 dark:focus:border-brand-800">{{ old('alamat', $user->alamat) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50/50 p-5 lg:p-6 dark:border-gray-800 dark:bg-gray-900/50">
                    <div class="mb-4 flex items-center justify-between">
                        <h4 class="text-base font-medium text-gray-800 dark:text-white/90">Informasi Kepegawaian</h4>
                        <span class="rounded-md bg-gray-200 px-2 py-1 text-xs font-medium text-gray-600 dark:bg-gray-700 dark:text-gray-300">Read-Only</span>
                    </div>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">
                        @php
                            $kepegawaian = [
                                'NIP' => $user->nip ?: '-',
                                'Jabatan Fungsional' => $user->jabatan_fungsional ?: '-',
                                'Bidang/Bagian' => $user->bidang ? $user->bidang->nama_bidang : '-',
                                'Status Kepegawaian' => $user->status_kepegawaian ?: '-',
                                'Pangkat/Golongan' => $user->panggol ? $user->panggol->pangkat . ' (' . $user->panggol->golongan . ')' : '-',
                                'Hak Akses (Role)' => strtoupper($user->role),
                            ];
                        @endphp
                        @foreach($kepegawaian as $k => $v)
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-500 dark:text-gray-400">{{ $k }}</label>
                                <p class="text-sm font-semibold text-gray-800 dark:text-white/90">{{ $v }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- ============ MODAL UBAH FOTO PROFIL ============ -->
    <div x-show="isCropModalOpen" x-cloak class="fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto p-4 sm:p-5">
        <div class="fixed inset-0 h-full w-full bg-gray-900/60 backdrop-blur-sm" @click="closeModal()"></div>

        <div class="relative w-full max-w-md rounded-2xl bg-white shadow-lg dark:bg-gray-900" @click.stop>
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4 dark:border-gray-800">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90">Ubah Foto Profil</h4>
                <button @click="closeModal()" type="button" aria-label="Tutup" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <svg class="size-5 fill-current" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
                </button>
            </div>

            <div class="p-6">
                <!-- Preview / area crop bulat -->
                <div class="mb-6 flex justify-center">
                    <div class="relative size-40 rounded-full bg-gray-100 sm:size-48 dark:bg-gray-800">
                        <div x-show="!imageSrc" class="size-full overflow-hidden rounded-full">
                            <img :src="displayPhoto" alt="Foto profil" class="size-full object-cover">
                        </div>

                        <div x-show="imageSrc" style="display:none;" class="crop-wrapper">
                            <img x-ref="cropImage" alt="Crop">
                        </div>

                        <button type="button" @click="$refs.fileInput.click()" aria-label="Pilih foto"
                                class="absolute right-1 bottom-1 flex size-9 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 shadow-xs hover:text-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Tombol unggah & hapus -->
                <div class="mb-6 flex items-center justify-center gap-3">
                    <button type="button" @click="$refs.fileInput.click()"
                            class="flex items-center gap-2 rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        Unggah Foto Baru
                    </button>
                    <button type="button" @click="hapusFoto()" :disabled="!hasPhoto"
                            class="flex items-center gap-2 rounded-lg bg-error-50 px-4 py-2 text-sm font-medium text-error-600 hover:bg-error-100 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-error-500/10 dark:text-error-500 dark:hover:bg-error-500/20">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Hapus Foto
                    </button>
                </div>

                <!-- Dropzone -->
                <div class="mb-2 cursor-pointer rounded-xl border-2 border-dashed bg-gray-50 p-5 text-center transition-colors dark:bg-gray-800/50"
                     :class="dragging ? 'border-brand-500 bg-brand-50/50' : 'border-gray-300 dark:border-gray-700'"
                     @dragover.prevent="dragging = true"
                     @dragleave.prevent="dragging = false"
                     @drop.prevent="dragging = false; handleDrop($event)"
                     @click="$refs.fileInput.click()">
                    <input type="file" x-ref="fileInput" class="hidden" accept="image/jpeg,image/png" @change="fileChosen($event)">
                    <svg class="mx-auto mb-2 size-6 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"/></svg>
                    <p class="text-xs text-gray-500 sm:text-sm dark:text-gray-400">Seret dan lepas foto di sini, atau klik untuk mencari</p>
                </div>
                <p x-show="errorMsg" x-text="errorMsg" class="mb-4 text-xs text-error-600 dark:text-error-500"></p>
                <div class="mb-4" x-show="!errorMsg"></div>

                <!-- Slider ukuran -->
                <div class="mb-6 flex items-center gap-3" :class="!imageSrc && 'opacity-50'">
                    <span class="shrink-0 text-sm font-medium text-gray-700 dark:text-gray-300">Sesuaikan Ukuran</span>
                    <button type="button" @click="zoomOutSlider()" :disabled="!imageSrc" aria-label="Perkecil"
                            class="flex size-6 shrink-0 items-center justify-center rounded-full bg-gray-100 text-gray-500 hover:text-gray-800 disabled:cursor-not-allowed dark:bg-gray-800 dark:text-gray-400">
                        <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/></svg>
                    </button>
                    <input type="range" min="0" max="100" step="1" x-model="zoomSlider" :disabled="!imageSrc"
                           class="h-1.5 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 outline-hidden disabled:cursor-not-allowed dark:bg-gray-700"
                           style="accent-color: #3641f5;">
                    <button type="button" @click="zoomInSlider()" :disabled="!imageSrc" aria-label="Perbesar"
                            class="flex size-6 shrink-0 items-center justify-center rounded-full bg-gray-100 text-gray-500 hover:text-gray-800 disabled:cursor-not-allowed dark:bg-gray-800 dark:text-gray-400">
                        <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    </button>
                </div>

                <!-- Footer -->
                <div class="flex items-center justify-end gap-3">
                    <button type="button" @click="closeModal()"
                            class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-white/[0.03]">
                        Batal
                    </button>
                    <button type="button" @click="saveAndSubmit()" :disabled="saving"
                            class="rounded-lg bg-brand-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-brand-600 disabled:cursor-not-allowed disabled:opacity-60">
                        <span x-show="!saving">Simpan Perubahan</span>
                        <span x-cloak x-show="saving">Menyimpan...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('profileForm', () => ({
            // data dari server
            currentPhoto: @js($user->foto_profil ? asset('storage/' . $user->foto_profil) : null),
            defaultPhoto: @js(asset('images/user/owner.png')),

            // state
            isCropModalOpen: false,
            previewImage: '',        // foto baru (hasil crop) yang belum disimpan
            croppedImageBase64: '',  // dikirim ke server
            deleteFoto: false,
            cropper: null,
            imageSrc: '',
            zoomSlider: 0,
            minRatio: 0,
            maxRatio: 0,
            syncing: false,
            dragging: false,
            saving: false,
            errorMsg: '',
            backup: null,

            // foto yang ditampilkan di halaman & modal
            get displayPhoto() {
                if (this.previewImage) return this.previewImage;
                if (this.deleteFoto) return this.defaultPhoto;
                return this.currentPhoto || this.defaultPhoto;
            },
            get hasPhoto() {
                return !!this.previewImage || (!this.deleteFoto && !!this.currentPhoto);
            },

            init() {
                // slider -> zoom cropper
                this.$watch('zoomSlider', (value) => {
                    if (this.syncing || !this.cropper || !this.maxRatio) return;
                    const ratio = this.minRatio + (this.maxRatio - this.minRatio) * (parseFloat(value) / 100);
                    this.cropper.zoomTo(ratio);
                });
            },

            // ---------- buka / tutup ----------
            openModal() {
                this.backup = {
                    previewImage: this.previewImage,
                    croppedImageBase64: this.croppedImageBase64,
                    deleteFoto: this.deleteFoto,
                };
                this.errorMsg = '';
                this.imageSrc = '';
                this.isCropModalOpen = true;
            },

            // Batal / klik luar / Esc: kembalikan perubahan yang belum disimpan
            closeModal() {
                this.destroyCropper();
                this.imageSrc = '';
                if (this.backup) {
                    Object.assign(this, this.backup);
                    this.backup = null;
                }
                this.isCropModalOpen = false;
            },

            // ---------- file ----------
            fileChosen(event) {
                const file = event.target.files[0];
                event.target.value = ''; // agar file yang sama bisa dipilih lagi
                this.processFile(file);
            },

            handleDrop(event) {
                this.processFile(event.dataTransfer.files[0]);
            },

            processFile(file) {
                if (!file) return;
                this.errorMsg = '';

                if (!['image/jpeg', 'image/png'].includes(file.type)) {
                    this.errorMsg = 'Hanya file JPG dan PNG yang diizinkan.';
                    return;
                }
                if (file.size > 5 * 1024 * 1024) {
                    this.errorMsg = 'Ukuran file maksimal 5 MB.';
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imageSrc = e.target.result;
                    this.$nextTick(() => this.initCropper());
                };
                reader.readAsDataURL(file);
            },

            // ---------- cropper ----------
            initCropper() {
                this.destroyCropper();

                const img = this.$refs.cropImage;
                img.src = this.imageSrc;

                this.cropper = new Cropper(img, {
                    aspectRatio: 1,
                    viewMode: 3,            // gambar selalu menutupi seluruh lingkaran
                    dragMode: 'move',
                    autoCropArea: 1,
                    guides: false,
                    center: false,
                    highlight: false,
                    background: false,
                    restore: false,
                    cropBoxMovable: false,
                    cropBoxResizable: false,
                    toggleDragModeOnDblclick: false,
                    ready: () => {
                        const d = this.cropper.getImageData();
                        this.minRatio = d.width / d.naturalWidth;  // ukuran paling kecil (menutupi lingkaran)
                        this.maxRatio = this.minRatio * 3;         // maksimal zoom 3x
                        this.setSlider(0, true);
                    },
                    zoom: (e) => { // roda mouse / pinch -> sinkron ke slider
                        if (!this.maxRatio) return;
                        if (e.detail.ratio > this.maxRatio + 0.0001) { e.preventDefault(); return; }
                        const p = ((e.detail.ratio - this.minRatio) / (this.maxRatio - this.minRatio)) * 100;
                        this.setSlider(p);
                    },
                });
            },

            destroyCropper() {
                if (this.cropper) {
                    this.cropper.destroy();
                    this.cropper = null;
                }
                this.minRatio = 0;
                this.maxRatio = 0;
            },

            // ubah slider tanpa memicu zoom balik (hindari loop)
            setSlider(percent, force = false) {
                const p = Math.max(0, Math.min(100, percent));
                if (!force && Math.abs(p - parseFloat(this.zoomSlider)) < 0.5) return;
                this.syncing = true;
                this.zoomSlider = p;
                setTimeout(() => { this.syncing = false; }, 0);
            },

            zoomInSlider()  { this.zoomSlider = Math.min(100, parseFloat(this.zoomSlider) + 5); },
            zoomOutSlider() { this.zoomSlider = Math.max(0, parseFloat(this.zoomSlider) - 5); },

            // ---------- hapus foto ----------
            hapusFoto() {
                this.destroyCropper();
                this.imageSrc = '';
                this.previewImage = '';
                this.croppedImageBase64 = '';
                this.deleteFoto = !!this.currentPhoto; // hanya perlu hapus di server jika sudah ada foto tersimpan
            },

            // ---------- simpan ----------
            applyCrop() {
                if (!this.cropper) return false;
                const canvas = this.cropper.getCroppedCanvas({
                    width: 400,
                    height: 400,
                    fillColor: '#fff',
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high',
                });
                if (!canvas) return false;

                const base64 = canvas.toDataURL('image/jpeg', 0.9);
                this.previewImage = base64;
                this.croppedImageBase64 = base64;
                this.deleteFoto = false;
                return true;
            },

            // "Simpan Perubahan" di modal: terapkan crop lalu kirim form profil
            saveAndSubmit() {
                const hadCropper = !!this.cropper;
                if (hadCropper && !this.applyCrop()) {
                    this.errorMsg = 'Gagal memproses gambar. Coba pilih foto lain.';
                    return;
                }

                const changed = hadCropper
                    || this.deleteFoto !== this.backup?.deleteFoto
                    || this.previewImage !== this.backup?.previewImage;

                this.backup = null;
                this.destroyCropper();
                this.imageSrc = '';
                this.isCropModalOpen = false;

                if (!changed) return; // tidak ada perubahan foto

                this.saving = true;
                this.$nextTick(() => this.$refs.profileForm.requestSubmit());
            },
        }));
    });
</script>
@endpush