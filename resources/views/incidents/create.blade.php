@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Lapor Kendala (Incident)" />

    <div class="mx-auto w-full max-w-3xl">
        <div class="rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('incidents.store') }}" method="POST" enctype="multipart/form-data" x-data="incidentForm()">
                @csrf

                <!-- Info Pelapor (Read Only) -->
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Nama Pelapor</label>
                    <input type="text" value="{{ auth()->user()->nama }}" readonly
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-form-strokedark dark:bg-form-input dark:text-white dark:disabled:bg-black">
                </div>

                <!-- Tanggal (Read Only) -->
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Tanggal Pelaporan</label>
                    <input type="text" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" readonly
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-form-strokedark dark:bg-form-input dark:text-white dark:disabled:bg-black">
                </div>

                <!-- Pilih Aset (Searchable) -->
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Pilih Aset / Barang <span class="text-red-500">*</span>
                    </label>
                    <select id="asset_select" name="asset_id" x-ref="assetSelect" @change="fetchAssetDetail($event.target.value)"
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white">
                        <option value="">-- Cari Kode Barang, NUP, atau Nama --</option>
                        @foreach($assets as $asset)
                            <option value="{{ $asset->id }}">
                                {{ $asset->kode_barang }} - {{ $asset->nama_barang }} (NUP: {{ $asset->nup }})
                            </option>
                        @endforeach
                    </select>
                    @error('asset_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lokasi (Auto-filled) -->
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Lokasi Aset</label>
                    <input type="text" x-model="lokasi" readonly placeholder="Lokasi akan terisi otomatis saat memilih aset"
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-form-strokedark dark:bg-form-input dark:text-white dark:disabled:bg-black">
                </div>

                <!-- Deskripsi Masalah -->
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi Masalah <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi_masalah" rows="4"
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white"
                        placeholder="Jelaskan kendala yang dialami...">{{ old('deskripsi_masalah') }}</textarea>
                    @error('deskripsi_masalah')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Foto Kendala (Opsional) -->
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Foto Kendala <span class="text-gray-500 text-xs">(Opsional, Max 2MB)</span>
                    </label>
                    <input type="file" name="foto_kendala" accept="image/jpeg,image/png,image/jpg"
                        class="w-full rounded-lg border border-stroke bg-transparent py-3 px-4 text-black outline-none transition file:mr-4 file:rounded file:border-0 file:bg-[#E2E8F0] file:py-2 file:px-4 file:text-sm file:font-medium file:text-black dark:border-form-strokedark dark:bg-form-input dark:text-white dark:file:bg-gray-700 dark:file:text-white">
                    @error('foto_kendala')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end gap-3">
                    <a href="{{ route('incidents.index') }}"
                        class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-100 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-[#10B981] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition">
                        Tambah Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function incidentForm() {
            return {
                lokasi: '',
                init() {
                    // Inisialisasi TomSelect untuk Searchable Dropdown
                    if (typeof TomSelect !== 'undefined' && this.$refs.assetSelect) {
                        new TomSelect(this.$refs.assetSelect, {
                            create: false,
                            sortField: { field: "text", direction: "asc" },
                            placeholder: 'Ketik untuk mencari aset...',
                            onChange: (value) => this.fetchAssetDetail(value),
                        });
                    }
                },
                async fetchAssetDetail(assetId) {
                    if (!assetId) {
                        this.lokasi = '';
                        return;
                    }
                    try {
                        const response = await fetch(`/api/assets/${assetId}`);
                        const data = await response.json();
                        this.lokasi = data.lokasi || 'Lokasi tidak diketahui';
                    } catch (error) {
                        console.error('Gagal mengambil detail aset:', error);
                    }
                }
            }
        }
    </script>
@endsection
