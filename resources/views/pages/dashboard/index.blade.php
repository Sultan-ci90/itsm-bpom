@extends('layouts.app')

@section('content')

<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">
            Dashboard
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Selamat datang kembali, {{ $user->nama }}.
        </p>
    </div>


    {{-- =========================================================
        USER INFORMATION
    ========================================================== --}}
    <div class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-3">

        {{-- NAME --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"
        >

            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Nama
            </p>

            <h2 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">
                {{ $user->nama }}
            </h2>

        </div>


        {{-- ROLE --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"
        >

            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Role
            </p>

            <h2 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">
                {{ ucfirst($user->role ?? '-') }}
            </h2>

        </div>


        {{-- DEPARTMENT --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"
        >

            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Department
            </p>

            <h2 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">
                {{ $user->bidang?->nama_bidang ?? '-' }}
            </h2>

        </div>

    </div>


    {{-- =========================================================
        TICKET OVERVIEW HEADER
    ========================================================== --}}
    <div class="mb-4">

        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            Ticket Overview
        </h2>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Ringkasan ticket ITSM berdasarkan data aktual.
        </p>

    </div>


    {{-- =========================================================
        STATISTIC CARDS
    ========================================================== --}}
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-5">

        {{-- =====================================================
            TOTAL
        ====================================================== --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"
        >

            <div class="flex items-center justify-between">

                <div>

                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Total Ticket
                    </span>

                    <h3 class="mt-3 text-3xl font-semibold text-gray-800 dark:text-white">
                        {{ $totalTickets }}
                    </h3>

                </div>

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800"
                >
                    <svg
                        class="h-6 w-6 text-gray-600 dark:text-gray-300"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 016 0M9 5h6"
                        />
                    </svg>
                </div>

            </div>

            <p class="mt-3 text-xs text-gray-400 dark:text-gray-500">
                Semua ticket
            </p>

        </div>


        {{-- =====================================================
            OPEN
        ====================================================== --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"
        >

            <div class="flex items-center justify-between">

                <div>

                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Open
                    </span>

                    <h3 class="mt-3 text-3xl font-semibold text-gray-800 dark:text-white">
                        {{ $statusCounts->get('open', 0) }}
                    </h3>

                </div>

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 dark:bg-blue-500/10"
                >
                    <svg
                        class="h-6 w-6 text-blue-600 dark:text-blue-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M12 6v6l4 2"
                        />
                    </svg>
                </div>

            </div>

            <p class="mt-3 text-xs text-gray-400 dark:text-gray-500">
                Ticket terbuka
            </p>

        </div>


        {{-- =====================================================
            IN PROGRESS
        ====================================================== --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"
        >

            <div class="flex items-center justify-between">

                <div>

                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        In Progress
                    </span>

                    <h3 class="mt-3 text-3xl font-semibold text-gray-800 dark:text-white">
                        {{ $statusCounts->get('in_progress', 0) }}
                    </h3>

                </div>

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-50 dark:bg-yellow-500/10"
                >
                    <svg
                        class="h-6 w-6 text-yellow-600 dark:text-yellow-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M12 8v4l3 2"
                        />
                    </svg>
                </div>

            </div>

            <p class="mt-3 text-xs text-gray-400 dark:text-gray-500">
                Sedang dikerjakan
            </p>

        </div>


        {{-- =====================================================
            RESOLVED
        ====================================================== --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"
        >

            <div class="flex items-center justify-between">

                <div>

                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Resolved
                    </span>

                    <h3 class="mt-3 text-3xl font-semibold text-gray-800 dark:text-white">
                        {{ $statusCounts->get('resolved', 0) }}
                    </h3>

                </div>

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-50 dark:bg-green-500/10"
                >
                    <svg
                        class="h-6 w-6 text-green-600 dark:text-green-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>
                </div>

            </div>

            <p class="mt-3 text-xs text-gray-400 dark:text-gray-500">
                Sudah diselesaikan
            </p>

        </div>


        {{-- =====================================================
            CLOSED
        ====================================================== --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"
        >

            <div class="flex items-center justify-between">

                <div>

                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Closed
                    </span>

                    <h3 class="mt-3 text-3xl font-semibold text-gray-800 dark:text-white">
                        {{ $statusCounts->get('closed', 0) }}
                    </h3>

                </div>

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800"
                >
                    <svg
                        class="h-6 w-6 text-gray-600 dark:text-gray-300"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>
                </div>

            </div>

            <p class="mt-3 text-xs text-gray-400 dark:text-gray-500">
                Ticket ditutup
            </p>

        </div>

    </div>


    {{-- =========================================================
        CHART + SUMMARY
    ========================================================== --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- =====================================================
            CHART
        ====================================================== --}}
        <div
            class="xl:col-span-2 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
        >

            {{-- HEADER --}}
            <div class="flex items-center justify-between px-6 py-5">

                <div>

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                        Ticket by Status
                    </h3>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Distribusi ticket berdasarkan status.
                    </p>

                </div>

            </div>


            {{-- CHART --}}
            <div class="px-5 pb-5">

                <div
                    id="ticket-status-chart"
                    class="w-full"
                    style="min-height: 350px;"
                ></div>

            </div>

        </div>


        {{-- =====================================================
            SUMMARY
        ====================================================== --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
        >

            <div class="px-6 py-5">

                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                    Status Summary
                </h3>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Jumlah ticket setiap status.
                </p>

            </div>


            <div class="border-t border-gray-100 px-6 py-5 dark:border-gray-800">

                <div class="space-y-5">

                    @forelse($ticketStats as $stat)

                        @php

                            $statusColors = [
                                'open' => [
                                    'dot' => 'bg-blue-500',
                                    'text' => 'text-blue-600 dark:text-blue-400',
                                ],

                                'in_progress' => [
                                    'dot' => 'bg-yellow-500',
                                    'text' => 'text-yellow-600 dark:text-yellow-400',
                                ],

                                'resolved' => [
                                    'dot' => 'bg-green-500',
                                    'text' => 'text-green-600 dark:text-green-400',
                                ],

                                'closed' => [
                                    'dot' => 'bg-gray-500',
                                    'text' => 'text-gray-600 dark:text-gray-400',
                                ],
                            ];

                            $color = $statusColors[$stat->status] ?? [
                                'dot' => 'bg-gray-400',
                                'text' => 'text-gray-600 dark:text-gray-400',
                            ];

                        @endphp


                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-3">

                                <span
                                    class="h-2.5 w-2.5 rounded-full {{ $color['dot'] }}"
                                ></span>

                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ ucwords(str_replace('_', ' ', $stat->status)) }}
                                </span>

                            </div>

                            <span
                                class="text-sm font-semibold {{ $color['text'] }}"
                            >
                                {{ $stat->total }}
                            </span>

                        </div>

                    @empty

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Belum ada data ticket.
                        </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
    DATA UNTUK JAVASCRIPT
============================================================= --}}
<script>
    window.ticketChartData = {
        labels: @json($chartLabels),
        data: @json($chartData)
    };
</script>

@endsection