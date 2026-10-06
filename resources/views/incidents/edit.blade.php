@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Edit Aduan {{ $ticket->nomor_aduan }}" />

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

            @if (session('error'))
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('incidents.updateData', $ticket) }}" method="POST" enctype="multipart/form-data"
                  x-data="editIncidentForm()" @submit="submitting = true">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">Nomor Aduan</label>
                        <input type="text" value="{{ $ticket->nomor_aduan }}" readonly
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                    </div>
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">Pelapor</label>
                        <input type="text" value="{{ $ticket->pelapor->nip ?? '-' }} || {{ $ticket->pelapor->nama ?? '-' }}" readonly
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Aset / Barang <span class="text-red-500">*</span>
                    </label>
                    <select id="asset_select" name="asset_id" x-ref="assetSelect" required
                            @change="lokasi = ASSET_LOKASI[$event.target.value] ?? ''"
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        <option value="" class="bg-white text-black dark:bg-gray-900 dark:text-white">-- Cari Kode Barang, NUP, atau Nama --</option>
                        @foreach ($assets as $asset)
                            <option value="{{ $asset->id }}" class="bg-white text-black dark:bg-gray-900 dark:text-white" @selected(old('asset_id', $ticket->asset_id) == $asset->id)>
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
                           class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Lokasi diambil dari data aset.</p>
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi Masalah <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi_masalah" rows="4" required
                              class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">{{ old('deskripsi_masalah', $ticket->deskripsi_masalah) }}</textarea>
                    @error('deskripsi_masalah')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Foto Kendala <span class="text-xs text-gray-500">(Opsional, Max 2MB; kosongkan jika tidak diganti)</span>
                    </label>
                    @if($ticket->foto_kendala)
                        <img src="{{ asset('storage/' . $ticket->foto_kendala) }}" alt="Foto Kendala"
                             class="mb-3 max-h-48 rounded-lg border border-stroke dark:border-gray-800">
                    @endif
                    <input type="file" name="foto_kendala" accept="image/jpeg,image/png,image/jpg"
                           class="w-full rounded-lg border border-stroke bg-transparent py-3 px-4 text-black outline-none transition file:mr-4 file:rounded file:border-0 file:bg-[#E2E8F0] file:px-4 file:py-2 file:text-sm file:font-medium file:text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:file:bg-gray-700 dark:file:text-white">
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
                            class="inline-flex items-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white transition hover:bg-opacity-90 disabled:cursor-not-allowed disabled:opacity-60">
                        <span x-show="!submitting">Simpan Perubahan</span>
                        <span x-cloak x-show="submitting">Menyimpan...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editIncidentForm() {
            return {
                lokasi: '',
                submitting: false,
                init() {
                    const select = this.$refs.assetSelect;
                    if (!select) return;

                    if (select.value) {
                        this.lokasi = ASSET_LOKASI[select.value] ?? '';
                    }

                    const setupTomSelect = () => {
                        if (typeof TomSelect === 'undefined' || !select || select.tomselect) return;

                        new TomSelect(select, {
                            create: false,
                            sortField: { field: 'text', direction: 'asc' },
                            placeholder: 'Ketik untuk mencari aset...',
                            maxOptions: 200,
                            onChange: (value) => {
                                this.lokasi = value ? (ASSET_LOKASI[value] ?? 'Lokasi tidak diketahui') : '';
                            },
                        });
                    };

                    if (typeof TomSelect !== 'undefined') {
                        setupTomSelect();
                    } else {
                        window.addEventListener('load', setupTomSelect);
                        document.addEventListener('DOMContentLoaded', setupTomSelect);
                    }
                },
            };
        }
    </script>
@endsection