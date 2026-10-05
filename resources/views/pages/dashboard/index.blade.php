@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    
    {{-- HEADER --}}
    <div class="mb-6">
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">Dashboard Tim IT</h2>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Ringkasan operasional dan pemantauan layanan IT.</p>
    </div>

    {{-- 1. STATISTIK KARTU (Cards) --}}
    <div class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
        @php
            $cards = [
                ['title' => 'Total Incident', 'value' => $totalIncident, 'color' => 'text-primary'],
                ['title' => 'Total Request', 'value' => $totalRequest, 'color' => 'text-primary'],
                ['title' => 'Belum / Sedang Diproses', 'value' => $statusIncident['Belum diperiksa'] + $statusIncident['Sedang diproses'], 'color' => 'text-warning'],
                ['title' => 'Incident Selesai', 'value' => $statusIncident['Selesai'], 'color' => 'text-success'],
            ];
        @endphp

        @foreach($cards as $card)
        <div class="rounded-2xl border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <h4 class="mb-2 text-sm font-medium text-black dark:text-white">{{ $card['title'] }}</h4>
            <p class="text-3xl font-semibold {{ $card['color'] }}">{{ $card['value'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- 2. CHARTS INCIDENT --}}
    <div class="mb-6 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
        <div class="col-span-12 rounded-sm border border-stroke bg-white p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-7">
            <h4 class="mb-6 text-lg font-semibold text-black dark:text-white">Tren Incident (6 Bulan Terakhir)</h4>
            <div id="incidentTrendChart" class="h-72 w-full"></div>
        </div>
        <div class="col-span-12 rounded-sm border border-stroke bg-white p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-5">
            <h4 class="mb-6 text-lg font-semibold text-black dark:text-white">Metode Penyelesaian Incident</h4>
            <div id="resolutionChart" class="h-72 w-full"></div>
        </div>
    </div>

    {{-- 3. CHARTS REQUEST --}}
    <div class="mb-6 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
        <div class="col-span-12 rounded-sm border border-stroke bg-white p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-7">
            <h4 class="mb-6 text-lg font-semibold text-black dark:text-white">Permintaan Berdasarkan Jenis Layanan</h4>
            <div id="requestLayananChart" class="h-72 w-full"></div>
        </div>
        <div class="col-span-12 rounded-sm border border-stroke bg-white p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-5">
            <h4 class="mb-6 text-lg font-semibold text-black dark:text-white">Distribusi Status Request</h4>
            <div id="requestStatusChart" class="h-72 w-full"></div>
        </div>
    </div>

    {{-- 4. TABEL RIWAYAT TERBARU --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
        {{-- Tabel Incident --}}
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
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
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
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