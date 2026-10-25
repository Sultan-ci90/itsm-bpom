import { createPopper } from '@popperjs/core';
import './bootstrap';
import Alpine from 'alpinejs';
import ApexCharts from 'apexcharts';

// flatpickr
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
// FullCalendar
import { Calendar } from 'fullcalendar';
// chartticket
import initTicketStatusChart from "./components/chart/ticket-charts";

// SPA & Live Table engines
import { registerLiveTable } from './live-table';
import { initSpaNav } from './spa-nav';

window.Alpine = Alpine;
window.createPopper = createPopper;
window.ApexCharts = ApexCharts;
window.flatpickr = flatpickr;
window.FullCalendar = Calendar;

// Daftarkan komponen live table ke Alpine sebelum start
registerLiveTable(Alpine);
Alpine.start();

// Hook global untuk inisialisasi ulang komponen dinamis pada setiap navigasi SPA & DOM load
window.initPageComponents = function () {
    initTicketStatusChart();

    if (typeof window.renderDashboardCharts === 'function' && document.querySelector('#incidentTrendChart')) {
        window.renderDashboardCharts();
    }

    if (typeof window.initTomSelect === 'function') {
        window.initTomSelect();
    }

    // Map imports
    if (document.querySelector('#mapOne')) {
        import('./components/map').then(module => module.initMap());
    }

    // Chart imports
    if (document.querySelector('#chartOne')) {
        import('./components/chart/chart-1').then(module => module.initChartOne());
    }
    if (document.querySelector('#chartTwo')) {
        import('./components/chart/chart-2').then(module => module.initChartTwo());
    }
    if (document.querySelector('#chartThree')) {
        import('./components/chart/chart-3').then(module => module.initChartThree());
    }
    if (document.querySelector('#chartSix')) {
        import('./components/chart/chart-6').then(module => module.initChartSix());
    }
    if (document.querySelector('#chartEight')) {
        import('./components/chart/chart-8').then(module => module.initChartEight());
    }
    if (document.querySelector('#chartThirteen')) {
        import('./components/chart/chart-13').then(module => module.initChartThirteen());
    }

    // Calendar init
    if (document.querySelector('#calendar')) {
        import('./components/calendar-init').then(module => module.calendarInit());
    }
};

document.addEventListener('DOMContentLoaded', () => {
    window.initPageComponents();
    initSpaNav();
});
