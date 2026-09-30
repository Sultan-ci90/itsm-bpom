@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Semua Request" />

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-800 text-sm text-gray-500 dark:text-gray-400">
                    <th class="px-5 py-4 font-medium">Nomor</th>
                    <th class="px-5 py-4 font-medium">Judul</th>
                    <th class="px-5 py-4 font-medium">Pemohon</th>
                    <th class="px-5 py-4 font-medium">Kategori</th>
                    <th class="px-5 py-4 font-medium">Prioritas</th>
                    <th class="px-5 py-4 font-medium">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $req)
                    <tr class="border-b border-gray-100 last:border-0 dark:border-gray-800 text-sm hover:bg-gray-50 dark:hover:bg-white/[0.03] cursor-pointer"
                        onclick="window.location='{{ route('requests.show', $req->id) }}'">
                        <td class="px-5 py-4 font-medium text-gray-800 dark:text-white/90">{{ $req->nomor_request }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400 max-w-xs truncate">{{ $req->layanan ? ucfirst($req->layanan) : "-" }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->user?->nama ?? '-' }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->lokasi ?? "-" }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400"></td>
                        <td class="px-5 py-4">
                            <span class="inline-block rounded-full bg-gray-100 px-3 py-1 text-xs font-medium capitalize text-gray-700 dark:bg-gray-800 dark:text-gray-400">{{ $req->status }}</span>
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
