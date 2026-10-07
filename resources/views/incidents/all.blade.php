@extends('layouts.app')

@section('content')
@php
    $user    = auth()->user();
    $isStaff = $user->isTeknisi() || $user->isAdmin();

    $badge = [
        'Belum diperiksa' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-800/20 dark:text-yellow-400',
        'Sedang diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
        'Selesai'         => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
        'Ditolak'         => 'bg-red-100 text-red-700 dark:bg-red-800/20 dark:text-red-400',
    ];
    $statuses = ['Belum diperiksa', 'Sedang diproses', 'Selesai', 'Ditolak'];
@endphp

    <x-common.page-breadcrumb pageTitle="Semua Aduan" />

    @if (session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            {{ session('error') }}
        </div>
    @endif

    {{-- Filter + tombol tambah --}}
    <div class="mb-6 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
        <form method="GET" action="{{ route('incidents.all') }}" class="flex flex-col gap-3 sm:flex-row">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nomor / deskripsi..."
                   class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-4 py-2.5 text-sm text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white sm:w-64">
            <select name="status"
                    class="rounded-lg border-[1.5px] border-stroke bg-transparent px-4 py-2.5 text-sm text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                <option value="">Semua Status</option>
                @foreach($statuses as $s)
                    <option value="{{ $s }}" @selected(request('status') === $s)>{{ $s }}</option>
                @endforeach
            </select>
            <button type="submit"
                    class="inline-flex items-center justify-center rounded-lg border-[1.5px] border-stroke bg-transparent px-4 py-2.5 text-sm font-medium text-black dark:text-white transition hover:bg-opacity-90">
                Filter
            </button>
            @if(request()->filled('q') || request()->filled('status'))
                <a href="{{ route('incidents.all') }}"
                   class="inline-flex items-center justify-center rounded-lg border border-stroke px-5 py-2.5 text-sm font-medium text-black transition hover:bg-gray-100 dark:border-gray-800 dark:text-white dark:hover:bg-meta-4">
                    Reset
                </a>
            @endif
        </form>

        <a href="{{ route('incidents.create') }}"
           class="inline-flex items-center justify-center rounded-lg bg-[#10B981] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-green-700">
            + Lapor Kendala Baru
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gray-200 text-sm text-gray-500 dark:border-gray-800 dark:text-gray-400">
                        <th class="px-5 py-4 font-medium">Nomor Aduan</th>
                        @if($isStaff)
                            <th class="px-5 py-4 font-medium">Pelapor</th>
                        @endif
                        <th class="px-5 py-4 font-medium">Aset</th>
                        <th class="px-5 py-4 font-medium">Tanggal</th>
                        <th class="px-5 py-4 font-medium">Deskripsi</th>
                        <th class="px-5 py-4 font-medium">Status</th>
                        <th class="px-5 py-4 text-center font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $ticket)
                        @php $final = in_array($ticket->status, ['Selesai', 'Ditolak']); @endphp
                        <tr class="border-b border-gray-100 text-sm last:border-0 dark:border-gray-800 cursor-pointer hover:bg-gray-50 dark:hover:bg-white/[0.03]"
                            onclick="window.location='{{ route('incidents.show', $ticket) }}'">
                            <td class="whitespace-nowrap px-5 py-4 font-medium text-gray-800 dark:text-white/90">{{ $ticket->nomor_aduan }}</td>
                            @if($isStaff)
                                <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->pelapor->nama ?? '-' }}</td>
                            @endif
                            <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->asset?->nama_barang ?? '-' }}</td>
                            <td class="whitespace-nowrap px-5 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->tgl_pelaporan?->format('d/m/Y') ?? '-' }}</td>
                            <td class="max-w-xs truncate px-5 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->deskripsi_masalah }}</td>
                            <td class="px-5 py-4">
                                <span class="inline-block whitespace-nowrap rounded-full px-3 py-1 text-xs font-medium {{ $badge[$ticket->status] ?? $badge['Ditolak'] }}">
                                    {{ $ticket->status }}
                                </span>
                            </td>
                            <td class="px-5 py-4" onclick="event.stopPropagation()">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Detail (semua role) --}}
                                    <a href="{{ route('incidents.show', $ticket) }}" title="Detail" aria-label="Detail"
                                       class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-primary hover:text-primary dark:border-gray-800 dark:text-gray-400">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </a>

                                    @if($isStaff)
                                        {{-- Proses / tindak lanjut (hanya tiket belum final) --}}
                                        @if(!$final)
                                            <a href="{{ route('incidents.show', $ticket) }}#proses" title="Proses / Tindak Lanjut" aria-label="Proses"
                                               class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-success hover:text-success dark:border-gray-800 dark:text-gray-400">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/><path d="M9 14l2 2 4-4"/>
                                                </svg>
                                            </a>
                                        @endif

                                        {{-- Edit data aduan --}}
                                        <a href="{{ route('incidents.edit', $ticket) }}" title="Edit" aria-label="Edit"
                                           class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-warning hover:text-warning dark:border-gray-800 dark:text-gray-400">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                            </svg>
                                        </a>

                                        {{-- Hapus (soft delete) --}}
                                        <form action="{{ route('incidents.destroy', $ticket) }}" method="POST"
                                              onsubmit="return confirm('Hapus aduan {{ $ticket->nomor_aduan }}? Data tetap tersimpan sebagai arsip.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus" aria-label="Hapus"
                                                    class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-danger hover:text-danger dark:border-gray-800 dark:text-gray-400">
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
                            <td colspan="{{ $isStaff ? 7 : 6 }}" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                                @if(request()->filled('q') || request()->filled('status'))
                                    Tidak ada aduan yang cocok dengan filter.
                                @else
                                    Belum ada aduan. Klik "Lapor Kendala Baru" untuk membuat laporan.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $tickets->links() }}
    </div>
@endsection