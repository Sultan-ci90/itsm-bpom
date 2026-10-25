/**
 * Native Vanilla SPA Navigation Engine
 * Menyediakan transisi antar halaman instan tanpa full page reload.
 */

let progressBar = null;
let progressTimer = null;

function createProgressBar() {
    if (!progressBar) {
        progressBar = document.createElement('div');
        progressBar.id = 'spa-progress-bar';
        progressBar.style.cssText = [
            'position: fixed',
            'top: 0',
            'left: 0',
            'height: 2.5px',
            'background-color: #10B981',
            'z-index: 999999',
            'transition: width 0.25s ease, opacity 0.3s ease',
            'width: 0%',
            'opacity: 0',
            'pointer-events: none',
            'box-shadow: 0 0 10px rgba(16, 185, 129, 0.75)'
        ].join(';');
        document.body.appendChild(progressBar);
    }
    return progressBar;
}

function startProgressBar() {
    const bar = createProgressBar();
    if (progressTimer) clearInterval(progressTimer);

    bar.style.opacity = '1';
    bar.style.width = '25%';

    let current = 25;
    progressTimer = setInterval(() => {
        if (current < 85) {
            current += Math.random() * 15;
            bar.style.width = `${Math.min(current, 85)}%`;
        }
    }, 200);
}

function finishProgressBar() {
    const bar = createProgressBar();
    if (progressTimer) clearInterval(progressTimer);

    bar.style.width = '100%';
    setTimeout(() => {
        bar.style.opacity = '0';
        setTimeout(() => {
            bar.style.width = '0%';
        }, 300);
    }, 150);
}

function updateSidebarActive(targetUrl) {
    try {
        const targetPath = new URL(targetUrl, window.location.origin).pathname;
        const sidebar = document.getElementById('sidebar');
        if (!sidebar) return;

        sidebar.querySelectorAll('a.menu-item, a.menu-dropdown-item').forEach(link => {
            try {
                const linkPath = new URL(link.href, window.location.origin).pathname;
                const isExact = (linkPath === targetPath);

                if (link.classList.contains('menu-item')) {
                    if (isExact) {
                        link.classList.add('menu-item-active');
                        link.classList.remove('menu-item-inactive');
                        const icon = link.querySelector('span');
                        if (icon) {
                            icon.classList.add('menu-item-icon-active');
                            icon.classList.remove('menu-item-icon-inactive');
                        }
                    } else {
                        link.classList.remove('menu-item-active');
                        link.classList.add('menu-item-inactive');
                        const icon = link.querySelector('span');
                        if (icon) {
                            icon.classList.remove('menu-item-icon-active');
                            icon.classList.add('menu-item-icon-inactive');
                        }
                    }
                } else if (link.classList.contains('menu-dropdown-item')) {
                    if (isExact) {
                        link.classList.add('menu-dropdown-item-active');
                        link.classList.remove('menu-dropdown-item-inactive');
                    } else {
                        link.classList.remove('menu-dropdown-item-active');
                        link.classList.add('menu-dropdown-item-inactive');
                    }
                }
            } catch (e) {
                // Ignore parse errors on relative or invalid links
            }
        });
    } catch (e) {
        // Safe fallback
    }
}

export async function navigateTo(url, pushState = true) {
    const currentMain = document.getElementById('main-content');
    if (!currentMain) {
        window.location.href = url;
        return;
    }

    startProgressBar();

    try {
        const response = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!response.ok) {
            window.location.href = url;
            return;
        }

        const html = await response.text();
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');

        const newMain = doc.getElementById('main-content');
        if (!newMain) {
            // Jika halaman tidak memiliki main-content (misal halaman signin/error/fullscreen), fallback ke reload penuh
            window.location.href = url;
            return;
        }

        // 1. Update Title Dokumen
        document.title = doc.title;

        // 2. Ganti konten utama
        currentMain.innerHTML = newMain.innerHTML;

        // 3. Update History URL
        if (pushState) {
            window.history.pushState({ spa: true }, '', url);
        }

        // 4. Update status aktif menu sidebar
        updateSidebarActive(url);

        // 5. Tutup sidebar mobile jika sedang terbuka
        if (window.Alpine && window.Alpine.store('sidebar')) {
            window.Alpine.store('sidebar').isMobileOpen = false;
        }

        // 6. Jalankan script yang ada di dalam main-content secara berurutan
        const scripts = Array.from(currentMain.querySelectorAll('script'));
        for (const oldScript of scripts) {
            const newScript = document.createElement('script');
            Array.from(oldScript.attributes).forEach(attr => {
                newScript.setAttribute(attr.name, attr.value);
            });

            if (oldScript.src) {
                await new Promise((resolve) => {
                    newScript.onload = resolve;
                    newScript.onerror = resolve;
                    oldScript.parentNode.replaceChild(newScript, oldScript);
                });
            } else {
                newScript.textContent = oldScript.textContent;
                oldScript.parentNode.replaceChild(newScript, oldScript);
            }
        }

        // 7. Re-inisialisasi Alpine.js pada DOM baru
        if (window.Alpine) {
            window.Alpine.initTree(currentMain);
        }

        // 8. Re-inisialisasi komponen UI lainnya (TomSelect, Charts, dll.)
        if (typeof window.initPageComponents === 'function') {
            window.initPageComponents();
        }

        // 9. Pancarkan event kustom navigasi halaman selesai
        window.dispatchEvent(new CustomEvent('spa:navigated', { detail: { url } }));

        // 10. Scroll ke paling atas
        window.scrollTo({ top: 0, behavior: 'instant' });
    } catch (err) {
        console.error('[SPA Engine] Gagal navigasi, fallback ke halaman reguler:', err);
        window.location.href = url;
    } finally {
        finishProgressBar();
    }
}

export function initSpaNav() {
    // Intersep klik pada seluruh link internal
    document.addEventListener('click', (e) => {
        const link = e.target.closest('a');
        if (!link || !link.href) return;

        // Cek modifikasi tombol mouse (Ctrl+Click, Middle Click, dsb.)
        if (e.button !== 0 || e.ctrlKey || e.metaKey || e.shiftKey || e.altKey) return;

        // Cek pengecualian
        if (link.hasAttribute('download')) return;
        if (link.getAttribute('target') === '_blank') return;
        if (link.hasAttribute('data-no-spa')) return;

        const href = link.getAttribute('href');
        if (!href || href === '#' || href.startsWith('#') || href.startsWith('javascript:') || href.startsWith('mailto:') || href.startsWith('tel:')) {
            return;
        }

        try {
            const url = new URL(link.href, window.location.origin);

            // Cek origin sama
            if (url.origin !== window.location.origin) return;

            // Jangan intersep link file download (pdf, excel, zip)
            const pathname = url.pathname.toLowerCase();
            if (pathname.endsWith('.pdf') || pathname.endsWith('.xlsx') || pathname.endsWith('.csv') || pathname.endsWith('.zip') || pathname.includes('/pdf') || pathname.includes('/export')) {
                return;
            }

            // Jika link mengarah ke rute yang sama persis
            if (url.href === window.location.href) {
                e.preventDefault();
                return;
            }

            // Jalankan SPA navigasi
            e.preventDefault();
            navigateTo(url.href, true);
        } catch (err) {
            // Abaikan parsing error, biarkan browser menanganinya secara native
        }
    });

    // Tangani navigasi tombol Back/Forward browser
    window.addEventListener('popstate', () => {
        navigateTo(window.location.href, false);
    });
}
