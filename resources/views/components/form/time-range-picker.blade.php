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
    // Sanitize H:i:s from DB to H:i for HTML5 time input compatibility
    $initStart = $rawStart ? substr($rawStart, 0, 5) : '';
    $initEnd = $rawEnd ? substr($rawEnd, 0, 5) : '';
    $startId = $startName . '_' . uniqid();
    $endId = $endName . '_' . uniqid();
@endphp

<div x-data="{
    start: @js($initStart),
    end: @js($initEnd),

    get durationText() {
        if (!this.start || !this.end) return null;
        const [h1, m1] = this.start.split(':').map(Number);
        const [h2, m2] = this.end.split(':').map(Number);
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
        return (h2 * 60 + m2) <= (h1 * 60 + m1);
    }
}" class="w-full">
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

    <div class="grid grid-cols-2 gap-4">
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
            <div class="relative">
                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>
                <input type="time"
                       id="{{ $startId }}"
                       name="{{ $startName }}"
                       x-model="start"
                       value="{{ $initStart }}"
                       onclick="this.showPicker && this.showPicker()"
                       class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-brand-500 focus:border-brand-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-brand-500 dark:focus:border-brand-500 shadow-xs cursor-pointer [&::-webkit-calendar-picker-indicator]:opacity-0 [&::-webkit-calendar-picker-indicator]:absolute [&::-webkit-calendar-picker-indicator]:end-0 [&::-webkit-calendar-picker-indicator]:top-0 [&::-webkit-calendar-picker-indicator]:bottom-0 [&::-webkit-calendar-picker-indicator]:w-10 [&::-webkit-calendar-picker-indicator]:cursor-pointer"
                       @if($alpineRequired) :required="{{ $alpineRequired }}" @elseif($required) required @endif />
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
            <div class="relative">
                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>
                <input type="time"
                       id="{{ $endId }}"
                       name="{{ $endName }}"
                       x-model="end"
                       value="{{ $initEnd }}"
                       onclick="this.showPicker && this.showPicker()"
                       class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-brand-500 focus:border-brand-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-brand-500 dark:focus:border-brand-500 shadow-xs cursor-pointer [&::-webkit-calendar-picker-indicator]:opacity-0 [&::-webkit-calendar-picker-indicator]:absolute [&::-webkit-calendar-picker-indicator]:end-0 [&::-webkit-calendar-picker-indicator]:top-0 [&::-webkit-calendar-picker-indicator]:bottom-0 [&::-webkit-calendar-picker-indicator]:w-10 [&::-webkit-calendar-picker-indicator]:cursor-pointer"
                       :class="isInvalid ? 'border-red-500 text-red-600 focus:border-red-500 focus:ring-red-500 dark:border-red-500 dark:text-red-400' : ''"
                       @if($alpineRequired) :required="{{ $alpineRequired }}" @elseif($required) required @endif />
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
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
