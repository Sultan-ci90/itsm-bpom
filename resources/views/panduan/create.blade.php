@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-4xl py-4"
     x-data="{
         imagePreview: null,
         previewFile(event) {
             const file = event.target.files[0];
             if (file) {
                 this.imagePreview = URL.createObjectURL(file);
             } else {
                 this.imagePreview = null;
             }
         }
     }">
    {{-- Breadcrumb --}}
    <x-common.page-breadcrumb pageTitle="Tambah Panduan Solusi Baru" />

    {{-- Error Alert --}}
    @if($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            <p class="font-semibold mb-1">Periksa isian formulir:</p>
            <ul class="list-disc ps-5 space-y-0.5 text-xs">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-2xl border border-stroke bg-white p-6 shadow-default dark:border-gray-800 dark:bg-white/[0.03] sm:p-10">
        <div class="border-b border-stroke pb-4 mb-6 dark:border-gray-800">
            <h2 class="text-lg font-bold text-gray-900 dark:text-white">Formulir Panduan Solusi Mandiri</h2>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                Tuliskan panduan langkah per langkah yang jelas untuk membantu pegawai menyelesaikan kendala teknis ringan secara mandiri.
            </p>
        </div>

        <form action="{{ route('panduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Judul Panduan --}}
            <div>
                <label for="judul" class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                    Judul Panduan <span class="text-red-500">*</span>
                </label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                       placeholder="Contoh: Cara Mengatasi Printer Canon Status Offline pada Windows"
                       required
                       class="w-full rounded-xl border border-stroke bg-transparent px-4 py-2.5 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                <p class="mt-1 text-[11px] text-gray-400">Gunakan judul yang menggambarkan solusi atau kendala spesifik.</p>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                {{-- Kategori --}}
                <div>
                    <label for="kategori" class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                        Kategori Panduan <span class="text-red-500">*</span>
                    </label>
                    <select id="kategori" name="kategori" required
                            class="w-full rounded-xl border border-stroke bg-transparent px-4 py-2.5 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        <option value="">Pilih Kategori...</option>
                        @foreach($kategoriList as $key => $label)
                            <option value="{{ $key }}" @selected(old('kategori') === $key)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Status Publish --}}
                <div class="flex flex-col justify-end">
                    <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-stroke p-3 dark:border-gray-800">
                        <input type="checkbox" name="is_published" value="1"
                               {{ old('is_published', '1') == '1' ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#10B981] focus:ring-[#10B981]">
                        <div>
                            <span class="block text-xs font-semibold text-gray-900 dark:text-white">Publikasikan Sekarang</span>
                            <span class="block text-[11px] text-gray-400">Bila dicentang, panduan langsung terlihat oleh seluruh pegawai.</span>
                        </div>
                    </label>
                </div>
            </div>

            {{-- Ringkasan Singkat --}}
            <div>
                <label for="ringkasan" class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                    Ringkasan Singkat Masalah <span class="text-red-500">*</span>
                </label>
                <textarea id="ringkasan" name="ringkasan" rows="2" required
                          placeholder="Penjelasan ringkas 1-2 kalimat tentang gejala kendala atau kapan panduan ini digunakan..."
                          class="w-full rounded-xl border border-stroke bg-transparent px-4 py-2.5 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">{{ old('ringkasan') }}</textarea>
                <p class="mt-1 text-[11px] text-gray-400">Teks ini akan ditampilkan pada pratinjau kartu di katalog panduan.</p>
            </div>

            {{-- Langkah Solusi --}}
            <div>
                <label for="solusi" class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                    Langkah-Langkah Solusi <span class="text-red-500">*</span>
                </label>
                <textarea id="solusi" name="solusi" rows="8" required
                          placeholder="Tuliskan tahapan perbaikan secara berurutan:&#10;1. Periksa kabel...&#10;2. Buka menu Settings...&#10;3. Lakukan restart..."
                          class="w-full rounded-xl border border-stroke bg-transparent p-4 font-mono text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">{{ old('solusi') }}</textarea>
                <p class="mt-1 text-[11px] text-gray-400">Gunakan format poin angka (1, 2, 3) agar mudah dipahami pegawai awam.</p>
            </div>

            {{-- Lampiran Gambar Screenshot --}}
            <div>
                <label for="gambar" class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                    Lampiran Tangkapan Layar / Screenshot (Opsional)
                </label>
                <input type="file" id="gambar" name="gambar" accept="image/*"
                       @change="previewFile($event)"
                       class="w-full rounded-xl border border-stroke bg-transparent px-4 py-2 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white file:mr-4 file:rounded-lg file:border-0 file:bg-gray-100 file:px-4 file:py-1.5 file:text-xs file:font-semibold file:text-gray-700 hover:file:bg-gray-200 dark:file:bg-gray-800 dark:file:text-gray-300">
                <p class="mt-1 text-[11px] text-gray-400">Format gambar: PNG, JPG, JPEG, WEBP (maksimal 2MB).</p>

                {{-- Image Preview Box --}}
                <template x-if="imagePreview">
                    <div class="mt-3">
                        <span class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1.5">Pratinjau Gambar:</span>
                        <div class="overflow-hidden rounded-xl border border-stroke bg-gray-50 dark:border-gray-800 dark:bg-gray-900 max-w-md">
                            <img :src="imagePreview" alt="Pratinjau Gambar" class="max-h-56 object-contain w-full">
                        </div>
                    </div>
                </template>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center justify-end gap-3 border-t border-stroke pt-6 dark:border-gray-800">
                <a href="{{ route('panduan.index') }}"
                   class="cursor-pointer inline-flex items-center justify-center rounded-xl border border-stroke px-5 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                    Batal
                </a>
                <button type="submit"
                        class="cursor-pointer inline-flex items-center justify-center rounded-xl bg-[#10B981] px-6 py-2.5 text-sm font-semibold text-white shadow-xs transition hover:bg-green-700">
                    Terbitkan Panduan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
