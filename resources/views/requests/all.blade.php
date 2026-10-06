@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Semua Request" />

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-800 text-sm text-gray-500 dark:text-gray-400">
                    <th class="px-5 py-4 font-medium">Nomor</th>
                    <th class="px-5 py-4 font-medium">Layanan</th>
                    <th class="px-5 py-4 font-medium">Pemohon</th>
                    <th class="px-5 py-4 font-medium">Lokasi</th>
                    <th class="px-5 py-4 font-medium">Status</th>
                    <th class="px-5 py-4 text-center font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $req)
                    @php $final = in_array($req->status, ['Selesai', 'Ditolak']); @endphp
                    <tr class="border-b border-gray-100 last:border-0 dark:border-gray-800 text-sm hover:bg-gray-50 dark:hover:bg-white/[0.03] cursor-pointer"
                        onclick="window.location='{{ route('requests.show', $req->id) }}'">
                        <td class="px-5 py-4 font-medium text-gray-800 dark:text-white/90">{{ $req->nomor_request }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400 max-w-xs truncate">{{ $req->layanan ? ucfirst($req->layanan) : "-" }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->user?->nama ?? '-' }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->lokasi ?? "-" }}</td>
                        <td class="px-5 py-4">
                            @php
                                $statusBadge = match ($req->status) {
                                    'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
                                    'Diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
                                    'Diajukan' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-800/20 dark:text-yellow-400',
                                    'Ditolak' => 'bg-gray-200 text-gray-600 dark:bg-meta-4 dark:text-gray-300',
                                    default => 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-400',
                                };
                            @endphp
                            <span class="inline-block rounded-full px-3 py-1 text-xs font-medium capitalize {{ $statusBadge }}">{{ $req->status }}</span>
                        </td>
                        <td class="px-5 py-4" onclick="event.stopPropagation()">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('requests.show', $req->id) }}" title="Detail" aria-label="Detail"
                                   class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-primary hover:text-primary dark:border-gray-800 dark:text-gray-400">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </a>

                                @if(!$final)
                                    <a href="{{ route('requests.show', $req->id) }}#tindak-lanjut" title="Proses / Tindak Lanjut" aria-label="Proses"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-success hover:text-success dark:border-gray-800 dark:text-gray-400">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/><path d="M9 14l2 2 4-4"/>
                                        </svg>
                                    </a>
                                @endif

                                <form action="{{ route('requests.destroy', $req->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus request {{ $req->nomor_request }}? Data tetap tersimpan sebagai arsip.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus" aria-label="Hapus"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-stroke text-gray-500 transition hover:border-danger hover:text-danger dark:border-gray-800 dark:text-gray-400">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">Belum ada request.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
