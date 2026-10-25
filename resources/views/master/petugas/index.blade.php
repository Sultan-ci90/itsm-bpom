@extends('layouts.app')

@section('content')
<div x-data="{
    showCreateModal: false,
    showEditModal: false,
    showRevokeModal: false,
    editTarget: { id: null, nama: '', role: 'teknisi' },
    revokeTarget: { id: null, nama: '' },
    openCreate() {
        this.showCreateModal = true;
    },
    openEdit(user) {
        this.editTarget = { id: user.id, nama: user.nama, role: user.role };
        this.showEditModal = true;
    },
    confirmRevoke(id, nama) {
        this.revokeTarget = { id: id, nama: nama };
        this.showRevokeModal = true;
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
                <li class="font-medium text-gray-800 dark:text-white/90">Setup Petugas</li>
            </ol>
        </nav>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-title-md2 font-semibold text-black dark:text-white">
                    Setup Petugas & Tim IT
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    Kelola penugasan peran personil Tim IT dan Administrator dari seluruh pegawai BPOM
                </p>
            </div>
            <button @click="openCreate()"
                    type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#10B981] px-5 py-2.5 text-sm font-semibold text-white shadow-xs transition hover:bg-green-700 cursor-pointer">
                <svg class="h-4 w-4 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                <span>+ Tugaskan Petugas Baru</span>
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

    @if(session('error'))
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            {{ session('error') }}
        </div>
    @endif

    {{-- Ringkasan Kartu Metrik --}}
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-2xl border border-stroke bg-white p-5 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Tim IT (Teknisi)</span>
                    <h4 class="mt-1 text-2xl font-bold text-black dark:text-white">{{ $totalTeknisi }}</h4>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Petugas penanganan tiket & chat realtime</p>
        </div>

        <div class="rounded-2xl border border-stroke bg-white p-5 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Administrator</span>
                    <h4 class="mt-1 text-2xl font-bold text-black dark:text-white">{{ $totalAdmin }}</h4>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-purple-50 text-purple-600 dark:bg-purple-900/20 dark:text-purple-400">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
            </div>
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Akses penuh konfigurasi & master data</p>
        </div>

        <div class="rounded-2xl border border-stroke bg-white p-5 shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Pegawai Biasa (Pelapor)</span>
                    <h4 class="mt-1 text-2xl font-bold text-black dark:text-white">{{ $totalPelapor }}</h4>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Seluruh pegawai pemohon layanan</p>
        </div>
    </div>

    {{-- Filter & Search Card + Tabel Petugas --}}
    <div x-data="liveTable()">
        <div class="mb-6 flex flex-col gap-3 rounded-2xl border border-stroke bg-white p-4 shadow-default dark:border-gray-800 dark:bg-white/[0.03] lg:flex-row lg:items-center lg:justify-between">
            <form x-ref="form" @submit.prevent="applyFilter()" method="GET" action="{{ route('master.petugas.index') }}" class="flex flex-1 flex-col gap-3 sm:flex-row sm:items-center">
                <div class="relative flex-1">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama pegawai, NIP, atau email..."
                           @input.debounce.350ms="applyFilter()"
                           class="w-full rounded-xl border border-stroke bg-transparent py-2.5 ps-10 pe-4 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                    <svg class="absolute start-3.5 top-3 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <div class="w-full sm:w-64">
                    <select name="role"
                            @change="applyFilter()"
                            class="w-full rounded-xl border border-stroke bg-transparent py-2.5 px-4 text-sm text-black outline-none transition focus:border-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        <option value="" {{ empty($roleFilter) ? 'selected' : '' }}>Semua Petugas (Tim IT & Admin)</option>
                        <option value="teknisi" {{ $roleFilter === 'teknisi' ? 'selected' : '' }}>Hanya Tim IT (Teknisi)</option>
                        <option value="admin" {{ $roleFilter === 'admin' ? 'selected' : '' }}>Hanya Administrator</option>
                        <option value="pelapor" {{ $roleFilter === 'pelapor' ? 'selected' : '' }}>Pegawai Biasa (Pelapor)</option>
                    </select>
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

        {{-- Tabel Petugas dengan Overlay Loading Spinner --}}
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
                        <th class="px-5 py-4 font-semibold text-start">Nama Pegawai & NIP</th>
                        <th class="px-5 py-4 font-semibold text-start">Bidang</th>
                        <th class="px-5 py-4 font-semibold text-start">Email</th>
                        <th class="px-5 py-4 font-semibold text-start">Peran / Role</th>
                        <th class="px-5 py-4 font-semibold text-center w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stroke text-sm dark:divide-gray-800">
                    @forelse($petugasList as $index => $petugas)
                        @php
                            $isMe = $petugas->id === auth()->id();
                        @endphp
                        <tr class="transition hover:bg-gray-50/50 dark:hover:bg-white/[0.02]">
                            <td class="px-5 py-4 font-medium text-gray-500 dark:text-gray-400">
                                {{ $petugasList->firstItem() + $index }}
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary/10 text-sm font-bold text-primary dark:bg-primary/20">
                                        {{ strtoupper(substr($petugas->nama, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                            <span>{{ $petugas->nama }}</span>
                                            @if($isMe)
                                                <span class="rounded bg-gray-100 px-1.5 py-0.5 text-[10px] font-medium text-gray-600 dark:bg-gray-800 dark:text-gray-300">(Anda)</span>
                                            @endif
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">NIP: {{ $petugas->nip ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-gray-600 dark:text-gray-400">
                                {{ $petugas->bidang->nama_bidang ?? '-' }}
                            </td>
                            <td class="px-5 py-4 text-gray-600 dark:text-gray-400">
                                {{ $petugas->email }}
                            </td>
                            <td class="px-5 py-4">
                                @if($petugas->role === 'admin')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-purple-50 px-3 py-1 text-xs font-semibold text-purple-700 dark:bg-purple-900/30 dark:text-purple-300">
                                        <span class="h-1.5 w-1.5 rounded-full bg-purple-500"></span>
                                        Administrator
                                    </span>
                                @elseif($petugas->role === 'teknisi')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
                                        <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                        Tim IT (Teknisi)
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-gray-800 dark:text-gray-400">
                                        <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                                        Pegawai Biasa
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-center">
                                <div class="inline-flex items-center gap-2">
                                    <button @click='openEdit(@json($petugas))'
                                            type="button"
                                            title="Ubah Role"
                                            class="inline-flex items-center gap-1 rounded-lg border border-stroke px-2.5 py-1.5 text-xs font-medium text-gray-700 transition hover:border-primary hover:text-primary dark:border-gray-800 dark:text-gray-300 dark:hover:border-gray-700 dark:hover:text-white">
                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        <span>Ubah</span>
                                    </button>

                                    @if(!$isMe && in_array($petugas->role, ['teknisi', 'admin']))
                                        <button @click="confirmRevoke({{ $petugas->id }}, '{{ addslashes($petugas->nama) }}')"
                                                type="button"
                                                title="Cabut Status Petugas"
                                                class="inline-flex items-center gap-1 rounded-lg border border-stroke px-2.5 py-1.5 text-xs font-medium text-red-600 transition hover:border-red-600 hover:bg-red-50 dark:border-gray-800 dark:text-red-400 dark:hover:border-red-800/40 dark:hover:bg-red-900/20">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            <span>Cabut</span>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-gray-500 dark:text-gray-400">
                                <svg class="mx-auto mb-3 h-10 w-10 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <p class="text-sm font-medium">Tidak ada data pegawai yang cocok dengan filter pencarian.</p>
                                <button @click="openCreate()" type="button" class="mt-3 inline-flex items-center gap-2 rounded-xl bg-[#10B981] px-4 py-2 text-xs font-semibold text-white transition hover:bg-green-700 cursor-pointer">
                                    + Tugaskan Petugas Baru
                                </button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($petugasList->hasPages())
            <div class="border-t border-stroke p-4 dark:border-gray-800">
                {{ $petugasList->links() }}
            </div>
        @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah / Tugaskan Petugas Baru --}}
    <div x-show="showCreateModal"
         x-cloak
         x-transition.opacity.duration.200ms
         class="fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto bg-black/50 p-4 backdrop-blur-xs"
         @keydown.escape.window="showCreateModal = false"
         x-data="{ mode: 'new' }">
        <div class="w-full max-w-lg rounded-2xl border border-stroke bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900"
             @click.outside="showCreateModal = false">
            <div class="mb-4 flex items-center justify-between border-b border-stroke pb-3 dark:border-gray-800">
                <h3 class="text-lg font-semibold text-black dark:text-white">Tambah / Tugaskan Petugas</h3>
                <button @click="showCreateModal = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 cursor-pointer">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Mode Switcher: Pegawai Baru vs Pilih Pegawai Ada --}}
            <div class="mb-5 flex rounded-xl border border-stroke p-1 dark:border-gray-800">
                <button type="button"
                        @click="mode = 'new'"
                        :class="mode === 'new' ? 'bg-brand-500 text-white shadow-xs font-semibold' : 'text-gray-600 hover:text-black dark:text-gray-400 dark:hover:text-white'"
                        class="flex-1 rounded-lg py-2 text-xs transition cursor-pointer">
                    + Daftarkan Pegawai Baru
                </button>
                <button type="button"
                        @click="mode = 'existing'"
                        :class="mode === 'existing' ? 'bg-brand-500 text-white shadow-xs font-semibold' : 'text-gray-600 hover:text-black dark:text-gray-400 dark:hover:text-white'"
                        class="flex-1 rounded-lg py-2 text-xs transition cursor-pointer">
                    Pilih dari Pegawai Terdaftar
                </button>
            </div>

            <form action="{{ route('master.petugas.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="mode" :value="mode">

                {{-- FORM MODE 1: DAFTARKAN PEGAWAI BARU --}}
                <div x-show="mode === 'new'" class="space-y-3.5">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-black dark:text-white">
                            Nama Pegawai <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="nama"
                               :required="mode === 'new'"
                               placeholder="Contoh: Ahmad Fauzi, S.Kom"
                               class="w-full rounded-xl border border-stroke bg-transparent py-2.5 px-4 text-sm text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                    </div>

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-black dark:text-white">
                                NIP Pegawai <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="nip"
                                   inputmode="numeric"
                                   maxlength="18"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                   :required="mode === 'new'"
                                   placeholder="Contoh: 199401012020..."
                                   class="w-full rounded-xl border border-stroke bg-transparent py-2.5 px-4 text-sm text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-black dark:text-white">
                                Bidang <span class="text-xs text-gray-400 font-normal">(Opsional)</span>
                            </label>
                            <select name="bidang_id"
                                    class="w-full rounded-xl border border-stroke bg-transparent py-2.5 px-4 text-sm text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="">-- Pilih Bidang --</option>
                                @foreach($bidangs as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama_bidang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-black dark:text-white">
                            Email
                            <span class="text-xs text-gray-400 font-normal">(Opsional - default: NIP@bpom.go.id)</span>
                        </label>
                        <input type="email"
                               name="email"
                               placeholder="nama@bpom.go.id"
                               class="w-full rounded-xl border border-stroke bg-transparent py-2.5 px-4 text-sm text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        <p class="mt-1 text-[11px] text-gray-500 dark:text-gray-400">
                            🔑 Password default saat pendaftaran adalah: <code class="rounded bg-gray-100 px-1 py-0.5 dark:bg-gray-800">password</code>
                        </p>
                    </div>
                </div>

                {{-- FORM MODE 2: PILIH PEGAWAI TERDAFTAR --}}
                <div x-show="mode === 'existing'" class="space-y-3">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-black dark:text-white">
                            Pilih Pegawai Terdaftar <span class="text-red-500">*</span>
                        </label>
                        <select name="user_id"
                                :required="mode === 'existing'"
                                class="w-full rounded-xl border border-stroke bg-transparent py-2.5 px-4 text-sm text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach($availablePegawai as $pegawai)
                                <option value="{{ $pegawai->id }}">
                                    {{ $pegawai->nama }} (NIP: {{ $pegawai->nip ?? '-' }}) - {{ $pegawai->bidang->nama_bidang ?? 'Umum' }}
                                </option>
                            @endforeach
                        </select>
                        @if($availablePegawai->isEmpty())
                            <p class="mt-1.5 text-xs text-amber-600 dark:text-amber-400">
                                💡 Seluruh pegawai saat ini sudah memiliki peran. Gunakan tab <strong>"+ Daftarkan Pegawai Baru"</strong> di atas untuk menambah pegawai baru.
                            </p>
                        @endif
                    </div>
                </div>

                {{-- PILIHAN PERAN / JENIS PETUGAS (UNTUK KEDUA MODE) --}}
                <div class="pt-2 border-t border-stroke dark:border-gray-800">
                    <label class="mb-2 block text-sm font-medium text-black dark:text-white">
                        Jenis Petugas / Peran <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2">
                        <label class="flex cursor-pointer items-start gap-2.5 rounded-xl border border-stroke p-3 transition hover:border-primary dark:border-gray-800">
                            <input type="radio" name="role" value="teknisi" checked class="mt-0.5 text-primary">
                            <div>
                                <span class="block text-xs font-semibold text-black dark:text-white">Tim IT (Teknisi)</span>
                                <span class="block text-[11px] text-gray-500 dark:text-gray-400">Akses respon & penyelesaian tiket ITSM</span>
                            </div>
                        </label>
                        <label class="flex cursor-pointer items-start gap-2.5 rounded-xl border border-stroke p-3 transition hover:border-primary dark:border-gray-800">
                            <input type="radio" name="role" value="admin" class="mt-0.5 text-primary">
                            <div>
                                <span class="block text-xs font-semibold text-black dark:text-white">Administrator</span>
                                <span class="block text-[11px] text-gray-500 dark:text-gray-400">Akses penuh sistem & master data</span>
                            </div>
                        </label>
                        <label class="flex cursor-pointer items-start gap-2.5 rounded-xl border border-stroke p-3 transition hover:border-primary dark:border-gray-800 sm:col-span-2"
                               x-show="mode === 'new'">
                            <input type="radio" name="role" value="pelapor" class="mt-0.5 text-primary">
                            <div>
                                <span class="block text-xs font-semibold text-black dark:text-white">Pegawai Biasa (Pelapor)</span>
                                <span class="block text-[11px] text-gray-500 dark:text-gray-400">Pengguna standar pemohon layanan TI</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3 pt-3 border-t border-stroke dark:border-gray-800">
                    <button @click="showCreateModal = false" type="button"
                            class="rounded-xl border border-stroke px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-800">
                        Batal
                    </button>
                    <button type="submit"
                            class="rounded-xl bg-brand-500 px-5 py-2.5 text-sm font-medium text-white shadow-theme-xs transition hover:bg-brand-600">
                        Simpan & Tambahkan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Ubah Peran Pegawai --}}
    <div x-show="showEditModal"
         x-cloak
         x-transition.opacity.duration.200ms
         class="fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto bg-black/50 p-4 backdrop-blur-xs"
         @keydown.escape.window="showEditModal = false">
        <div class="w-full max-w-lg rounded-2xl border border-stroke bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900"
             @click.outside="showEditModal = false">
            <div class="mb-4 flex items-center justify-between border-b border-stroke pb-3 dark:border-gray-800">
                <h3 class="text-lg font-semibold text-black dark:text-white">Ubah Peran Petugas</h3>
                <button @click="showEditModal = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 cursor-pointer">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form :action="'{{ url('/master/petugas') }}/' + editTarget.id" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="mb-1 block text-xs text-gray-500 dark:text-gray-400">Nama Pegawai</label>
                    <p class="font-semibold text-gray-900 dark:text-white text-base" x-text="editTarget.nama"></p>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-black dark:text-white">
                        Pilih Peran Baru <span class="text-red-500">*</span>
                    </label>
                    <div class="space-y-2">
                        <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-stroke p-3 transition hover:border-primary dark:border-gray-800">
                            <input type="radio" name="role" value="teknisi" :checked="editTarget.role === 'teknisi'" class="mt-0.5 text-primary">
                            <div>
                                <span class="block text-sm font-medium text-black dark:text-white">Tim IT (Teknisi)</span>
                                <span class="block text-xs text-gray-500 dark:text-gray-400">Bisa merespon & menyelesaikan tiket permohonan / insiden</span>
                            </div>
                        </label>

                        <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-stroke p-3 transition hover:border-primary dark:border-gray-800">
                            <input type="radio" name="role" value="admin" :checked="editTarget.role === 'admin'" class="mt-0.5 text-primary">
                            <div>
                                <span class="block text-sm font-medium text-black dark:text-white">Administrator</span>
                                <span class="block text-xs text-gray-500 dark:text-gray-400">Akses penuh pengaturan master data dan sistem</span>
                            </div>
                        </label>

                        <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-stroke p-3 transition hover:border-primary dark:border-gray-800">
                            <input type="radio" name="role" value="pelapor" :checked="editTarget.role === 'pelapor'" class="mt-0.5 text-primary">
                            <div>
                                <span class="block text-sm font-medium text-black dark:text-white">Pegawai Biasa (Pelapor)</span>
                                <span class="block text-xs text-gray-500 dark:text-gray-400">Kembalikan ke pengguna standar yang hanya bisa membuat aduan</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3 pt-3 border-t border-stroke dark:border-gray-800">
                    <button @click="showEditModal = false" type="button"
                            class="rounded-xl border border-stroke px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-800 cursor-pointer">
                        Batal
                    </button>
                    <button type="submit"
                            class="rounded-xl bg-brand-500 px-5 py-2.5 text-sm font-medium text-white shadow-theme-xs transition hover:bg-brand-600 cursor-pointer">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Konfirmasi Cabut Status Petugas --}}
    <div x-show="showRevokeModal"
         x-cloak
         x-transition.opacity.duration.200ms
         class="fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto bg-black/50 p-4 backdrop-blur-xs"
         @keydown.escape.window="showRevokeModal = false">
        <div class="w-full max-w-md rounded-2xl border border-stroke bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900"
             @click.outside="showRevokeModal = false">
            <div class="mb-4 flex items-center gap-3 text-red-600">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-black dark:text-white">Cabut Status Petugas</h3>
            </div>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Apakah Anda yakin ingin mencabut hak akses Tim IT / Petugas dari <strong class="text-black dark:text-white" x-text="revokeTarget.nama"></strong>? Akun akan kembali menjadi Pegawai Biasa (Pelapor).
            </p>
            <div class="mt-6 flex justify-end gap-3">
                <button @click="showRevokeModal = false" type="button"
                        class="rounded-xl border border-stroke px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-800 cursor-pointer">
                    Batal
                </button>
                <form :action="'{{ url('/master/petugas') }}/' + revokeTarget.id" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="rounded-xl bg-red-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-red-700 cursor-pointer">
                        Ya, Cabut Status
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
