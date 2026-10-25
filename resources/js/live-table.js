/**
 * Live Table Engine - Alpine.js
 * Memfasilitasi filter, pencarian, pagination, dan reset data table tanpa reload halaman.
 */
export function registerLiveTable(Alpine) {
    Alpine.data('liveTable', () => ({
        loading: false,
        hasFilters: false,

        init() {
            this.checkHasFilters();
            this.bindPagination();
        },

        checkHasFilters() {
            const form = this.$refs.form;
            if (!form) return;
            const formData = new FormData(form);
            let active = false;
            for (let [key, val] of formData.entries()) {
                if (key !== '_token' && val && val.toString().trim() !== '') {
                    active = true;
                    break;
                }
            }
            this.hasFilters = active;
        },

        bindPagination() {
            const wrapper = this.$refs.tableWrapper;
            if (!wrapper) return;
            const paginationLinks = wrapper.querySelectorAll('nav[role="navigation"] a, .pagination a, a[rel="prev"], a[rel="next"]');
            paginationLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    const href = link.getAttribute('href');
                    if (href && href !== '#' && !href.startsWith('javascript:')) {
                        e.preventDefault();
                        this.fetchData(href);
                    }
                });
            });
        },

        applyFilter() {
            const form = this.$refs.form;
            if (!form) return;

            const formData = new FormData(form);
            const params = new URLSearchParams();

            for (let [key, val] of formData.entries()) {
                if (key !== '_token') {
                    const str = val ? val.toString().trim() : '';
                    if (str !== '') {
                        params.append(key, str);
                    }
                }
            }

            const action = form.getAttribute('action') || window.location.pathname;
            const qs = params.toString();
            const targetUrl = qs ? `${action}?${qs}` : action;

            this.fetchData(targetUrl);
        },

        resetFilters() {
            const form = this.$refs.form;
            if (!form) return;

            form.querySelectorAll('input[type="text"], input[type="search"]').forEach(input => {
                input.value = '';
            });

            form.querySelectorAll('select').forEach(select => {
                select.selectedIndex = 0;
            });

            const action = form.getAttribute('action') || window.location.pathname;
            this.fetchData(action);
        },

        async fetchData(url) {
            if (this.loading) return;
            this.loading = true;

            try {
                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');

                const newWrapper = doc.querySelector('[x-ref="tableWrapper"]');
                if (newWrapper && this.$refs.tableWrapper) {
                    this.$refs.tableWrapper.innerHTML = newWrapper.innerHTML;
                    this.bindPagination();
                }

                // Sinkronkan URL browser tanpa reload halaman
                window.history.replaceState(null, '', url);
                this.checkHasFilters();
            } catch (err) {
                console.error('[LiveTable] Gagal memuat data:', err);
            } finally {
                this.loading = false;
            }
        }
    }));
}
