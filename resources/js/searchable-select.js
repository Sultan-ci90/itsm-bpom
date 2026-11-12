import TomSelect from 'tom-select';

// Tetap expose global untuk kompatibilitas jika ada pemanggilan eksternal
window.TomSelect = TomSelect;

/**
 * Inisialisasi seluruh elemen <select data-searchable-select> dengan TomSelect + dropdown_input.
 * Aman dipanggil berulang pada initial load maupun setelah navigasi SPA.
 */
export function initSearchableSelects(root = document) {
    if (!root) return;

    root.querySelectorAll('select[data-searchable-select]').forEach((el) => {
        if (el.tomselect) {
            el.tomselect.sync();
            return;
        }

        new TomSelect(el, {
            plugins: ['dropdown_input'],
            create: false,
            sortField: { field: 'text', direction: 'asc' },
            placeholder: el.dataset.placeholder || 'Ketik untuk mencari...',
            maxOptions: Number(el.dataset.maxOptions || 2000),
            allowEmptyOption: el.dataset.allowEmpty === 'true',
        });
    });
}
