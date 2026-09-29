@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Detail Request {{ $req->nomor_request }}" />

    <div class="mb-6">
        <a href="{{ url()->previous() }}" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400">&larr; Kembali</a>
    </div>

    <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <dl class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->nomor_request }}</dd></div>
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt><dd class="text-base capitalize text-gray-800 dark:text-white/90">{{ $req->status }}</dd></div>
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->judul_permintaan }}</dd></div>
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori / Prioritas</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->kategori }} &middot; {{ $req->prioritas }}</dd></div>
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Permintaan</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->tgl_permintaan?->format('d/m/Y H:i') ?? '-' }}</dd></div>
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Ditagihkan Ke</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->teknisi?->name ?? 'Belum ditugaskan' }}</dd></div>
            <div class="sm:col-span-2"><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Aset Terkait</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->asset ? $req->asset->kode_barang . ' - ' . $req->asset->nama_barang : 'Tidak terkait aset' }}</dd></div>
            <div class="sm:col-span-2"><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</dt><dd class="text-base whitespace-pre-line text-gray-800 dark:text-white/90">{{ $req->deskripsi }}</dd></div>
        </dl>
    </div>
@endsection
