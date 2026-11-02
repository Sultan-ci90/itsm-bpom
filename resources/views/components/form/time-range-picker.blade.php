@props([
    'startName' => 'jam_mulai',
    'endName' => 'jam_selesai',
    'startValue' => null,
    'endValue' => null,
    'startLabel' => 'Start time:',
    'endLabel' => 'End time:',
    'label' => null,
    'required' => true,
    'alpineRequired' => null,
])

@php
    $rawStart = old($startName, $startValue ?? '');
    $rawEnd = old($endName, $endValue ?? '');
    // Sanitize H:i:s from DB to H:i for time format compatibility
    $initStart = $rawStart ? substr($rawStart, 0, 5) : '';
    $initEnd = $rawEnd ? substr($rawEnd, 0, 5) : '';
    $startId = $startName . '_' . uniqid();
    $endId = $endName . '_' . uniqid();
@endphp

<div x-data="{
    start: @js($initStart),
    end: @js($initEnd),
    fpStart: null,
    fpEnd: null,

    init() {
        this.$nextTick(() => {
            const commonConfig = {
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
                time_24hr: true,
                allowInput: true,
                minuteIncrement: 5,
                static: true,
            };

            if (this.$refs.startInput && typeof flatpickr !== 'undefined') {
                this.fpStart = flatpickr(this.$refs.startInput, {
                    ...commonConfig,
                    defaultDate: this.start ? this.start : null,
                    onChange: (selectedDates, dateStr) => {
                        this.start = dateStr;
                    },
                    onClose: (selectedDates, dateStr) => {
                        this.start = dateStr;
                    }
                });
            }

            if (this.$refs.endInput && typeof flatpickr !== 'undefined') {
                this.fpEnd = flatpickr(this.$refs.endInput, {
                    ...commonConfig,
                    defaultDate: this.end ? this.end : null,
                    onChange: (selectedDates, dateStr) => {
                        this.end = dateStr;
                    },
                    onClose: (selectedDates, dateStr) => {
                        this.end = dateStr;
                    }
                });
            }
        });
    },

    destroy() {
        if (this.fpStart) { this.fpStart.destroy(); this.fpStart = null; }
        if (this.fpEnd) { this.fpEnd.destroy(); this.fpEnd = null; }
    },

    syncManual(type, value) {
        this[type] = value;
        const fp = type === 'start' ? this.fpStart : this.fpEnd;
        if (fp && value && /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/.test(value)) {
            fp.setDate(value, false, 'H:i');
        }
    },

    get durationText() {
        if (!this.start || !this.end) return null;
        const [h1, m1] = this.start.split(':').map(Number);
        const [h2, m2] = this.end.split(':').map(Number);
        if (isNaN(h1) || isNaN(m1) || isNaN(h2) || isNaN(m2)) return null;
        const diff = (h2 * 60 + m2) - (h1 * 60 + m1);
        if (diff <= 0) return null;
        const hours = Math.floor(diff / 60);
        const mins = diff % 60;
        let res = '';
        if (hours > 0) res += `${hours} jam `;
        if (mins > 0) res += `${mins} menit`;
        return res.trim();
    },

    get isInvalid() {
        if (!this.start || !this.end) return false;
        const [h1, m1] = this.start.split(':').map(Number);
        const [h2, m2] = this.end.split(':').map(Number);
        if (isNaN(h1) || isNaN(m1) || isNaN(h2) || isNaN(m2)) return false;
        return (h2 * 60 + m2) <= (h1 * 60 + m1);
    }
}" x-init="init()" x-destroy="destroy()" class="w-full">
    @if($label)
        <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">
            {{ $label }}
            @if($alpineRequired)
                <span class="text-meta-1 text-red-500" x-show="{{ $alpineRequired }}">*</span>
            @elseif($required)
                <span class="text-meta-1 text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        {{-- Start Time Input --}}
        <div>
            <label for="{{ $startId }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ $startLabel }}
                @if(!$label)
                    @if($alpineRequired)
                        <span class="text-meta-1 text-red-500" x-show="{{ $alpineRequired }}">*</span>
                    @elseif($required)
                        <span class="text-meta-1 text-red-500">*</span>
                    @endif
                @endif
            </label>
            <div class="relative custom-timepicker">
                <input type="text"
                       x-ref="startInput"
                       id="{{ $startId }}"
                       name="{{ $startName }}"
                       :value="start"
                       @input="syncManual('start', $event.target.value)"
                       @change="syncManual('start', $event.target.value)"
                       placeholder="JJ:MM (cth: 09:00)"
                       class="h-11 w-full rounded-lg border appearance-none ltr:pl-4 ltr:pr-11 rtl:pr-4 rtl:pl-11 py-2.5 text-sm font-medium shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-brand-500/20 dark:border-gray-700 dark:focus:border-brand-800"
                       autocomplete="off"
                       @if($alpineRequired) :required="{{ $alpineRequired }}" @elseif($required) required @endif />
                <button type="button"
                        @click="fpStart ? fpStart.toggle() : null"
                        title="Buka pemilih waktu"
                        tabindex="-1"
                        class="absolute text-gray-500 -translate-y-1/2 ltr:right-3.5 rtl:left-3.5 top-1/2 dark:text-gray-400 hover:text-brand-500 dark:hover:text-brand-400 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </div>
            @error($startName)
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- End Time Input --}}
        <div>
            <label for="{{ $endId }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ $endLabel }}
                @if(!$label)
                    @if($alpineRequired)
                        <span class="text-meta-1 text-red-500" x-show="{{ $alpineRequired }}">*</span>
                    @elseif($required)
                        <span class="text-meta-1 text-red-500">*</span>
                    @endif
                @endif
            </label>
            <div class="relative custom-timepicker">
                <input type="text"
                       x-ref="endInput"
                       id="{{ $endId }}"
                       name="{{ $endName }}"
                       :value="end"
                       @input="syncManual('end', $event.target.value)"
                       @change="syncManual('end', $event.target.value)"
                       placeholder="JJ:MM (cth: 11:30)"
                       class="h-11 w-full rounded-lg border appearance-none ltr:pl-4 ltr:pr-11 rtl:pr-4 rtl:pl-11 py-2.5 text-sm font-medium shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-brand-500/20 dark:border-gray-700 dark:focus:border-brand-800"
                       :class="isInvalid ? 'border-red-500 text-red-600 focus:border-red-500 focus:ring-red-500 dark:border-red-500 dark:text-red-400' : ''"
                       autocomplete="off"
                       @if($alpineRequired) :required="{{ $alpineRequired }}" @elseif($required) required @endif />
                <button type="button"
                        @click="fpEnd ? fpEnd.toggle() : null"
                        title="Buka pemilih waktu"
                        tabindex="-1"
                        class="absolute text-gray-500 -translate-y-1/2 ltr:right-3.5 rtl:left-3.5 top-1/2 dark:text-gray-400 hover:text-brand-500 dark:hover:text-brand-400 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </div>
            @error($endName)
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Durasi & Validasi Helper --}}
    <div class="mt-1.5 flex items-center justify-between text-xs min-h-[1.25rem]">
        <template x-if="durationText && !isInvalid">
            <span class="inline-flex items-center gap-1 text-emerald-600 dark:text-emerald-400 font-medium">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Durasi Acara: <span x-text="durationText"></span>
            </span>
        </template>
        <template x-if="isInvalid">
            <span class="text-red-500 dark:text-red-400 flex items-center gap-1 font-medium">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                End time harus lebih besar dari Start time
            </span>
        </template>
    </div>
</div>
