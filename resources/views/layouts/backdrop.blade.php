<div
    x-cloak
    x-show="$store.sidebar.isMobileOpen"
    x-transition.opacity.duration.300ms
    @click="$store.sidebar.setMobileOpen(false)"
    class="fixed inset-0 z-50 bg-gray-900/50 xl:hidden"
></div>
