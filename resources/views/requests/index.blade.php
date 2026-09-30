@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Request Saya" />

    <div class="mb-6 flex justify-end">
        <a href="{{ route('requests.create') }}"
            class="inline-flex items-center px-5 py-2.5 bg-[#10B981] rounded-lg font-medium text-white text-sm hover:bg-green-700 transition">
            + Buat Request Baru
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-800 text-sm text-gray-500 dark:text-gray-400">
                    <th class="px-5 py-4 font-medium">Nomor</th>
                    <th class="px-5 py-4 font-medium">Layanan</th>
                    <th class="px-5 py-4 font-medium">Lokasi</th>
                    
                    <th class="px-5 py-4 font-medium">Tanggal</th>
                    <th class="px-5 py-4 font-medium">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $req)
                    <tr class="border-b border-gray-100 last:border-0 dark:border-gray-800 text-sm hover:bg-gray-50 dark:hover:bg-white/[0.03] cursor-pointer"
                        onclick="window.location='{{ route('requests.show', $req->id) }}'">
                        <td class="px-5 py-4 font-medium text-gray-800 dark:text-white/90">{{ $req->nomor_request }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400 max-w-xs truncate">{{ $req->layanan ? ucfirst($req->layanan) : "-" }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->lokasi ?? "-" }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->tgl_request?->format('d/m/Y') ?? '-' }}</td>
                        <td class="px-5 py-4">
                            @php
                                $statusBadge = match ($req->status) {
                                    'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
                                    'Diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
                                    'Ditolak' => 'bg-red-100 text-red-700 dark:bg-red-800/20 dark:text-red-400',
                                    default => 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-400',
                                };
                            @endphp
                            <span class="inline-block rounded-full px-3 py-1 text-xs font-medium capitalize {{ $statusBadge }}">{{ $req->status }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                            Belum ada request. Klik "Buat Request Baru" untuk mengajukan permintaan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
