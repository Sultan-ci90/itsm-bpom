@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    
    {{-- HEADER --}}
    <div class="mb-6">
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">Dashboard Tim IT</h2>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Ringkasan operasional dan pemantauan layanan IT.</p>
    </div>

    {{-- 1. STAT CARDS (gaya CRM TailAdmin: ikon berwarna di kanan, badge naik/turun) --}}
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
                'title' => 'Incident Selesai', 'value' => $statusIncident['Selesai'],
                'bg' => 'rgba(77, 168, 99, 0.1)', 'icon' => '#4DA863',
                'svg' => '<path d="M12 1a11 11 0 1 0 11 11A11 11 0 0 0 12 1zm5.4 8.2-6 6a1 1 0 0 1-1.4 0l-3-3a1 1 0 1 1 1.4-1.4l2.3 2.3 5.3-5.3a1 1 0 0 1 1.4 1.4z"/>',
                'delta' => null, 'period' => 'Ditolak: ' . $statusIncident['Ditolak'],
            ],
        ];
    @endphp

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4 2xl:gap-6">
        @foreach($cards as $card)
        <div class="rounded-2xl border border-stroke bg-white p-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:p-7.5 xl:py-8">
            <div class="flex justify-between">
                <span class="mb-2 inline-flex rounded-full p-3" style="background-color: {{ $card['bg'] }}">
                    <svg class="fill-current" width="22" height="22" viewBox="0 0 24 24" fill="{{ $card['icon'] }}" xmlns="http://www.w3.org/2000/svg">
                        {!! $card['svg'] !!}
                    </svg>
                </span>
                @if(!is_null($card['delta']))
                    <span class="flex items-center gap-1 rounded-full px-3 py-1 text-xs font-semibold {{ $card['delta'] >= 0 ? 'bg-success/10 text-success' : 'bg-danger/10 text-danger' }}">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            @if($card['delta'] >= 0)
                                <path d="M6 2.5L10 7.5H2L6 2.5Z" fill="currentColor"/>
                            @else
                                <path d="M6 9.5L2 4.5H10L6 9.5Z" fill="currentColor"/>
                            @endif
                        </svg>
                        {{ abs($card['delta']) }}%
                    </span>
                @endif
            </div>

            <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $card['title'] }}</p>
            <div class="flex flex-wrap items-end justify-between gap-2">
                <h4 class="text-title-md font-bold text-black dark:text-white">{{ number_format($card['value']) }}</h4>
                <span class="text-xs font-medium text-gray-400 dark:text-gray-500">{{ $card['period'] }}</span>
            </div>
        </div>
        @endforeach
    </div>

    {{-- 2. CHARTS INCIDENT --}}
    <div class="mb-6 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
        <div class="col-span-12 rounded-2xl border border-stroke bg-white p-5 sm:p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-7">
            <div class="mb-6 flex items-center justify-between">
                <h4 class="text-lg font-semibold text-black dark:text-white">Tren Incident (6 Bulan Terakhir)</h4>
                <button class="rounded-lg border border-stroke p-1.5 text-gray-400 hover:bg-gray-100 dark:border-strokedark dark:hover:bg-meta-4"><svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="3" cy="9" r="1.5"/><circle cx="9" cy="9" r="1.5"/><circle cx="15" cy="9" r="1.5"/></svg></button>
            </div>
            <div id="incidentTrendChart" class="h-72 w-full"></div>
        </div>
        <div class="col-span-12 rounded-2xl border border-stroke bg-white p-5 sm:p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-5">
            <div class="mb-6 flex items-center justify-between">
                <h4 class="text-lg font-semibold text-black dark:text-white">Metode Penyelesaian Incident</h4>
                <button class="rounded-lg border border-stroke p-1.5 text-gray-400 hover:bg-gray-100 dark:border-strokedark dark:hover:bg-meta-4"><svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="3" cy="9" r="1.5"/><circle cx="9" cy="9" r="1.5"/><circle cx="15" cy="9" r="1.5"/></svg></button>
            </div>
            <div id="resolutionChart" class="h-72 w-full"></div>
        </div>
    </div>

    {{-- 3. CHARTS REQUEST --}}
    <div class="mb-6 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
        <div class="col-span-12 rounded-2xl border border-stroke bg-white p-5 sm:p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-7">
            <div class="mb-6 flex items-center justify-between">
                <h4 class="text-lg font-semibold text-black dark:text-white">Permintaan Berdasarkan Jenis Layanan</h4>
                <button class="rounded-lg border border-stroke p-1.5 text-gray-400 hover:bg-gray-100 dark:border-strokedark dark:hover:bg-meta-4"><svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="3" cy="9" r="1.5"/><circle cx="9" cy="9" r="1.5"/><circle cx="15" cy="9" r="1.5"/></svg></button>
            </div>
            <div id="requestLayananChart" class="h-72 w-full"></div>
        </div>
        <div class="col-span-12 rounded-2xl border border-stroke bg-white p-5 sm:p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-5">
            <div class="mb-6 flex items-center justify-between">
                <h4 class="text-lg font-semibold text-black dark:text-white">Distribusi Status Request</h4>
                <button class="rounded-lg border border-stroke p-1.5 text-gray-400 hover:bg-gray-100 dark:border-strokedark dark:hover:bg-meta-4"><svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="3" cy="9" r="1.5"/><circle cx="9" cy="9" r="1.5"/><circle cx="15" cy="9" r="1.5"/></svg></button>
            </div>
            <div id="requestStatusChart" class="h-72 w-full"></div>
        </div>
    </div>

    {{-- 4. TABEL RIWAYAT TERBARU --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
        {{-- Tabel Incident --}}
        <div class="overflow-hidden rounded-2xl border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex items-center justify-between border-b border-stroke px-6 py-4 dark:border-strokedark">
                <h4 class="font-semibold text-black dark:text-white">Incident Terbaru</h4>
                <a href="{{ route('incidents.index') }}" class="text-sm font-medium text-primary hover:underline">Lihat Semua</a>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-stroke text-sm text-gray-500 dark:border-strokedark dark:text-gray-400">
                                <th class="pb-3 font-medium">Nomor</th>
                                <th class="pb-3 font-medium">Pelapor</th>
                                <th class="pb-3 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentIncidents as $ticket)
                            <tr class="border-b border-stroke last:border-0 dark:border-strokedark text-sm">
                                <td class="py-3 text-black dark:text-white">{{ $ticket->nomor_aduan }}</td>
                                <td class="py-3 text-gray-600 dark:text-gray-400">{{ $ticket->pelapor->nama ?? '-' }}</td>
                                <td class="py-3">
                                    <span class="rounded-full bg-warning/10 px-3 py-1 text-xs font-medium text-warning dark:bg-warning/20">
                                        {{ $ticket->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="py-4 text-center text-sm text-gray-500 dark:text-gray-400">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Tabel Request --}}
        <div class="overflow-hidden rounded-2xl border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex items-center justify-between border-b border-stroke px-6 py-4 dark:border-strokedark">
                <h4 class="font-semibold text-black dark:text-white">Request Terbaru</h4>
                <a href="{{ route('requests.index') }}" class="text-sm font-medium text-primary hover:underline">Lihat Semua</a>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-stroke text-sm text-gray-500 dark:border-strokedark dark:text-gray-400">
                                <th class="pb-3 font-medium">Nomor</th>
                                <th class="pb-3 font-medium">Pemohon</th>
                                <th class="pb-3 font-medium">Layanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentRequests as $request)
                            <tr class="border-b border-stroke last:border-0 dark:border-strokedark text-sm">
                                <td class="py-3 text-black dark:text-white">{{ $request->nomor_request }}</td>
                                <td class="py-3 text-gray-600 dark:text-gray-400">{{ $request->user->nama ?? '-' }}</td>
                                <td class="py-3 text-gray-600 dark:text-gray-400">{{ ucfirst($request->layanan) }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="py-4 text-center text-sm text-gray-500 dark:text-gray-400">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT APEXCHARTS DENGAN MUTATION OBSERVER --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Objek untuk menyimpan instance ApexChart agar bisa di-destroy
    const apexInstances = {};

    // Fungsi untuk mengambil warna & tema berdasarkan mode saat ini (TailAdmin native)
    function getApexTheme() {
        const isDark = document.documentElement.classList.contains('dark');
        return {
            isDark,
            text: isDark ? '#A3A3A3' : '#64748B',        // gray-400 / slate-500
            grid: isDark ? '#1F2937' : '#E2E8F0',       // strokedark / stroke
            tooltipBg: isDark ? '#1F2937' : '#FFFFFF',
            primary: '#3C50E0',   // TailAdmin primary
            secondary: '#41B1FB', // TailAdmin meta-4
            success: '#4DA863',   // TailAdmin green
            warning: '#FBBF24',   // TailAdmin yellow
            danger: '#FA5656',    // TailAdmin red
            sky: '#0EA5E9',
        };
    }

    // Opsi umum yang disesuaikan gaya TailAdmin (chart cards)
    function baseOptions(colors) {
        return {
            chart: {
                fontFamily: 'inherit',
                foreColor: colors.text,
                background: 'transparent',
                toolbar: { show: false },
                animations: { enabled: true, speed: 600 },
            },
            theme: { mode: colors.isDark ? 'dark' : 'light' },
            grid: {
                borderColor: colors.grid,
                strokeDashArray: 4,
                xaxis: { lines: { show: true } },
                yaxis: { lines: { show: true } },
            },
            dataLabels: { enabled: false },
            tooltip: {
                theme: colors.isDark ? 'dark' : 'light',
                style: { fontSize: '12px' },
            },
            legend: {
                labels: { colors: colors.text },
                markers: { width: 10, height: 10, radius: 12 },
                itemMargin: { horizontal: 5, vertical: 3 },
            },
            noData: { style: { color: colors.text, fontSize: '14px' } },
        };
    }

    // Fungsi utama untuk merender semua chart
    function renderCharts() {
        // 1. Hancurkan chart lama jika ada
        Object.values(apexInstances).forEach(chart => chart.destroy());

        const colors = getApexTheme();
        const base = baseOptions(colors);

        // 2. Chart 1: Tren Incident (Bar)
        apexInstances.trend = new ApexCharts(document.querySelector('#incidentTrendChart'), {
            ...base,
            chart: { ...base.chart, type: 'bar', height: '100%' },
            series: [{ name: 'Jumlah Incident', data: @json($incidentTrend) }],
            colors: [colors.primary],
            xaxis: {
                categories: @json($last6Months),
                labels: { style: { colors: colors.text, fontSize: '12px' } },
                axisBorder: { show: false },
                axisTicks: { show: false },
            },
            yaxis: { labels: { style: { colors: colors.text, fontSize: '12px' } } },
            plotOptions: { bar: { columnWidth: '45%', borderRadius: 4, borderRadiusApplication: 'end' } },
            fill: { opacity: 1 },
            grid: { ...base.grid, yaxis: { lines: { show: true } }, xaxis: { lines: { show: false } } },
        });

        // 3. Chart 2: Metode Penyelesaian Incident (Donut)
        apexInstances.resolution = new ApexCharts(document.querySelector('#resolutionChart'), {
            ...base,
            chart: { ...base.chart, type: 'donut', height: '100%' },
            series: @json($resolutionData['data']),
            labels: @json($resolutionData['labels']),
            colors: [colors.success, colors.warning],
            stroke: { show: false },
            legend: { ...base.legend, position: 'bottom', fontSize: '12px' },
            dataLabels: { enabled: true, style: { fontSize: '12px', fontWeight: 500 } },
            plotOptions: { pie: { donut: { size: '70%', labels: { show: true, total: { show: true, label: 'Total', fontSize: '14px', color: colors.text } } } } },
        });

        // 4. Chart 3: Permintaan per Jenis Layanan (Bar Horizontal)
        apexInstances.layanan = new ApexCharts(document.querySelector('#requestLayananChart'), {
            ...base,
            chart: { ...base.chart, type: 'bar', height: '100%' },
            series: [{ name: 'Jumlah Request', data: @json($layananData['data']) }],
            colors: [colors.secondary],
            plotOptions: { bar: { horizontal: true, barHeight: '55%', borderRadius: 4, borderRadiusApplication: 'end' } },
            xaxis: {
                categories: @json($layananData['labels']),
                labels: { style: { colors: colors.text, fontSize: '12px' } },
            },
            yaxis: { labels: { style: { colors: colors.text, fontSize: '12px' } } },
            grid: { ...base.grid, xaxis: { lines: { show: true } }, yaxis: { lines: { show: false } } },
        });

        // 5. Chart 4: Distribusi Status Request (Pie)
        apexInstances.status = new ApexCharts(document.querySelector('#requestStatusChart'), {
            ...base,
            chart: { ...base.chart, type: 'pie', height: '100%' },
            series: @json($requestStatusData['data']),
            labels: @json($requestStatusData['labels']),
            colors: [colors.warning, colors.sky, colors.success, colors.danger],
            stroke: { show: false },
            legend: { ...base.legend, position: 'bottom', fontSize: '12px' },
            dataLabels: { enabled: true, style: { fontSize: '12px', fontWeight: 500 } },
        });

        Object.values(apexInstances).forEach(chart => chart.render());
    }

    // Jalankan saat halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', renderCharts);

    // KRITIK: MutationObserver untuk mendeteksi perubahan class 'dark' pada tag <html>
    // Ini membuat chart otomatis berubah warna saat tombol dark mode diklik
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                renderCharts(); // Render ulang chart dengan tema baru
            }
        });
    });
    observer.observe(document.documentElement, { attributes: true });
</script>
@endpush
@endsection