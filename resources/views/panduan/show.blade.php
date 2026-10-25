@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-4xl py-4"
     x-data="{
         voted: false,
         feedbackType: '',
         yesCount: {{ $panduan->helpful_yes }},
         noCount: {{ $panduan->helpful_no }},
         showImageModal: false,
         async sendFeedback(type) {
             if (this.voted) return;
             this.feedbackType = type;
             this.voted = true;

             try {
                 const res = await fetch('{{ route('panduan.feedback', $panduan->id) }}', {
                     method: 'POST',
                     headers: {
                         'Content-Type': 'application/json',
                         'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                         'Accept': 'application/json'
                     },
                     body: JSON.stringify({ helpful: type })
                 });
                 const data = await res.json();
                 if (data.success) {
                     this.yesCount = data.yes;
                     this.noCount = data.no;
                 }
             } catch (e) {
                 console.error('Gagal mengirim umpan balik:', e);
             }
         }
     }">

    {{-- Breadcrumb --}}
    <nav class="mb-6 flex items-center text-xs text-gray-500 dark:text-gray-400">
        <ol class="flex flex-wrap items-center gap-1.5">
            <li>
                <a href="{{ route('dashboard') }}" class="transition hover:text-primary">Dashboard</a>
            </li>
            <li><span class="text-gray-400">/</span></li>
            <li>
                <a href="{{ route('panduan.index') }}" class="transition hover:text-primary">Pusat Bantuan & Panduan</a>
            </li>
            <li><span class="text-gray-400">/</span></li>
            <li class="font-medium text-gray-800 dark:text-white/90 truncate max-w-xs">{{ $panduan->judul }}</li>
        </ol>
    </nav>

    {{-- Feedback Alert --}}
    @if(session('success'))
        <div class="mb-6 flex items-center justify-between rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            <div class="flex items-center gap-2.5">
                <svg class="h-5 w-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- KARTU UTAMA ARTIKEL --}}
    <div class="rounded-2xl border border-stroke bg-white p-6 shadow-default dark:border-gray-800 dark:bg-white/[0.03] sm:p-10">
        
        {{-- Metadata Bar --}}
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-stroke pb-6 dark:border-gray-800">
            <div class="flex flex-wrap items-center gap-2.5">
                <span class="inline-block rounded-lg border px-3 py-1 text-xs font-semibold {{ $panduan->kategori_badge }}">
                    {{ $panduan->kategori }}
                </span>
                <span class="text-xs text-gray-400">&bull;</span>
                <span class="text-xs text-gray-500 dark:text-gray-400">
                    Diperbarui {{ $panduan->updated_at->format('d M Y') }}
                </span>
                <span class="text-xs text-gray-400">&bull;</span>
                <span class="inline-flex items-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    {{ $panduan->views }} kali dibaca
                </span>
            </div>

            {{-- Opsi Staf (Edit / Hapus) --}}
            @if($isStaff)
                <div class="flex items-center gap-2">
                    <a href="{{ route('panduan.edit', $panduan->id) }}"
                       class="inline-flex items-center gap-1 rounded-lg border border-stroke px-3 py-1.5 text-xs font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                        <svg class="h-3.5 w-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>Edit</span>
                    </a>
                    <form action="{{ route('panduan.destroy', $panduan->id) }}" method="POST"
                          onsubmit="return confirm('Hapus artikel panduan ini secara permanen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center gap-1 rounded-lg border border-stroke px-3 py-1.5 text-xs font-medium text-red-600 transition hover:bg-red-50 dark:border-gray-700 dark:text-red-400 dark:hover:bg-red-950/20 cursor-pointer">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            <span>Hapus</span>
                        </button>
                    </form>
                </div>
            @endif
        </div>

        {{-- Judul Artikel --}}
        <h1 class="mt-6 text-2xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-3xl">
            {{ $panduan->judul }}
        </h1>

        {{-- Penulis --}}
        <div class="mt-3 flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
            <span>Diterbitkan oleh: <strong>{{ $panduan->author?->nama ?? 'Tim IT BPOM' }}</strong></span>
        </div>

        {{-- Kotak Ringkasan --}}
        <div class="mt-6 rounded-xl border border-emerald-500/20 bg-emerald-50/50 p-4 text-sm text-emerald-900 dark:border-emerald-500/20 dark:bg-emerald-950/20 dark:text-emerald-300">
            <div class="flex items-start gap-3">
                <svg class="h-5 w-5 text-emerald-600 dark:text-emerald-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <h4 class="font-semibold text-xs uppercase tracking-wider text-emerald-800 dark:text-emerald-400 mb-1">Ringkasan Masalah</h4>
                    <p class="text-xs sm:text-sm leading-relaxed">{{ $panduan->ringkasan }}</p>
                </div>
            </div>
        </div>

        {{-- Gambar Screenshot Tutorial (Jika ada) --}}
        @if($panduan->gambar)
            <div class="mt-8">
                <h4 class="mb-3 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                    Lampiran Tangkapan Layar (Tutorial)
                </h4>
                <div class="overflow-hidden rounded-xl border border-stroke bg-gray-50 dark:border-gray-800 dark:bg-gray-900 cursor-zoom-in"
                     @click="showImageModal = true">
                    <img src="{{ asset('storage/' . $panduan->gambar) }}"
                         alt="{{ $panduan->judul }}"
                         class="w-full max-h-[420px] object-contain transition hover:scale-[1.01]">
                </div>
                <p class="mt-1.5 text-center text-[11px] text-gray-400">Klik gambar untuk melihat ukuran penuh</p>
            </div>

            {{-- Modal Pembesar Gambar --}}
            <div x-show="showImageModal" x-cloak x-transition.opacity.duration.200ms
                 class="fixed inset-0 z-99999 flex items-center justify-center bg-black/80 p-4 backdrop-blur-xs"
                 @keydown.escape.window="showImageModal = false"
                 @click.self="showImageModal = false">
                <div class="relative max-w-5xl">
                    <button @click="showImageModal = false" class="cursor-pointer absolute -top-10 end-0 text-white hover:text-gray-300 text-sm font-semibold">
                        &times; Tutup
                    </button>
                    <img src="{{ asset('storage/' . $panduan->gambar) }}" alt="{{ $panduan->judul }}" class="max-h-[85vh] w-auto rounded-lg shadow-2xl">
                </div>
            </div>
        @endif

        {{-- Langkah-Langkah Solusi --}}
        <div class="mt-8">
            <h3 class="mb-4 text-lg font-bold text-gray-900 dark:text-white">
                Langkah-Langkah Solusi
            </h3>
            <div class="prose max-w-none text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                {!! nl2br(e($panduan->solusi)) !!}
            </div>
        </div>

        {{-- SECTION FEEDBACK PEMBACA --}}
        <div class="mt-12 rounded-2xl border border-stroke bg-gray-50/70 p-6 text-center dark:border-gray-800 dark:bg-white/[0.02]">
            <h4 class="text-sm font-semibold text-gray-900 dark:text-white">
                Apakah panduan ini membantu menyelesaikan kendala Anda?
            </h4>
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                Tanggapan Anda membantu kami meningkatkan kualitas materi panduan mandiri.
            </p>

            <div class="mt-4 flex flex-wrap items-center justify-center gap-3" x-show="!voted">
                <button type="button"
                        @click="sendFeedback('yes')"
                        class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-2.5 text-xs font-semibold text-emerald-700 shadow-xs border border-emerald-200 transition hover:bg-emerald-50 dark:bg-emerald-950/20 dark:border-emerald-800/50 dark:text-emerald-300 dark:hover:bg-emerald-900/30 cursor-pointer">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                    </svg>
                    <span>Ya, Sangat Membantu (<span x-text="yesCount"></span>)</span>
                </button>

                <button type="button"
                        @click="sendFeedback('no')"
                        class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-2.5 text-xs font-semibold text-gray-600 shadow-xs border border-gray-200 transition hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700 cursor-pointer">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"/>
                    </svg>
                    <span>Belum Menyelesaikan (<span x-text="noCount"></span>)</span>
                </button>
            </div>

            <div x-show="voted" x-cloak class="mt-4 inline-flex items-center gap-2 rounded-xl bg-emerald-100/70 px-4 py-2 text-xs font-medium text-emerald-800 dark:bg-emerald-950/40 dark:text-emerald-300">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>Terima kasih atas tanggapan Anda!</span>
            </div>
        </div>

        {{-- FALLBACK CALL-TO-ACTION TIKET --}}
        <div class="mt-8 flex flex-col items-center justify-between gap-4 rounded-2xl border border-blue-500/20 bg-blue-50/50 p-6 sm:flex-row dark:border-blue-500/20 dark:bg-blue-950/20">
            <div>
                <h4 class="text-sm font-bold text-gray-900 dark:text-white">
                    Masih mengalami kendala yang sama?
                </h4>
                <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                    Tim IT BPOM siap membantu memeriksa langsung perangkat atau akun Anda.
                </p>
            </div>
            <a href="{{ route('incidents.create') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-primary px-5 py-2.5 text-xs font-semibold text-white shadow-xs transition hover:bg-blue-700 shrink-0">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Buat Tiket Aduan Kendala</span>
            </a>
        </div>
    </div>

    {{-- PANDUAN TERKAIT LAINNYA --}}
    @if(isset($related) && $related->count() > 0)
        <div class="mt-10">
            <h3 class="mb-4 text-base font-bold text-gray-900 dark:text-white">
                Panduan Terkait dalam Kategori {{ $panduan->kategori }}
            </h3>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                @foreach($related as $rel)
                    <a href="{{ route('panduan.show', $rel->slug) }}"
                       class="group rounded-xl border border-stroke bg-white p-4 shadow-default transition hover:-translate-y-0.5 hover:border-brand-500 hover:shadow-md dark:border-gray-800 dark:bg-white/[0.03]">
                        <h4 class="text-xs font-bold text-gray-900 group-hover:text-brand-500 dark:text-white line-clamp-2">
                            {{ $rel->judul }}
                        </h4>
                        <p class="mt-1 text-[11px] text-gray-500 dark:text-gray-400 line-clamp-2">
                            {{ $rel->ringkasan }}
                        </p>
                        <span class="mt-3 inline-flex items-center gap-1 text-[11px] font-semibold text-[#10B981]">
                            Baca &rarr;
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
