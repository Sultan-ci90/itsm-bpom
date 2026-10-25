@extends('layouts.app')

@section('content')
<div x-data="{
    showModal: false,
    editMode: false,
    deleteModal: false,
    deleteTarget: { id: null, name: '' },
    form: { id: null, nama_lokasi: '' },
    openCreate() {
        this.editMode = false;
        this.form = { id: null, nama_lokasi: '' };
        this.showModal = true;
    },
    openEdit(item) {
        this.editMode = true;
        this.form = { id: item.id, nama_lokasi: item.nama_lokasi };
        this.showModal = true;
    },
    confirmDelete(id, name) {
        this.deleteTarget = { id: id, name: name };
        this.deleteModal = true;
    }
}">
    {{-- Breadcrumb & Title --}}
    <div class="mb-6 space-y-3">
        <nav class="flex items-center text-xs text-gray-500 dark:text-gray-400">
            <ol class="flex flex-wrap items-center gap-1.5">
                <li>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1 transition hover:text-primary">
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
                <li class="text-gray-500 dark:text-gray-400">Master Data</li>
                <li>
                    <svg class="h-3.5 w-3.5 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li class="font-medium text-gray-800 dark:text-white/90">Setup Lokasi</li>
            </ol>
        </nav>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                    Setup Lokasi Ruangan
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    Kelola daftar lokasi ruangan kerja dan fasilitas di lingkungan BPOM
                </p>
            </div>
            <button @click="openCreate()"
                    type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#10B981] px-5 py-2.5 text-sm font-semibold text-white shadow-xs transition hover:bg-green-700 cursor-pointer">
                <svg class="h-4 w-4 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                <span>+ Tambah Lokasi Baru</span>
            </button>
        </div>
    </div>

    {{-- Feedback Alerts --}}
    @if(session('success'))
        <div class="mb-5 flex items-center justify-between rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-900/20 dark:text-green-400">
            <div class="flex items-center gap-2">
                <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            <p class="font-medium">Periksa kembali data yang dimasukkan:</p>
            <ul class="mt-1 list-disc pl-5">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Filter & Search Toolbar + Tabel --}}
    <div x-data="liveTable()">
        <div class="mb-6 flex flex-col gap-3 rounded-2xl border border-stroke bg-white p-4 shadow-default dark:border-gray-800 dark:bg-white/[0.03] lg:flex-row lg:items-center lg:justify-between">
            <form x-ref="form" @submit.prevent="applyFilter()" method="GET" action="{{ route('master.lokasi.index') }}" class="flex flex-1 flex-col gap-3 sm:flex-row sm:items-center">
                <div class="relative flex-1">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama lokasi ruangan..."
                           @input.debounce.350ms="applyFilter()"
                           class="w-full rounded-xl border border-stroke bg-transparent py-2.5 ps-10 pe-4 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                    <svg class="absolute start-3.5 top-3 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <button type="button"
                        @click.prevent="resetFilters()"
                        x-show="hasFilters"
                        x-cloak
                        class="inline-flex items-center justify-center rounded-xl border border-stroke px-4 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-800">
                    Reset
                </button>
            </form>
        </div>

        {{-- Tabel Master Lokasi dengan Overlay Loading Spinner --}}
        <div class="relative min-h-[200px]">
            <!-- Loading Overlay Spinner di tengah tabel -->
            <div x-show="loading" x-cloak
                 class="absolute inset-0 z-30 flex items-center justify-center rounded-2xl bg-white/60 backdrop-blur-[1px] transition-opacity duration-200 dark:bg-gray-900/60">
                <div class="inline-flex items-center gap-2.5 rounded-xl border border-gray-200 bg-white px-4 py-2.5 shadow-theme-sm dark:border-gray-700 dark:bg-gray-800">
                    <svg class="h-5 w-5 animate-spin text-[#10B981]" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300">Memuat data...</span>
                </div>
            </div>

            <!-- Konten Dinamis yang di-swap via AJAX -->
            <div x-ref="tableWrapper">
                <div class="overflow-hidden rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="overflow-x-auto">
            <table class="w-full text-start">
                <thead>
                    <tr class="border-b border-stroke text-xs uppercase tracking-wider text-gray-500 dark:border-gray-800 dark:text-gray-400">
                        <th class="px-5 py-4 font-semibold text-start w-16">No</th>
                        <th class="px-5 py-4 font-semibold text-start">Nama Lokasi Ruangan</th>
                        <th class="px-5 py-4 font-semibold text-start">Tanggal Ditambahkan</th>
                        <th class="px-5 py-4 font-semibold text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stroke text-sm dark:divide-gray-800">
                    @forelse($lokasis as $index => $lokasi)
                        <tr class="transition hover:bg-gray-50/50 dark:hover:bg-white/[0.02]">
                            <td class="px-5 py-4 font-medium text-gray-500 dark:text-gray-400">
                                {{ $lokasis->firstItem() + $index }}
                            </td>
                            <td class="px-5 py-4">
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $lokasi->nama_lokasi }}</span>
                            </td>
                            <td class="px-5 py-4 text-xs text-gray-500 dark:text-gray-400">
                                {{ $lokasi->created_at ? $lokasi->created_at->format('d/m/Y H:i') : '-' }}
                            </td>
                            <td class="px-5 py-4 text-center">
                                <div class="inline-flex items-center gap-1.5">
                                    <button @click='openEdit(@json($lokasi))'
                                            type="button"
                                            title="Edit Lokasi"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-600 transition hover:border-primary hover:text-primary dark:border-gray-800 dark:text-gray-400 dark:hover:border-gray-700 dark:hover:text-white">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </button>
                                    <button @click="confirmDelete({{ $lokasi->id }}, '{{ addslashes($lokasi->nama_lokasi) }}')"
                                            type="button"
                                            title="Hapus Lokasi"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-red-600 transition hover:border-red-600 hover:bg-red-50 dark:border-gray-800 dark:text-red-400 dark:hover:border-red-800/40 dark:hover:bg-red-900/20">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-gray-500 dark:text-gray-400">
                                <svg class="mx-auto mb-3 h-10 w-10 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <p class="text-sm font-medium">Belum ada data lokasi ruangan.</p>
                                <button @click="openCreate()" type="button" class="mt-3 inline-flex items-center gap-2 rounded-xl bg-[#10B981] px-4 py-2 text-xs font-semibold text-white transition hover:bg-green-700 cursor-pointer">
                                    + Tambah Lokasi Baru
                                </button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($lokasis->hasPages())
            <div class="border-t border-stroke p-4 dark:border-gray-800">
                {{ $lokasis->links() }}
            </div>
        @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah / Edit Lokasi --}}
    <div x-show="showModal"
         x-cloak
         x-transition.opacity.duration.200ms
         class="fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto bg-black/50 p-4 backdrop-blur-xs"
         @keydown.escape.window="showModal = false">
        <div class="w-full max-w-lg rounded-2xl border border-stroke bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900"
             @click.outside="showModal = false">
            <div class="mb-4 flex items-center justify-between border-b border-stroke pb-3 dark:border-gray-800">
                <h3 class="text-lg font-semibold text-black dark:text-white"
                    x-text="editMode ? 'Edit Lokasi Ruangan' : 'Tambah Lokasi Ruangan Baru'"></h3>
                <button @click="showModal = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 cursor-pointer">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form :action="editMode ? '{{ url('/master/lokasi') }}/' + form.id : '{{ route('master.lokasi.store') }}'"
                  method="POST" class="space-y-4">
                @csrf
                <template x-if="editMode">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div>
                    <label class="mb-2 block text-sm font-medium text-black dark:text-white">
                        Nama Lokasi Ruangan <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="nama_lokasi"
                           x-model="form.nama_lokasi"
                           required
                           placeholder="Contoh: Ruang Staff Tata Usaha, Aula BPOM, dll"
                           class="w-full rounded-xl border border-stroke bg-transparent py-2.5 px-4 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                </div>

                <div class="mt-6 flex justify-end gap-3 pt-3 border-t border-stroke dark:border-gray-800">
                    <button @click="showModal = false" type="button"
                            class="rounded-xl border border-stroke px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-800 cursor-pointer">
                        Batal
                    </button>
                    <button type="submit"
                            class="rounded-xl bg-brand-500 px-5 py-2.5 text-sm font-medium text-white shadow-theme-xs transition hover:bg-brand-600 cursor-pointer">
                        <span x-text="editMode ? 'Simpan Perubahan' : 'Tambah Lokasi'"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus --}}
    <div x-show="deleteModal"
         x-cloak
         x-transition.opacity.duration.200ms
         class="fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto bg-black/50 p-4 backdrop-blur-xs"
         @keydown.escape.window="deleteModal = false">
        <div class="w-full max-w-md rounded-2xl border border-stroke bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900"
             @click.outside="deleteModal = false">
            <div class="mb-4 flex items-center gap-3 text-red-600">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-black dark:text-white">Konfirmasi Hapus</h3>
            </div>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Apakah Anda yakin ingin menghapus lokasi <strong class="text-black dark:text-white" x-text="deleteTarget.name"></strong>?
            </p>
            <div class="mt-6 flex justify-end gap-3">
                <button @click="deleteModal = false" type="button"
                        class="rounded-xl border border-stroke px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-800 cursor-pointer">
                    Batal
                </button>
                <form :action="'{{ url('/master/lokasi') }}/' + deleteTarget.id" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="rounded-xl bg-red-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-red-700 cursor-pointer">
                        Ya, Hapus Lokasi
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
