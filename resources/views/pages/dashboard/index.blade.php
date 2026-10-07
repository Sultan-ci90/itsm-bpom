@extends('layouts.app')

@section('content')
@php
    $cards = [
        [
            'title' => 'Total Incident', 'value' => $totalIncident,
            'bg' => 'rgba(60, 80, 224, 0.08)', 'icon' => '#3C50E0',
            'svg' => '<path d="M21.3 6.7c-.3-1.4-1.5-2.4-2.9-2.4H16c-.3-2.3-2.2-4-4.5-4S7.3 2 7 4.3H5.6c-1.4 0-2.6 1-2.9 2.4l-.7 4.1V20c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3v-9.2l-.7-4.1zM11.5 1.9c1.4 0 2.6 1.1 2.7 2.5H8.8c.1-1.4 1.3-2.5 2.7-2.5zm7.9 18.6c0 .8-.7 1.5-1.5 1.5h-14c-.8 0-1.5-.7-1.5-1.5v-9.1l.7-4.1c.2-.7.8-1.1 1.5-1.1h1.3v1.4c0 .4.3.8.8.8s.8-.3.8-.8V6.3h5.4v1.4c0 .4.3.8.8.8s.8-.3.8-.8V6.3h1.3c.7 0 1.3.5 1.5 1.1l.7 4.1v9.1z"/>',
            'delta' => $statsDelta['incident']['delta'], 'period' => 'Bulan ini: ' . $statsDelta['incident']['value'],
        ],
        [
            'title' => 'Total Request', 'value' => $totalRequest,
            'bg' => 'rgba(65, 177, 251, 0.1)', 'icon' => '#41B1FB',
            'svg' => '<path d="M14.5 15.2c-.6 0-1.2.5-1.2 1.2s.5 1.2 1.2 1.2 1.2-.5 1.2-1.2-.6-1.2-1.2-1.2zM9.5 15.2c-.6 0-1.2.5-1.2 1.2s.5 1.2 1.2 1.2 1.2-.5 1.2-1.2-.6-1.2-1.2-1.2zM21.6 5.8c-.2-.3-.5-.5-.9-.5H5c-.7 0-1.2.6-1.1 1.3.1.6.7 1.1 1.4 1h14.5l1.9 8.2c.2.9-.4 1.7-1.3 1.7H6.6c-.9 0-1.5-.8-1.3-1.7L6.6 8.4H4.8L3.3 9.9c-.4.4-.6 1-.5 1.5l1.4 7.1c.1.6.7 1.1 1.4 1.1h.4c-.1.4-.2.8-.2 1.2 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c0-.4-.1-.8-.3-1.2h3.5c-.1.4-.3.8-.3 1.2 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c0-.4-.1-.8-.3-1.2h1.6c1.9 0 3.4-1.8 3-3.7l-2.2-9.1c-.1-.6-.4-1-.7-1zM7.7 21.7c-.7 0-1.3-.6-1.3-1.3s.6-1.3 1.3-1.3 1.3.6 1.3 1.3-.6 1.3-1.3 1.3zm8.6 0c-.7 0-1.3-.6-1.3-1.3s.6-1.3 1.3-1.3 1.3.6 1.3 1.3-.6 1.3-1.3 1.3z"/>',
            'delta' => $statsDelta['request']['delta'], 'period' => 'Bulan ini: ' . $statsDelta['request']['value'],
        ],
        [
            'title' => 'Belum / Sedang Diproses', 'value' => $statusIncident['Belum diperiksa'] + $statusIncident['Sedang diproses'],
            'bg' => 'rgba(251, 191, 36, 0.1)', 'icon' => '#FBBF24',
            'svg' => '<path d="M12 1a11 11 0 1 0 11 11A11 11 0 0 0 12 1zm0 20a9 9 0 1 1 9-9 9 9 0 0 1-9 9zm.9-9.4V5.8a.9.9 0 0 0-1.8 0v6.2a1 1 0 0 0 .5.8l4.1 2.4a.9.9 0 1 0 .9-1.6z"/>',
            'delta' => null, 'period' => 'Menunggu penanganan tim IT',
        ],
        [
            'title' => 'Sudah Selesai', 'value' => $totalSelesai,
            'bg' => 'rgba(77, 168, 99, 0.1)', 'icon' => '#4DA863',
            'svg' => '<path d="M12 1a11 11 0 1 0 11 11A11 11 0 0 0 12 1zm5.4 8.2-6 6a1 1 0 0 1-1.4 0l-3-3a1 1 0 1 1 1.4-1.4l2.3 2.3 5.3-5.3a1 1 0 0 1 1.4 1.4z"/>',
            'delta' => null, 'period' => 'Incident: ' . $selesaiIncident . ' · Request: ' . $selesaiRequest,
        ],
    ];

    $charts = [
        ['id' => 'incidentTrendChart',  'title' => 'Tren Incident',               'sub' => '6 bulan terakhir',            'span' => 'xl:col-span-7'],
        ['id' => 'resolutionChart',     'title' => 'Metode Penyelesaian',         'sub' => 'Cara incident diselesaikan',  'span' => 'xl:col-span-5'],
        ['id' => 'requestLayananChart', 'title' => 'Request per Jenis Layanan',   'sub' => 'Jumlah request tiap layanan', 'span' => 'xl:col-span-7'],
        ['id' => 'requestStatusChart',  'title' => 'Distribusi Status Request',   'sub' => 'Proporsi status saat ini',    'span' => 'xl:col-span-5'],
    ];

    $badge = [
        'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
        'Diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
        'Diajukan' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-800/20 dark:text-yellow-400',
        'Belum diperiksa' => 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-300',
        'Ditolak' => 'bg-red-200 text-red-600 dark:bg-red-800/20 dark:text-red-300',
        
     
    ];
@endphp

<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">

    {{-- HEADER --}}
    <div class="mb-6">
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">Dashboard Tim IT</h2>
        <p class="mt-1 text-sm font-medium text-gray-500 dark:text-gray-400">Ringkasan operasional dan pemantauan layanan IT.</p>
    </div>

    {{-- 1. STAT CARDS (gaya CRM TailAdmin) --}}
    <div class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
        @foreach($cards as $card)
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full"
                 style="background-color: {{ $card['bg'] }}; color: {{ $card['icon'] }}">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    {!! $card['svg'] !!}
                </svg>
            </div>

            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">{{ number_format($card['value']) }}</h4>
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $card['title'] }}</span>
                </div>

                @if(!is_null($card['delta']))
                <span class="flex items-center gap-1 text-sm font-medium {{ $card['delta'] >= 0 ? 'text-success' : 'text-danger' }}">
                    {{ abs($card['delta']) }}%
                    <svg width="10" height="11" viewBox="0 0 10 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        @if($card['delta'] >= 0)
                            <path d="M5 0L10 6H0L5 0Z"/>
                        @else
                            <path d="M5 11L0 5H10L5 11Z"/>
                        @endif
                    </svg>
                </span>
                @endif
            </div>

            <p class="mt-3 border-t border-stroke pt-3 text-xs font-medium text-gray-400 dark:border-strokedark dark:text-gray-500">{{ $card['period'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- 2. CHARTS --}}
    <div class="mb-6 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
        @foreach($charts as $c)
        <div class="col-span-12 {{ $c['span'] }} rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5">
            <div class="mb-4">
                <h4 class="text-xl font-semibold text-black dark:text-white">{{ $c['title'] }}</h4>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $c['sub'] }}</p>
            </div>
            <div id="{{ $c['id'] }}" class="min-h-[320px] w-full"></div>
        </div>
        @endforeach
    </div>

    {{-- 3. TABEL TERBARU --}}
    <div class="grid grid-cols-1 gap-4 md:gap-6 xl:grid-cols-2 2xl:gap-7.5">

        {{-- Incident --}}
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex items-center justify-between px-6 py-5 sm:px-7.5">
                <h4 class="text-xl font-semibold text-black dark:text-white">Incident Terbaru</h4>
                <a href="{{ route('incidents.index') }}" class="text-sm font-medium text-primary hover:underline">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left">
                    <thead>
                        <tr class="bg-gray-2 text-sm dark:bg-meta-4">
                            <th class="px-6 py-3 font-medium text-black dark:text-white sm:px-7.5">Nomor</th>
                            <th class="px-4 py-3 font-medium text-black dark:text-white">Pelapor</th>
                            <th class="px-4 py-3 font-medium text-black dark:text-white">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentIncidents as $ticket)
                        <tr class="border-t border-stroke text-sm dark:border-strokedark">
                            <td class="px-6 py-4 font-medium text-black dark:text-white sm:px-7.5">{{ $ticket->nomor_aduan }}</td>
                            <td class="px-4 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->pelapor->nama ?? '-' }}</td>
                            <td class="px-4 py-4">
                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $badge[$ticket->status] ?? $badge['Ditolak'] }}">
                                    {{ $ticket->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="px-6 py-6 text-center text-sm text-gray-500 dark:text-gray-400">Belum ada data.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Request --}}
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex items-center justify-between px-6 py-5 sm:px-7.5">
                <h4 class="text-xl font-semibold text-black dark:text-white">Request Terbaru</h4>
                <a href="{{ route('requests.index') }}" class="text-sm font-medium text-primary hover:underline">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left">
                    <thead>
                        <tr class="bg-gray-2 text-sm dark:bg-meta-4">
                            <th class="px-6 py-3 font-medium text-black dark:text-white sm:px-7.5">Nomor</th>
                            <th class="px-4 py-3 font-medium text-black dark:text-white">Pemohon</th>
                            <th class="px-4 py-3 font-medium text-black dark:text-white">Layanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentRequests as $request)
                        <tr class="border-t border-stroke text-sm dark:border-strokedark">
                            <td class="px-6 py-4 font-medium text-black dark:text-white sm:px-7.5">{{ $request->nomor_request }}</td>
                            <td class="px-4 py-4 text-gray-600 dark:text-gray-400">{{ $request->user->nama ?? '-' }}</td>
                            <td class="px-4 py-4 text-gray-600 dark:text-gray-400">{{ ucfirst($request->layanan) }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="px-6 py-6 text-center text-sm text-gray-500 dark:text-gray-400">Belum ada data.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const apexInstances = {};

    function getApexTheme() {
        const isDark = document.documentElement.classList.contains('dark');
        return {
            isDark,
            text: isDark ? '#AEB7C0' : '#64748B',
            grid: isDark ? '#2E3A47' : '#E2E8F0',
            primary: '#3C50E0', secondary: '#41B1FB', success: '#4DA863',
            warning: '#FBBF24', danger: '#FA5656', sky: '#0EA5E9',
        };
    }

    function baseOptions(c) {
        return {
            chart: {
                fontFamily: 'Satoshi, inherit', foreColor: c.text, background: 'transparent',
                toolbar: { show: false }, animations: { enabled: true, speed: 500 },
            },
            theme: { mode: c.isDark ? 'dark' : 'light' },
            grid: { borderColor: c.grid, strokeDashArray: 4 },
            dataLabels: { enabled: false },
            tooltip: { theme: c.isDark ? 'dark' : 'light', y: { formatter: v => v } },
            legend: {
                position: 'bottom', fontSize: '13px', labels: { colors: c.text },
                markers: { width: 10, height: 10, radius: 12 },
                itemMargin: { horizontal: 8, vertical: 4 },
            },
            noData: { style: { color: c.text, fontSize: '14px' } },
        };
    }

    function renderCharts() {
        Object.values(apexInstances).forEach(ch => ch.destroy());
        const c = getApexTheme();
        const base = baseOptions(c);
        const axisLabels = { style: { colors: c.text, fontSize: '12px' } };

        apexInstances.trend = new ApexCharts(document.querySelector('#incidentTrendChart'), {
            ...base,
            chart: { ...base.chart, type: 'bar', height: 320 },
            series: [{ name: 'Jumlah Incident', data: @json($incidentTrend) }],
            colors: [c.primary],
            xaxis: { categories: @json($last6Months), labels: axisLabels, axisBorder: { show: false }, axisTicks: { show: false } },
            yaxis: { forceNiceScale: true, labels: { ...axisLabels, formatter: v => Math.round(v) } },
            plotOptions: { bar: { columnWidth: '40%', borderRadius: 4, borderRadiusApplication: 'end' } },
            grid: { ...base.grid, xaxis: { lines: { show: false } } },
        });

        apexInstances.resolution = new ApexCharts(document.querySelector('#resolutionChart'), {
            ...base,
            chart: { ...base.chart, type: 'donut', height: 320 },
            series: @json($resolutionData['data']),
            labels: @json($resolutionData['labels']),
            colors: [c.success, c.warning],
            stroke: { show: false },
            dataLabels: { enabled: false },
            plotOptions: { pie: { donut: { size: '72%', labels: { show: true, total: { show: true, label: 'Total', fontSize: '14px', color: c.text } } } } },
        });

        apexInstances.layanan = new ApexCharts(document.querySelector('#requestLayananChart'), {
            ...base,
            chart: { ...base.chart, type: 'bar', height: 320 },
            series: [{ name: 'Jumlah Request', data: @json($layananData['data']) }],
            colors: [c.secondary],
            plotOptions: { bar: { horizontal: true, barHeight: '50%', borderRadius: 4, borderRadiusApplication: 'end' } },
            xaxis: { categories: @json($layananData['labels']), labels: axisLabels },
            yaxis: { labels: axisLabels },
            grid: { ...base.grid, yaxis: { lines: { show: false } } },
        });

        apexInstances.status = new ApexCharts(document.querySelector('#requestStatusChart'), {
            ...base,
            chart: { ...base.chart, type: 'donut', height: 320 },
            series: @json($requestStatusData['data']),
            labels: @json($requestStatusData['labels']),
            colors: [c.warning, c.sky, c.success, c.danger],
            stroke: { show: false },
            plotOptions: { pie: { donut: { size: '72%', labels: { show: true, total: { show: true, label: 'Total', fontSize: '14px', color: c.text } } } } },
        });

        Object.values(apexInstances).forEach(ch => ch.render());
    }

    document.addEventListener('DOMContentLoaded', renderCharts);

    // Render ulang chart saat dark mode di-toggle (class 'dark' pada <html>)
    new MutationObserver(() => renderCharts())
        .observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
</script>
@endpush
@endsection