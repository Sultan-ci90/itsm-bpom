@php
    $unreadCount = auth()->user() ? auth()->user()->unreadNotifications()->count() : 0;
    $notifications = auth()->user() ? auth()->user()->notifications()->take(10)->get() : collect();
@endphp

<div class="relative" x-data="{
    dropdownOpen: false,
    notifying: {{ $unreadCount > 0 ? 'true' : 'false' }},
    toggleDropdown() {
        this.dropdownOpen = !this.dropdownOpen;
    },
    closeDropdown() {
        this.dropdownOpen = false;
    }
}" @click.away="closeDropdown()">
    <!-- Notification Button -->
    <button
        class="relative flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-full hover:text-dark-900 h-11 w-11 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white cursor-pointer"
        @click="toggleDropdown()"
        type="button"
        title="Notifikasi"
    >
        <!-- Notification Badge -->
        @if($unreadCount > 0)
        <span
            class="absolute right-0 top-0.5 z-1 h-2 w-2 rounded-full bg-orange-400"
        >
            <span
                class="absolute inline-flex w-full h-full bg-orange-400 rounded-full opacity-75 -z-1 animate-ping"
            ></span>
        </span>
        @endif

        <!-- Bell Icon -->
        <svg
            class="fill-current"
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10.75 2.29248C10.75 1.87827 10.4143 1.54248 10 1.54248C9.58583 1.54248 9.25004 1.87827 9.25004 2.29248V2.83613C6.08266 3.20733 3.62504 5.9004 3.62504 9.16748V14.4591H3.33337C2.91916 14.4591 2.58337 14.7949 2.58337 15.2091C2.58337 15.6234 2.91916 15.9591 3.33337 15.9591H4.37504H15.625H16.6667C17.0809 15.9591 17.4167 15.6234 17.4167 15.2091C17.4167 14.7949 17.0809 14.4591 16.6667 14.4591H16.375V9.16748C16.375 5.9004 13.9174 3.20733 10.75 2.83613V2.29248ZM14.875 14.4591V9.16748C14.875 6.47509 12.6924 4.29248 10 4.29248C7.30765 4.29248 5.12504 6.47509 5.12504 9.16748V14.4591H14.875ZM8.00004 17.7085C8.00004 18.1228 8.33583 18.4585 8.75004 18.4585H11.25C11.6643 18.4585 12 18.1228 12 17.7085C12 17.2943 11.6643 16.9585 11.25 16.9585H8.75004C8.33583 16.9585 8.00004 17.2943 8.00004 17.7085Z"
                fill=""
            />
        </svg>
    </button>

    <!-- Dropdown Start -->
    <div
        x-show="dropdownOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute -right-[240px] mt-[17px] flex h-[500px] w-[350px] flex-col rounded-2xl border border-gray-200 bg-white p-3 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark sm:w-[380px] lg:right-0"
        style="display: none;"
    >
        <!-- Dropdown Header -->
        <div class="flex items-center justify-between pb-3 mb-2 border-b border-gray-100 dark:border-gray-800">
            <div class="flex items-center gap-2">
                <h5 class="text-base font-semibold text-gray-800 dark:text-white/90">Notifikasi</h5>
                @if($unreadCount > 0)
                    <span class="rounded-full bg-brand-50 px-2 py-0.5 text-xs font-semibold text-brand-600 dark:bg-brand-950/40 dark:text-brand-400">
                        {{ $unreadCount }} baru
                    </span>
                @endif
            </div>

            <div class="flex items-center gap-1">
                @if($notifications->count() > 0)
                <!-- Tombol Hapus Semua Notifikasi -->
                <form action="{{ route('notifications.destroyAll') }}" method="POST" class="inline"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua notifikasi?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            title="Hapus Semua Notifikasi"
                            class="flex h-8 w-8 items-center justify-center rounded-lg text-gray-400 transition hover:bg-red-50 hover:text-red-500 dark:hover:bg-red-950/30 dark:hover:text-red-400 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
                @endif

                <button @click="closeDropdown()" class="flex h-8 w-8 items-center justify-center rounded-lg text-gray-500 transition hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800 cursor-pointer" type="button" title="Tutup">
                    <svg
                        class="fill-current"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z"
                            fill=""
                        />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Notification List -->
        <ul class="flex flex-col h-auto overflow-y-auto custom-scrollbar flex-1 pr-1">
            @forelse ($notifications as $notification)
                @php
                    $isUnread = $notification->unread();
                @endphp
                <li class="mb-1">
                    <a
                        class="flex items-start gap-3 rounded-xl p-3 transition {{ $isUnread ? 'bg-brand-50/60 dark:bg-brand-950/30 border border-brand-200/70 dark:border-brand-900/40 hover:bg-brand-50 dark:hover:bg-brand-950/50' : 'bg-transparent border border-transparent hover:bg-gray-50 dark:hover:bg-white/5 opacity-80 hover:opacity-100' }}"
                        href="{{ route('notifications.readAndRedirect', $notification->id) }}"
                    >
                        @if(isset($notification->data['user_avatar']) && $notification->data['user_avatar'])
                            <span class="relative block w-10 h-10 rounded-full z-1 shrink-0 mt-0.5">
                                <img src="{{ $notification->data['user_avatar'] }}" alt="User" class="overflow-hidden rounded-full h-10 w-10 object-cover" />
                                @if($isUnread)
                                    <span class="absolute bottom-0 right-0 z-10 h-2.5 w-2.5 rounded-full border-2 border-white dark:border-gray-900 bg-brand-500"></span>
                                @endif
                            </span>
                        @else
                            <span class="relative flex items-center justify-center w-10 h-10 rounded-full {{ $isUnread ? 'bg-brand-100 text-brand-600 dark:bg-brand-900/40 dark:text-brand-300' : 'bg-gray-100 text-gray-500 dark:bg-gray-800 dark:text-gray-400' }} shrink-0 mt-0.5">
                                @if(($notification->data['type'] ?? '') == 'new_ticket')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @endif
                                @if($isUnread)
                                    <span class="absolute top-0 right-0 h-2.5 w-2.5 rounded-full border-2 border-white dark:border-gray-900 bg-brand-500"></span>
                                @endif
                            </span>
                        @endif

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-1 mb-0.5">
                                <span class="text-xs {{ $isUnread ? 'font-semibold text-gray-900 dark:text-white' : 'font-medium text-gray-600 dark:text-gray-400' }} truncate">
                                    {{ $notification->data['title'] ?? 'Notifikasi' }}
                                </span>
                                @if($isUnread)
                                    <span class="h-2 w-2 rounded-full bg-brand-500 shrink-0" title="Belum dibaca"></span>
                                @endif
                            </div>
                            <p class="text-xs leading-relaxed {{ $isUnread ? 'text-gray-700 dark:text-gray-300 font-normal' : 'text-gray-500 dark:text-gray-500' }} line-clamp-2">
                                {{ $notification->data['message'] ?? '' }}
                            </p>
                            <span class="mt-1 block text-[11px] text-gray-400 dark:text-gray-500">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </a>
                </li>
            @empty
                <li class="py-12 text-center text-xs text-gray-400 dark:text-gray-500">
                    <svg class="w-8 h-8 mx-auto mb-2 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    Belum ada notifikasi
                </li>
            @endforelse
        </ul>

        <!-- Dropdown Footer -->
        @if($unreadCount > 0)
        <form action="{{ route('notifications.readAll') }}" method="POST" class="mt-2 pt-2 border-t border-gray-100 dark:border-gray-800">
            @csrf
            <button
                type="submit"
                class="flex w-full items-center justify-center gap-1.5 rounded-xl border border-gray-300 bg-white py-2.5 px-3 text-xs font-semibold text-gray-700 shadow-theme-xs transition hover:bg-gray-50 hover:text-gray-900 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 cursor-pointer"
            >
                <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Tandai Semua Dibaca
            </button>
        </form>
        @elseif($notifications->count() > 0)
        <div class="mt-2 pt-2 border-t border-gray-100 dark:border-gray-800 text-center text-[11px] text-gray-400 dark:text-gray-500">
            Semua notifikasi telah dibaca
        </div>
        @endif
    </div>
    <!-- Dropdown End -->
</div>
