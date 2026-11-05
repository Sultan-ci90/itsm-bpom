import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    server: {
        host: "0.0.0.0",
        port: 5173,
        strictPort: true,
        hmr: {
            host: "localhost",
        },
    },
    build: {
        cssCodeSplit: true,
        chunkSizeWarningLimit: 600,
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        if (id.includes('apexcharts')) return 'vendor-charts';
                        if (id.includes('fullcalendar')) return 'vendor-calendar';
                        if (id.includes('alpinejs')) return 'vendor-alpine';
                        if (id.includes('pusher-js') || id.includes('laravel-echo')) return 'vendor-echo';
                    }
                }
            }
        }
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
