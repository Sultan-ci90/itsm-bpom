/**
 * Live Table Engine - Alpine.js
 * Memfasilitasi filter, pencarian, pagination, dan reset data table tanpa reload halaman.
 */
export function registerLiveTable(Alpine) {
    Alpine.data('liveTable', () => ({
        loading: false,
        hasFilters: false,
        _isSyncingScroll: false,
        _floatingScrollBound: false,
        _windowListenersBound: false,
        _scrollHandler: null,
        _resizeHandler: null,
        _resizeObserver: null,

        init() {
            this.checkHasFilters();
            this.bindPagination();
            this.initStickyScrollbar();
        },

        destroy() {
            if (this._resizeObserver) this._resizeObserver.disconnect();
            if (this._scrollHandler) window.removeEventListener('scroll', this._scrollHandler);
            if (this._resizeHandler) window.removeEventListener('resize', this._resizeHandler);
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
                    this.initStickyScrollbar();
                }

                // Sinkronkan URL browser tanpa reload halaman
                window.history.replaceState(null, '', url);
                this.checkHasFilters();
            } catch (err) {
                console.error('[LiveTable] Gagal memuat data:', err);
            } finally {
                this.loading = false;
            }
        },

        initStickyScrollbar() {
            this.$nextTick(() => {
                const container = this.$refs.tableContainer;
                const floating = this.$refs.floatingScroll;
                const content = this.$refs.floatingScrollContent;
                if (!container || !floating || !content) return;

                // Bind listener pada floating scrollbar hanya sekali
                if (!this._floatingScrollBound) {
                    floating.addEventListener('scroll', () => {
                        if (this._isSyncingScroll) return;
                        this._isSyncingScroll = true;
                        if (this.$refs.tableContainer) {
                            this.$refs.tableContainer.scrollLeft = floating.scrollLeft;
                        }
                        requestAnimationFrame(() => { this._isSyncingScroll = false; });
                    }, { passive: true });
                    this._floatingScrollBound = true;
                }

                // Bind listener pada table container (bisa elemen baru pasca AJAX)
                container.addEventListener('scroll', () => {
                    if (this._isSyncingScroll) return;
                    this._isSyncingScroll = true;
                    if (this.$refs.floatingScroll) {
                        this.$refs.floatingScroll.scrollLeft = container.scrollLeft;
                    }
                    requestAnimationFrame(() => { this._isSyncingScroll = false; });
                }, { passive: true });

                // Window listeners (scroll & resize)
                if (!this._windowListenersBound) {
                    this._scrollHandler = () => this.updateStickyScrollbar();
                    this._resizeHandler = () => this.updateStickyScrollbar();
                    window.addEventListener('scroll', this._scrollHandler, { passive: true });
                    window.addEventListener('resize', this._resizeHandler, { passive: true });
                    this._windowListenersBound = true;
                }

                // ResizeObserver untuk memantau perubahan ukuran kontainer (misal: toggle sidebar)
                if (window.ResizeObserver) {
                    if (this._resizeObserver) {
                        this._resizeObserver.disconnect();
                    }
                    this._resizeObserver = new ResizeObserver(() => this.updateStickyScrollbar());
                    this._resizeObserver.observe(container);
                }

                this.updateStickyScrollbar();
            });
        },

        updateStickyScrollbar() {
            const container = this.$refs.tableContainer;
            const floating = this.$refs.floatingScroll;
            const content = this.$refs.floatingScrollContent;
            if (!container || !floating || !content) return;

            // Pastikan kontainer tampak di layar (tidak hidden di mobile < sm)
            if (container.offsetParent === null) {
                floating.style.display = 'none';
                return;
            }

            const hasOverflow = container.scrollWidth > container.clientWidth;
            if (!hasOverflow) {
                floating.style.display = 'none';
                return;
            }

            // Samakan lebar konten dummy dengan lebar penuh scrollable tabel
            content.style.width = `${container.scrollWidth}px`;

            const rect = container.getBoundingClientRect();
            const winHeight = window.innerHeight || document.documentElement.clientHeight;

            // Kondisi aktif:
            // 1. Bagian atas tabel sudah mulai masuk ke dalam viewport (rect.top < winHeight)
            // 2. Bagian dasar tabel (tempat scrollbar asli) masih di bawah tepi layar (rect.bottom > winHeight)
            const isTopVisible = rect.top < winHeight - 30;
            const isBottomOffscreen = rect.bottom > winHeight;

            if (isTopVisible && isBottomOffscreen) {
                floating.style.display = 'block';
                floating.style.left = `${rect.left}px`;
                floating.style.width = `${rect.width}px`;

                if (!this._isSyncingScroll) {
                    floating.scrollLeft = container.scrollLeft;
                }
            } else {
                floating.style.display = 'none';
            }
        }
    }));
}
