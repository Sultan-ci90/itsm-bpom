@extends('layouts.app')

@section('content')
    {{-- Header, Breadcrumb & Back Navigation --}}
    <div class="mx-auto w-full max-w-3xl mb-6 space-y-3">
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
                    <a href="{{ route('incidents.index') }}" class="transition hover:text-primary">
                        {{ auth()->user()->isTeknisi() || auth()->user()->isAdmin() ? 'Semua Aduan Kendala' : 'Aduan Kendala Saya' }}
                    </a>
                </li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li class="font-medium text-gray-800 dark:text-white/90">
                    Lapor Aduan Kendala
                </li>
            </ol>
        </nav>

        {{-- Baris Judul & Tombol Kembali di Sebelah Kiri Judul --}}
        <div class="flex items-center gap-3">
            <a href="{{ route('incidents.index') }}"
               title="Kembali ke Daftar Aduan Kendala"
               class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-stroke bg-white text-gray-600 shadow-xs transition hover:border-primary hover:bg-gray-50 hover:text-primary dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-white">
                <svg class="h-5 w-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                    Lapor Aduan Kendala
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400">Buat laporan aduan kendala perangkat IT</p>
            </div>
        </div>
    </div>

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
                    @if($isStaff)
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Nama Pelapor <span class="text-red-500">*</span>
                        </label>
                        <select id="pelapor_select" name="pelapor_id" x-ref="pelaporSelect" required
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @foreach($users as $userItem)
                                <option value="{{ $userItem->id }}" class="bg-white text-black dark:bg-gray-900 dark:text-white" @selected(old('pelapor_id', auth()->id()) == $userItem->id)>
                                    {{ $userItem->nama }} (NIP: {{ $userItem->nip ?? '-' }} • {{ $userItem->bidang->nama_bidang ?? 'Umum' }}){{ $userItem->id === auth()->id() ? ' ★ (Anda)' : '' }}
                                </option>
                            @endforeach
                        </select>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            Pilih atau ketik Nama / NIP pegawai yang bersangkutan, atau biarkan default (Anda sendiri).
                        </p>
                        @error('pelapor_id')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    @else
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">Nama Pelapor</label>
                        <input type="text" value="{{ auth()->user()->nama }} ({{ auth()->user()->nip }})" readonly
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:disabled:bg-black">
                    </div>
                    @endif
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">Tanggal Pelaporan</label>
                        <input type="text" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" readonly
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:disabled:bg-black">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Pilih Aset / Barang <span class="text-red-500">*</span>
                    </label>
                    <select id="asset_select" name="asset_id" x-ref="assetSelect" required
                            @change="lokasi = ASSET_LOKASI[$event.target.value] ?? ''"
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        <option value="" class="bg-white text-black dark:bg-gray-900 dark:text-white">-- Cari Kode Barang, NUP, atau Nama --</option>
                        @foreach ($assets as $asset)
                            <option value="{{ $asset->id }}" class="bg-white text-black dark:bg-gray-900 dark:text-white" @selected(old('asset_id') == $asset->id)>
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
                           class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:disabled:bg-black">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Lokasi diambil dari data aset; tidak perlu diisi manual.</p>
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi Masalah <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi_masalah" rows="4" required
                              class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white"
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
                            class="inline-flex items-center px-5 py-2.5 bg-[#10B981] rounded-lg font-medium text-white text-sm hover:bg-green-700 transition focus:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60">
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
                    if (!select) return;

                    // Retensi lokasi jika form gagal validasi dan asset_id lama terpilih kembali
                    if (select.value) {
                        this.lokasi = ASSET_LOKASI[select.value] ?? '';
                    }

                    const setupTomSelect = () => {
                        if (typeof TomSelect === 'undefined') return;

                        // Setup Asset Select
                        if (select && !select.tomselect) {
                            new TomSelect(select, {
                                create: false,
                                sortField: { field: 'text', direction: 'asc' },
                                placeholder: 'Ketik untuk mencari aset...',
                                maxOptions: 200,
                                onChange: (value) => {
                                    this.lokasi = value ? (ASSET_LOKASI[value] ?? 'Lokasi tidak diketahui') : '';
                                },
                            });
                        }

                        // Setup Pelapor Select (Khusus Staff) — sama persis seperti asset_select
                        const pelaporSelect = this.$refs.pelaporSelect;
                        if (pelaporSelect && !pelaporSelect.tomselect) {
                            new TomSelect(pelaporSelect, {
                                create: false,
                                sortField: { field: 'text', direction: 'asc' },
                                placeholder: 'Ketik Nama atau NIP pegawai...',
                                maxOptions: 500,
                            });
                        }
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
@push('scripts')
<script>
    // Safety net non-Alpine: jika JS Alpine error, submit tetap diberi feedback & cegah klik ganda.
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form[action*="incidents"]');
        if (!form) return;
        form.addEventListener('submit', function () {
            setTimeout(() => {
                const btn = form.querySelector('button[type="submit"]');
                if (btn) { btn.disabled = true; btn.classList.add('opacity-60', 'cursor-not-allowed'); }
            }, 50);
        });
    });
</script>
@endpush
