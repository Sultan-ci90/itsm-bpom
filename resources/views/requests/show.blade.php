@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-5xl p-4 md:p-6">
    
    {{-- Header & Breadcrumb --}}
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">
            Detail Permintaan: {{ $req->nomor_request }}
        </h2>
        <a href="{{ route('requests.index') }}" class="text-sm font-medium text-primary hover:underline">
            &larr; Kembali ke Daftar
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        
        {{-- KOLOM KIRI: Detail Informasi (Col Span 2) --}}
        <div class="lg:col-span-2 space-y-6">
            
            {{-- Card Informasi Umum --}}
            <div class="rounded-sm border border-stroke bg-white p-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="mb-4 flex items-center justify-between border-b border-stroke pb-3 dark:border-strokedark">
                    <h3 class="text-lg font-semibold text-black dark:text-white">Informasi Permintaan</h3>
                    <span class="rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary dark:bg-primary/20">
                        {{ ucfirst($req->layanan) }}
                    </span>
                </div>
                
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 text-sm">
                    <div>
                        <span class="block text-gray-500 dark:text-gray-400">Pemohon:</span> 
                        <span class="font-medium text-black dark:text-white">{{ $req->user->nama }}</span>
                        <span class="block text-xs text-gray-500">NIP: {{ $req->user->nip }}</span>
                    </div>
                    <div>
                        <span class="block text-gray-500 dark:text-gray-400">Tanggal Request:</span> 
                        <span class="font-medium text-black dark:text-white">{{ $req->tgl_request->format('d M Y') }}</span>
                    </div>
                    <div>
                        <span class="block text-gray-500 dark:text-gray-400">Lokasi:</span> 
                        <span class="font-medium text-black dark:text-white">{{ $req->lokasi }}</span>
                    </div>
                    <div>
                        <span class="block text-gray-500 dark:text-gray-400">Status Saat Ini:</span> 
                        @php
                            $statusColor = match($req->status) {
                                'Diajukan' => 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-300',
                                'Diproses' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
                                'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                                'Ditolak' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                            };
                        @endphp
                        <span class="inline-block rounded-full px-3 py-1 text-xs font-medium {{ $statusColor }}">
                            {{ $req->status }}
                        </span>
                    </div>
                    @if($req->deskripsi)
                    <div class="sm:col-span-2">
                        <span class="block text-gray-500 dark:text-gray-400">Deskripsi Tambahan:</span> 
                        <p class="mt-1 text-black dark:text-white whitespace-pre-line">{{ $req->deskripsi }}</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Card Detail Dinamis (Berdasarkan Jenis Layanan) --}}
            <div class="rounded-sm border border-stroke bg-white p-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <h3 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Layanan</h3>
                
                @if($req->layanan === 'zoom' && $req->detailZoom)
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 text-sm">
                        <div class="sm:col-span-2">
                            <span class="block text-gray-500 dark:text-gray-400">Nama Acara:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailZoom->nama_acara }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 dark:text-gray-400">Bidang:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailZoom->bidang->nama_bidang ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 dark:text-gray-400">Jenis Acara:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailZoom->jenis_acara }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 dark:text-gray-400">Waktu:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailZoom->jam_mulai }} - {{ $req->detailZoom->jam_selesai }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 dark:text-gray-400">Butuh Operator:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailZoom->butuh_operator }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 dark:text-gray-400">Bentuk Ruangan:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailZoom->bentuk_ruangan }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 dark:text-gray-400">Jumlah Kursi:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailZoom->jumlah_kursi }} Orang</span>
                        </div>
                    </div>

                @elseif($req->layanan === 'akun' && $req->detailAkun)
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 text-sm">
                        <div>
                            <span class="block text-gray-500 dark:text-gray-400">Jenis Pengajuan:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailAkun->jenis_pengajuan }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 dark:text-gray-400">Sistem Tujuan:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailAkun->sistem_tujuan }}</span>
                        </div>
                        <div class="sm:col-span-2">
                            <span class="block text-gray-500 dark:text-gray-400">NIP Terkait:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailAkun->nip_terkait }}</span>
                        </div>
                    </div>

                @elseif($req->layanan === 'peminjaman' && $req->detailPeminjaman)
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 text-sm">
                        <div class="sm:col-span-2">
                            <span class="block text-gray-500 dark:text-gray-400">Jenis Perangkat:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailPeminjaman->jenis_perangkat }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 dark:text-gray-400">Tanggal Mulai:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailPeminjaman->tgl_mulai?->format('d M Y') ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 dark:text-gray-400">Tanggal Kembali:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailPeminjaman->tgl_kembali?->format('d M Y') ?? '-' }}</span>
                        </div>
                        <div class="sm:col-span-2">
                            <span class="block text-gray-500 dark:text-gray-400">Lokasi Penggunaan:</span>
                            <span class="font-medium text-black dark:text-white">{{ $req->detailPeminjaman->lokasi_penggunaan }}</span>
                        </div>
                        <div class="sm:col-span-2">
                            <span class="block text-gray-500 dark:text-gray-400">Keperluan:</span>
                            <p class="text-black dark:text-white whitespace-pre-line">{{ $req->detailPeminjaman->keperluan }}</p>
                        </div>
                    </div>

                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">Tidak ada detail tambahan untuk jenis layanan ini.</p>
                @endif
            </div>
        </div>

        {{-- KOLOM KANAN: Form Aksi Teknisi (Col Span 1) --}}
        <div class="lg:col-span-1">
            <div class="rounded-sm border border-stroke bg-white p-6 shadow-default dark:border-strokedark dark:bg-boxdark sticky top-4">
                <h3 class="mb-4 text-lg font-semibold text-black dark:text-white">Aksi Teknisi</h3>
                
                @if(auth()->user()->isTeknisi() || auth()->user()->isAdmin())
                    @if($req->status === 'Selesai' || $req->status === 'Ditolak')
                        <div class="rounded-lg bg-gray-50 p-4 text-center dark:bg-[#1C2434]">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Permintaan ini sudah {{ strtolower($req->status) }}.</p>
                            <p class="mt-1 text-xs text-gray-500">Hubungi admin jika perlu dibuka kembali.</p>
                        </div>
                    @else
                        <form action="{{ route('requests.update', $req) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-4">
                                <label class="mb-2 block text-sm font-medium text-black dark:text-white">Ubah Status</label>
                                <select name="status" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-strokedark dark:bg-[#1C2434] dark:text-white">
                                    <option value="Diajukan" {{ $req->status === 'Diajukan' ? 'selected' : '' }}>Diajukan</option>
                                    <option value="Diproses" {{ $req->status === 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Selesai" {{ $req->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Ditolak" {{ $req->status === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full rounded-lg bg-primary py-3 text-center font-medium text-white hover:bg-opacity-90 transition">
                                Perbarui Status
                            </button>
                        </form>
                    @endif
                @else
                    <div class="rounded-lg bg-gray-50 p-4 text-center dark:bg-[#1C2434]">
                        <p class="text-sm text-gray-600 dark:text-gray-300">Hanya Tim IT yang dapat mengubah status permintaan ini.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection