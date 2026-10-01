@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Lapor Kendala (Incident)"/>

    {{-- Preload peta lokasi aset sekali saja; hindari fetch API setiap ganti pilihan --}}
    <script>
        const ASSET_LOKASI = @json($assets->pluck('lokasi', 'id'));
    </script>

    <div class="mx-auto w-full max-w-3xl">
        <div class="rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">

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

            <form action="{{ route('incidents.store') }}" method="POST" enctype="multipart/form-data"
                  x-data="incidentForm()" @submit="submitting = true">
                @csrf

                <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">Nama Pelapor</label>
                        <input type="text" value="{{ auth()->user()->nama }} ({{ auth()->user()->nip }})" readonly
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-form-strokedark dark:bg-form-input dark:text-white dark:disabled:bg-black">
                    </div>
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">Tanggal Pelaporan</label>
                        <input type="text" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" readonly
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-form-strokedark dark:bg-form-input dark:text-white dark:disabled:bg-black">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Pilih Aset / Barang <span class="text-red-500">*</span>
                    </label>
                    <select id="asset_select" name="asset_id" x-ref="assetSelect" required
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white">
                        <option value="">-- Cari Kode Barang, NUP, atau Nama --</option>
                        @foreach ($assets as $asset)
                            <option value="{{ $asset->id }}" @selected(old('asset_id') == $asset->id)>
                                {{ $asset->kode_barang }} - {{ $asset->nama_barang }} (NUP: {{ $asset->nup }})
                            </option>
                        @endforeach
                    </select>
                    @error('asset_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Lokasi Aset</label>
                    <input type="text" x-model="lokasi" readonly placeholder="Terisi otomatis saat aset dipilih"
                           class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-form-strokedark dark:bg-form-input dark:text-white dark:disabled:bg-black">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Lokasi diambil dari data aset; tidak perlu diisi manual.</p>
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi Masalah <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi_masalah" rows="4" required
                              class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white"
                              placeholder="Jelaskan kendala yang dialami...">{{ old('deskripsi_masalah') }}</textarea>
                    @error('deskripsi_masalah')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Foto Kendala <span class="text-xs text-gray-500">(Opsional, Max 2MB)</span>
                    </label>
                    <input type="file" name="foto_kendala" accept="image/jpeg,image/png,image/jpg"
                           class="w-full rounded-lg border border-stroke bg-transparent py-3 px-4 text-black outline-none transition file:mr-4 file:rounded file:border-0 file:bg-[#E2E8F0] file:px-4 file:py-2 file:text-sm file:font-medium file:text-black dark:border-form-strokedark dark:bg-form-input dark:text-white dark:file:bg-gray-700 dark:file:text-white">
                    @error('foto_kendala')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <a href="{{ route('incidents.index') }}"
                       class="inline-flex items-center rounded-md border border-gray-300 px-6 py-3 text-xs font-semibold uppercase tracking-widest text-gray-700 transition hover:bg-gray-100 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                        Batal
                    </a>
                    <button type="submit" :disabled="submitting"
                            class="inline-flex items-center rounded-md border border-transparent bg-[#10B981] px-6 py-3 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-green-700 focus:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60">
                        <span x-show="!submitting">Tambah Laporan</span>
                        <span x-cloak x-show="submitting">Menyimpan...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function incidentForm() {
            return {
                lokasi: '',
                submitting: false,
                init() {
                    const select = this.$refs.assetSelect;
                    if (typeof TomSelect === 'undefined' || !select) return;

                    // Retensi lokasi jika form gagal validasi dan asset_id lama terpilih kembali
                    if (select.value) {
                        this.lokasi = ASSET_LOKASI[select.value] ?? '';
                    }

                    new TomSelect(select, {
                        create: false,
                        sortField: { field: 'text', direction: 'asc' },
                        placeholder: 'Ketik untuk mencari aset...',
                        maxOptions: 200,
                        onChange: (value) => {
                            this.lokasi = value ? (ASSET_LOKASI[value] ?? 'Lokasi tidak diketahui') : '';
                        },
                    });
                },
            };
        }
    </script>
@endsection