@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Daftar Aduan Saya" />

    <div class="mb-6 flex justify-end">
        <a href="{{ route('incidents.create') }}"
            class="inline-flex items-center px-5 py-2.5 bg-[#10B981] rounded-lg font-medium text-white text-sm hover:bg-green-700 transition">
            + Lapor Kendala Baru
        </a>
    </div>

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

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-800 text-sm text-gray-500 dark:text-gray-400">
                    <th class="px-5 py-4 font-medium">Nomor Aduan</th>
                    <th class="px-5 py-4 font-medium">Aset</th>
                    <th class="px-5 py-4 font-medium">Tanggal</th>
                    <th class="px-5 py-4 font-medium">Deskripsi</th>
                    <th class="px-5 py-4 font-medium">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                    <tr class="border-b border-gray-100 last:border-0 dark:border-gray-800 text-sm">
                        <td class="px-5 py-4 font-medium text-gray-800 dark:text-white/90">{{ $ticket->nomor_aduan ?? $ticket->ticket_number }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->asset?->nama_barang ?? '-' }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->tgl_pelaporan?->format('d/m/Y') ?? '-' }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400 max-w-xs truncate">{{ $ticket->deskripsi_masalah ?? $ticket->description }}</td>
                        <td class="px-5 py-4">
                            <span class="inline-block rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700 dark:bg-gray-800 dark:text-gray-400">
                                {{ $ticket->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                            Belum ada aduan. Klik "Lapor Kendala Baru" untuk membuat laporan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
