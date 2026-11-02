@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Permintaan Layanan Saya" />

    <div x-data="liveTable()">
        <div class="mb-6 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <a href="{{ route('requests.create') }}"
               class="inline-flex items-center justify-center rounded-lg bg-[#10B981] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-green-700">
                + Permintaan Layanan Baru
            </a>    
            <form x-ref="form" @submit.prevent="applyFilter()" method="GET" action="{{ route('requests.index') }}" class="flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nomor / layanan..."
                       @input.debounce.350ms="applyFilter()"
                       class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-4 py-2.5 text-sm text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white sm:w-64">
                <select name="status"
                        @change="applyFilter()"
                        class="cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent px-4 py-2.5 text-sm text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                    <option value="">Semua Status</option>
                    @foreach($statuses as $s)
                        <option value="{{ $s }}" @selected(request('status') === $s)>{{ $s }}</option>
                    @endforeach
                </select>
                <button type="button"
                        @click.prevent="resetFilters()"
                        x-show="hasFilters"
                        x-cloak
                        class="cursor-pointer inline-flex items-center justify-center rounded-lg border border-stroke px-5 py-2.5 text-sm font-medium text-black transition hover:bg-gray-100 dark:border-gray-800 dark:text-white dark:hover:bg-meta-4">
                    Reset
                </button>
            </form>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        {{-- Wrapper Tabel & Pagination dengan Overlay Loading Spinner --}}
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
                <div class="w-full max-w-full overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    {{-- Tampilan Desktop Table (>= sm) --}}
                    <div class="hidden sm:block w-full max-w-full overflow-x-auto custom-scrollbar">
                        <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-800 text-sm text-gray-500 dark:text-gray-400">
                                <th class="px-5 py-4 font-medium">Nomor</th>
                                <th class="px-5 py-4 font-medium">Layanan</th>
                                <th class="px-5 py-4 font-medium">Deskripsi</th>
                                
                                <th class="px-5 py-4 font-medium">Tanggal</th>
                                <th class="px-5 py-4 font-medium">Status</th>
                                <th class="px-5 py-4 text-center font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($requests as $req)
                                <tr class="border-b border-gray-100 last:border-0 dark:border-gray-800 text-sm hover:bg-gray-50 dark:hover:bg-white/[0.03] cursor-pointer"
                                    onclick="window.location='{{ route('requests.show', $req->id) }}'">
                                    <td class="px-5 py-4 font-medium text-gray-800 dark:text-white/90">{{ $req->nomor_request }}</td>
                                    <td class="px-5 py-4 text-gray-600 dark:text-gray-400 max-w-xs truncate">{{ match($req->layanan) { 'reset_password' => 'Reset Password', 'tambah_akun' => 'Tambah Akun', 'rapat' => 'Operator Rapat', 'zoom' => 'Link Zoom', default => ucwords(str_replace('_', ' ', $req->layanan ?? '-')) } }}</td>
                                    <td class="px-5 py-4 text-gray-600 dark:text-gray-400 max-w-xs truncate" title="{{ $req->deskripsi }}">{{ $req->deskripsi ?? "-" }}</td>
                                    <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->tgl_request?->format('d/m/Y') ?? '-' }}</td>
                                    <td class="px-5 py-4">
                                        @php
                                            $statusBadge = match ($req->status) {
                                                'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
                                                'Diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
                                                'Diajukan' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-800/20 dark:text-yellow-400',
                                                'Ditolak' => 'bg-red-200 text-red-600 dark:bg-red-800/20 dark:text-red-300',
                                                default => 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-400',
                                            };
                                        @endphp
                                        <span class="inline-flex items-center gap-1 whitespace-nowrap rounded-full px-3 py-1 text-xs font-medium capitalize {{ $statusBadge }}"
                                              @if($req->needsConfirmationAlert()) title="Belum dikonfirmasi oleh pemohon" @endif>
                                            <span>{{ $req->status }}</span>
                                            @if($req->needsConfirmationAlert())
                                                <svg class="h-3.5 w-3.5 text-amber-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </span>
                                    </td>
                                    <td class="px-5 py-4" onclick="event.stopPropagation()">
                                        <div class="flex items-center justify-center gap-2">
                                            {{-- Detail --}}
                                            <a href="{{ route('requests.show', $req->id) }}" title="Detail" aria-label="Detail"
                                               class="cursor-pointer inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-primary hover:text-primary dark:border-gray-800 dark:text-gray-400">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                                </svg>
                                            </a>

                                            {{-- Edit --}}
                                            @if($req->status === 'Diajukan')
                                                <a href="{{ route('requests.edit', $req->id) }}" title="Edit" aria-label="Edit"
                                                   class="cursor-pointer inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-warning hover:text-warning dark:border-gray-800 dark:text-gray-400">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                                    </svg>
                                                </a>
                                            @endif

                                            {{-- Hapus (soft delete) --}}
                                            @if(auth()->user()->isTeknisi() || auth()->user()->isAdmin())
                                                <form action="{{ route('requests.destroy', $req->id) }}" method="POST"
                                                      onsubmit="return confirm('Hapus permintaan layanan {{ $req->nomor_request }}? Data tetap tersimpan sebagai arsip.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Hapus" aria-label="Hapus"
                                                            class="cursor-pointer inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-danger hover:text-danger dark:border-gray-800 dark:text-gray-400">
                                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                                        Belum ada permintaan layanan. Klik "+ Permintaan Layanan Baru" untuk mengajukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Tampilan Mobile Cards (< sm) --}}
                <div class="block sm:hidden divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse ($requests as $req)
                        @php
                            $statusBadge = match ($req->status) {
                                'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
                                'Diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
                                'Diajukan' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-800/20 dark:text-yellow-400',
                                'Ditolak' => 'bg-red-200 text-red-600 dark:bg-red-800/20 dark:text-red-300',
                                default => 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-400',
                            };
                        @endphp
                        <div class="p-4 hover:bg-gray-50 dark:hover:bg-white/[0.02] transition cursor-pointer"
                             onclick="window.location='{{ route('requests.show', $req->id) }}'">
                            {{-- Baris 1: Nomor & Status Badge --}}
                            <div class="flex items-center justify-between gap-2 mb-2">
                                <span class="font-semibold text-sm text-gray-900 dark:text-white">
                                    {{ $req->nomor_request }}
                                </span>
                                <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-0.5 text-xs font-medium capitalize {{ $statusBadge }}"
                                      @if($req->needsConfirmationAlert()) title="Belum dikonfirmasi oleh pemohon" @endif>
                                    <span>{{ $req->status }}</span>
                                    @if($req->needsConfirmationAlert())
                                        <svg class="h-3 w-3 text-amber-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </span>
                            </div>

                            {{-- Baris 2: Layanan & Tanggal --}}
                            <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 mb-2">
                                <span class="inline-flex items-center rounded-md bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400 px-1.5 py-0.5 text-[11px] font-medium">
                                    {{ match($req->layanan) { 'reset_password' => 'Reset Password', 'tambah_akun' => 'Tambah Akun', 'rapat' => 'Operator Rapat', 'zoom' => 'Link Zoom', default => ucwords(str_replace('_', ' ', $req->layanan ?? '-')) } }}
                                </span>
                                <span>{{ $req->tgl_request?->format('d/m/Y') ?? ($req->created_at?->format('d/m/Y') ?? '-') }}</span>
                            </div>

                            {{-- Baris 3: Cuplikan Deskripsi --}}
                            <p class="text-xs text-gray-600 dark:text-gray-400 line-clamp-2 mb-3">
                                {{ $req->deskripsi ?? '-' }}
                            </p>

                            {{-- Baris 4: Tombol Aksi --}}
                            <div class="flex items-center justify-end border-t border-gray-100 dark:border-gray-800/60 pt-2.5 gap-1.5" onclick="event.stopPropagation()">
                                <a href="{{ route('requests.show', $req->id) }}" title="Detail" aria-label="Detail"
                                   class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-primary hover:text-primary dark:border-gray-800 dark:text-gray-400">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </a>

                                @if($req->status === 'Diajukan')
                                    <a href="{{ route('requests.edit', $req->id) }}" title="Edit" aria-label="Edit"
                                       class="cursor-pointer inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-warning hover:text-warning dark:border-gray-800 dark:text-gray-400">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                        </svg>
                                    </a>
                                @endif

                                @if(auth()->user()->isTeknisi() || auth()->user()->isAdmin())
                                    <form action="{{ route('requests.destroy', $req->id) }}" method="POST"
                                          onsubmit="return confirm('Hapus permintaan layanan {{ $req->nomor_request }}? Data tetap tersimpan sebagai arsip.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus" aria-label="Hapus"
                                                class="cursor-pointer inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-danger hover:text-danger dark:border-gray-800 dark:text-gray-400">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-sm text-gray-500 dark:text-gray-400">
                            Belum ada permintaan layanan. Klik "+ Permintaan Layanan Baru" untuk mengajukan.
                        </div>
                    @endforelse
                </div>
                </div>

                @if($requests->hasPages())
                    <div class="mt-6">
                        {{ $requests->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
