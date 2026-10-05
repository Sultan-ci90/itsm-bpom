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
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <h4 class="mb-2 text-sm font-medium text-black dark:text-white">{{ $card['title'] }}</h4>
            <p class="text-3xl font-semibold {{ $card['color'] }}">{{ $card['value'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- 2. CHARTS INCIDENT --}}
    <div class="mb-6 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
        <div class="col-span-12 rounded-sm border border-stroke bg-white p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-7">
            <h4 class="mb-6 text-lg font-semibold text-black dark:text-white">Tren Incident (6 Bulan Terakhir)</h4>
            <div class="h-72">
                <canvas id="incidentTrendChart"></canvas>
            </div>
        </div>
        <div class="col-span-12 rounded-sm border border-stroke bg-white p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-5">
            <h4 class="mb-6 text-lg font-semibold text-black dark:text-white">Metode Penyelesaian Incident</h4>
            <div class="h-72 flex justify-center">
                <canvas id="resolutionChart"></canvas>
            </div>
        </div>
    </div>

    {{-- 3. CHARTS REQUEST --}}
    <div class="mb-6 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
        <div class="col-span-12 rounded-sm border border-stroke bg-white p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-7">
            <h4 class="mb-6 text-lg font-semibold text-black dark:text-white">Permintaan Berdasarkan Jenis Layanan</h4>
            <div class="h-72">
                <canvas id="requestLayananChart"></canvas>
            </div>
        </div>
        <div class="col-span-12 rounded-sm border border-stroke bg-white p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-5">
            <h4 class="mb-6 text-lg font-semibold text-black dark:text-white">Distribusi Status Request</h4>
            <div class="h-72 flex justify-center">
                <canvas id="requestStatusChart"></canvas>
            </div>
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

{{-- SCRIPT CHART.JS DENGAN MUTATION OBSERVER --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Objek untuk menyimpan instance chart agar bisa di-destroy
    const chartInstances = {};

    // Fungsi untuk mengambil warna berdasarkan mode saat ini
    function getThemeColors() {
        const isDark = document.documentElement.classList.contains('dark');
        return {
            text: isDark ? '#A3A3A3' : '#64748B',
            grid: isDark ? '#333333' : '#E2E8F0',
            primary: '#3C50E0', secondary: '#80CAEE', 
            success: '#10B981', warning: '#F59E0B', danger: '#EF4444'
        };
    }

    // Fungsi utama untuk merender semua chart
    function renderCharts() {
        // 1. Hancurkan chart lama jika ada (Mencegah tumpukan/overlay)
        Object.values(chartInstances).forEach(chart => chart.destroy());

        const colors = getThemeColors();

        // Opsi umum untuk Bar Chart
        const barOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { ticks: { color: colors.text }, grid: { color: colors.grid, drawBorder: false } },
                y: { ticks: { color: colors.text }, grid: { color: colors.grid, drawBorder: false } }
            }
        };

        // Opsi umum untuk Pie/Doughnut Chart
        const pieOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { position: 'bottom', labels: { color: colors.text, usePointStyle: true, padding: 20 } } 
            }
        };

        // 2. Render Chart 1: Tren Incident
        chartInstances.trend = new Chart(document.getElementById('incidentTrendChart'), {
            type: 'bar',
            data: {
                labels: @json($last6Months),
                datasets: [{ label: 'Jumlah Incident', data: @json($incidentTrend), backgroundColor: colors.primary, borderRadius: 4 }]
            },
            options: barOptions
        });

        // 3. Render Chart 2: Penyelesaian
        chartInstances.resolution = new Chart(document.getElementById('resolutionChart'), {
            type: 'doughnut',
            data: {
                labels: @json($resolutionData['labels']),
                datasets: [{ data: @json($resolutionData['data']), backgroundColor: [colors.success, colors.warning], borderWidth: 0 }]
            },
            options: pieOptions
        });

        // 4. Render Chart 3: Request Layanan
        chartInstances.layanan = new Chart(document.getElementById('requestLayananChart'), {
            type: 'bar',
            data: {
                labels: @json($layananData['labels']),
                datasets: [{ label: 'Jumlah Request', data: @json($layananData['data']), backgroundColor: colors.secondary, borderRadius: 4 }]
            },
            options: barOptions
        });

        // 5. Render Chart 4: Status Request
        chartInstances.status = new Chart(document.getElementById('requestStatusChart'), {
            type: 'pie',
            data: {
                labels: @json($requestStatusData['labels']),
                datasets: [{ data: @json($requestStatusData['data']), backgroundColor: [colors.warning, '#0EA5E9', colors.success, colors.danger], borderWidth: 0 }]
            },
            options: pieOptions
        });
    }

    // Jalankan saat halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', renderCharts);

    // KRITIK: MutationObserver untuk mendeteksi perubahan class 'dark' pada tag <html>
    // Ini yang membuat chart otomatis berubah warna saat tombol dark mode diklik
    const htmlElement = document.documentElement;
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                renderCharts(); // Render ulang chart dengan warna baru
            }
        });
    });
    
    // Mulai mengamati perubahan atribut class pada tag <html>
    observer.observe(htmlElement, { attributes: true });
</script>
@endpush
@endsection