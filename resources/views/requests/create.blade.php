@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Buat Permintaan Baru (Service Request)" />

    <div class="mx-auto max-w-3xl">
        <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('requests.store') }}" method="POST" x-data="requestForm()">
                @csrf

                <!-- Pemohon (Read Only) -->
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Nama Pemohon</label>
                    <input type="text" value="{{ auth()->user()->name }}" readonly
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition dark:border-form-strokedark dark:bg-form-input dark:text-white">
                </div>

                <!-- Judul Permintaan -->
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Judul Permintaan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul_permintaan" value="{{ old('judul_permintaan') }}"
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white"
                        placeholder="Contoh: Minta install aplikasi ACCURATE">
                    @error('judul_permintaan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Kategori -->
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="kategori"
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white">
                            <option value="Permintaan Layanan" @selected(old('kategori') === 'Permintaan Layanan')>Permintaan Layanan (Request)</option>
                            <option value="Insiden" @selected(old('kategori') === 'Insiden')>Insiden (Kendala)</option>
                        </select>
                        @error('kategori')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Prioritas -->
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Prioritas <span class="text-red-500">*</span>
                        </label>
                        <select name="prioritas"
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white">
                            @foreach (['Rendah', 'Sedang', 'Tinggi', 'Darurat'] as $p)
                                <option value="{{ $p }}" @selected(old('prioritas') === $p)>{{ $p }}</option>
                            @endforeach
                        </select>
                        @error('prioritas')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Terkait Aset (Opsional, Searchable) -->
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Terkait Aset <span class="text-gray-500 text-xs">(Opsional)</span>
                    </label>
                    <select id="asset_select" name="asset_id" x-ref="assetSelect" @change="fetchAssetDetail($event.target.value)"
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white">
                        <option value="">-- Tidak terkait aset --</option>
                        @foreach ($assets as $asset)
                            <option value="{{ $asset->id }}">
                                {{ $asset->kode_barang }} - {{ $asset->nama_barang }} (NUP: {{ $asset->nup }})
                            </option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400" x-show="lokasi" x-text="'Lokasi aset: ' + lokasi"></p>
                    @error('asset_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi Kebutuhan <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white"
                        placeholder="Jelaskan kebutuhan / permintaan Anda...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('requests.index') }}"
                        class="inline-flex items-center rounded-lg border border-gray-300 px-5 py-3 text-xs font-semibold uppercase tracking-widest text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center rounded-lg bg-[#10B981] px-6 py-3 text-xs font-semibold uppercase tracking-widest text-white hover:bg-green-700">
                        Kirim Permintaan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function requestForm() {
            return {
                lokasi: '',
                init() {
                    if (typeof TomSelect !== 'undefined') {
                        new TomSelect(this.$refs.assetSelect, {
                            create: false,
                            allowEmptyOption: true,
                            sortField: { field: "text", direction: "asc" },
                            placeholder: 'Ketik untuk mencari aset...',
                        });
                    }
                },
                async fetchAssetDetail(assetId) {
                    if (!assetId) { this.lokasi = ''; return; }
                    try {
                        const res = await fetch(`/api/assets/${assetId}`);
                        const data = await res.json();
                        this.lokasi = data.lokasi || 'Lokasi tidak diketahui';
                    } catch (e) {
                        console.error('Gagal mengambil detail aset:', e);
                    }
                }
            }
        }
    </script>
@endsection
