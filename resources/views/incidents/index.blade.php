@extends('layouts.app')

@section('content')
@php
    $user    = auth()->user();
    $isStaff = $user->isTeknisi() || $user->isAdmin();

    $badge = [
        'Belum diperiksa' => 'bg-danger/10 text-danger',
        'Sedang diproses' => 'bg-warning/10 text-warning',
        'Selesai'         => 'bg-success/10 text-success',
        'Ditolak'         => 'bg-gray-200 text-gray-600 dark:bg-meta-4 dark:text-gray-300',
    ];
    $statuses = ['Belum diperiksa', 'Sedang diproses', 'Selesai', 'Ditolak'];
@endphp

    <x-common.page-breadcrumb :pageTitle="$isStaff ? 'Daftar Aduan' : 'Daftar Aduan Saya'" />

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
        <form method="GET" action="{{ route('incidents.index') }}" class="flex flex-col gap-3 sm:flex-row">
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
                    class="inline-flex items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white transition hover:bg-opacity-90">
                Filter
            </button>
            @if(request()->filled('q') || request()->filled('status'))
                <a href="{{ route('incidents.index') }}"
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
                        <tr class="border-b border-gray-100 text-sm last:border-0 dark:border-gray-800">
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
                            <td class="px-5 py-4 text-center">
                                @if($isStaff && !$final)
                                    <a href="{{ route('incidents.show', $ticket) }}"
                                       class="inline-flex items-center rounded-lg bg-primary px-4 py-1.5 text-xs font-medium text-white transition hover:bg-opacity-90">
                                        Proses
                                    </a>
                                @else
                                    <a href="{{ route('incidents.show', $ticket) }}"
                                       class="inline-flex items-center rounded-lg border border-stroke px-4 py-1.5 text-xs font-medium text-black transition hover:bg-gray-100 dark:border-gray-800 dark:text-white dark:hover:bg-meta-4">
                                        Detail
                                    </a>
                                @endif
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