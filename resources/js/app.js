import { createPopper } from '@popperjs/core';
import './bootstrap';
import Alpine from 'alpinejs';

// flatpickr
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';

// SPA & Live Table engines
import { registerLiveTable } from './live-table';
import { initSpaNav } from './spa-nav';

window.Alpine = Alpine;
window.createPopper = createPopper;
window.flatpickr = flatpickr;

// Daftarkan komponen live table ke Alpine sebelum start
registerLiveTable(Alpine);
Alpine.start();

// Asynchronous ApexCharts Dynamic Loader
let apexPromise = null;
window.ensureApexCharts = function () {
    if (window.ApexCharts) {
        return Promise.resolve(window.ApexCharts);
    }
    if (!apexPromise) {
        apexPromise = import('apexcharts').then(module => {
            window.ApexCharts = module.default || module;
            return window.ApexCharts;
        });
    }
    return apexPromise;
};

// Hook global untuk inisialisasi ulang komponen dinamis pada setiap navigasi SPA & DOM load
window.initPageComponents = function () {
    // 1. Chart components (Dynamic on-demand loading)
    const hasCharts = document.querySelector('#ticket-status-chart, #incidentTrendChart');
    if (hasCharts) {
        window.ensureApexCharts().then(() => {
            if (document.querySelector('#ticket-status-chart')) {
                import("./components/chart/ticket-charts").then(module => module.default());
            }

            if (typeof window.renderDashboardCharts === 'function' && document.querySelector('#incidentTrendChart')) {
                window.renderDashboardCharts();
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', () => {
    window.initPageComponents();
    initSpaNav();
});
