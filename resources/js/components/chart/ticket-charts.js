export default function initTicketStatusChart() {
    const chartElement = document.querySelector('#ticket-status-chart');

    if (!chartElement) {
        return;
    }

    const rawStats = chartElement.dataset.ticketStats;

    if (!rawStats) {
        console.warn('Data ticket stats tidak ditemukan.');
        return;
    }

    let ticketStats;

    try {
        ticketStats = JSON.parse(rawStats);
    } catch (error) {
        console.error('Gagal membaca data ticket stats:', error);
        return;
    }

    console.log('Ticket stats dari database:', ticketStats);

    const labels = ticketStats.map(item => item.status);
    const series = ticketStats.map(item => Number(item.total));

    const options = {
        series: series,

        chart: {
            type: 'donut',
            height: 350,
            fontFamily: 'Outfit, sans-serif',
        },

        labels: labels,

        legend: {
            position: 'bottom',
        },

        dataLabels: {
            enabled: true,
        },

        responsive: [
            {
                breakpoint: 480,
                options: {
                    chart: {
                        width: 300,
                    },

                    legend: {
                        position: 'bottom',
                    },
                },
            },
        ],
    };

    const chart = new ApexCharts(chartElement, options);

    chart.render();
}