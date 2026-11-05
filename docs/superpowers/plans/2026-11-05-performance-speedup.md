# Local Performance & Speedup Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Eliminate web latency and bottlenecks across Windows, Laragon, Laravel 12, Vite, and client-side JavaScript to make page loads and SPA transitions instantaneous (< 100ms).

**Architecture:** 
1. **Client-side**: Decouple Laravel Echo / Pusher WebSockets from global bootstrapping so an offline Reverb server never locks the browser thread with infinite reconnect loops.
2. **Server config**: Switch local session and cache storage from high-overhead MySQL disk writes (`database`) to zero-latency local storage (`file`), and disable CPU-draining Vite polling (`usePolling`).
3. **PHP OPcache**: Activate Zend OPcache CLI in PHP/Laragon so Laravel does not re-compile 3,000+ PHP files on every single HTTP request.
4. **Database & View optimization**: Memoize/cache notification queries in `notification-dropdown.blade.php` and eliminate exception overhead in `FonnteService`.

**Tech Stack:** Laravel 12, PHP 8.4 (Laragon on Windows), Tailwind CSS v4, Alpine.js, Vite 7, MySQL 8.

**Spec:** User reported web running extremely slow ("lambaaatttt sekali"). Deep profiling revealed 5 distinct concurrent bottlenecks causing cumulative latency of 1,000ms - 3,000ms per request.

## Global Constraints

- Do not install new Composer or NPM dependencies.
- Maintain full functionality of Live Chat and notifications when activated.
- Keep Tailwind CSS v4 styling rules and RTL logical properties.
- Strictly adhere to YAGNI / Ponytail minimalism: touch only the root cause lines.

## Review Focus

1. **Reverb Offline Graceful Degradation**: When `php artisan reverb:start` is not running, the application must load and navigate with zero console error loops or UI stutter.
2. **Session Persistence**: Switching `SESSION_DRIVER` to `file` must maintain login state and CSRF tokens across page navigations and AJAX calls.
3. **Notification Badge Accuracy**: Notification dropdown must continue showing unread counts accurately without firing duplicate queries on every sub-navigation.
4. **Service Request Completion WhatsApp**: `FonnteService` completing a service request must format the ticket number correctly without throwing `Undefined variable $nomorTiket`.
5. **Vite Hot Module Reload (HMR)**: Removing `usePolling: true` on Windows must retain fast hot reload without burning background CPU.

---

### Task 1: Fix Reverb / Echo Infinite Reconnect Storm on Client

**Root Cause:** `resources/js/bootstrap.js` blindly imports `resources/js/echo.js` on every page load. `echo.js` attempts to connect to `ws://localhost:8080`. Since Reverb is not running in local dev, Pusher enters an aggressive retry loop every 2 seconds, blocking the browser event loop, creating network stall warnings, and degrading SPA page transition performance.

**Files:**
- Modify: `resources/js/bootstrap.js`
- Modify: `resources/js/echo.js`
- Modify: `resources/views/requests/show.blade.php`
- Test: Open browser console on any page (e.g. `/`, `/incidents`) and verify zero WebSocket connection errors when Reverb is offline.

**Interfaces:**
- Consumes: `window.Echo` on demand.
- Produces: `window.initEcho()` lazy loader or conditional connection that only connects if explicitly needed and enabled.

- [ ] **Step 1: Check current console errors & network requests**
  Verify that `import './echo'` runs eagerly on non-chat pages.

- [ ] **Step 2: Update `resources/js/echo.js` to guard connection and export lazy initializer**
  Wrap Echo instantiation inside a helper `window.getEcho()` or conditional check so it only connects when a Reverb key exists and when explicitly invoked.

- [ ] **Step 3: Update `resources/js/bootstrap.js` and `resources/views/requests/show.blade.php`**
  Make Echo load on demand: in `requests/show.blade.php`, call `window.initEcho()` only when chat is opened.
  Remove unconditional `import './echo'` from `bootstrap.js`.

- [ ] **Step 4: Build assets and verify bundle**
  Run: `npm run build`
  Expected: Clean compilation, `vendor-echo` chunk isolated.

- [ ] **Step 5: Commit**
  ```bash
  git add resources/js/bootstrap.js resources/js/echo.js resources/views/requests/show.blade.php
  git commit -m "perf: prevent echo websocket reconnect loop when reverb is offline"
  ```

---

### Task 2: Optimize Environment Drivers (`.env`) for Local Development Speed

**Root Cause:** In `.env`, `SESSION_DRIVER=database` and `CACHE_STORE=database` force Laravel to perform synchronous read and write queries to MySQL tables (`sessions` and `cache`) on *every single request* (including SPA sub-fetches). On Windows NTFS disk I/O, this adds 50ms - 150ms of pure latency per request.

**Files:**
- Modify: `.env`
- Test: `php artisan test` & verify login/navigation works seamlessly.

**Interfaces:**
- Consumes: Laravel Session & Cache managers.
- Produces: In-memory/file session storage without MySQL locks.

- [ ] **Step 1: Check current `.env` driver configuration**
  Verify `SESSION_DRIVER=database` and `CACHE_STORE=database`.

- [ ] **Step 2: Update `.env` drivers to `file` for local development**
  Update:
  ```env
  SESSION_DRIVER=file
  CACHE_STORE=file
  ```

- [ ] **Step 3: Clear and regenerate configuration cache**
  Run: `php artisan config:clear && php artisan cache:clear`
  Expected: Success output.

- [ ] **Step 4: Commit documentation / env example update**
  Update `.env.example` with note regarding local vs production driver speeds.

---

### Task 3: Disable CPU-Intensive Vite File Polling on Windows

**Root Cause:** In `vite.config.js`, `watch: { usePolling: true }` instructs Chokidar/Node.js to actively stat every file across the workspace hundreds of times per second. On Windows, this consumes 15-40% background CPU and creates disk contention with PHP and MySQL.

**Files:**
- Modify: `vite.config.js`
- Test: Start `npm run dev` and edit a Blade/CSS file; confirm HMR updates within 100ms without polling CPU spike.

- [ ] **Step 1: Inspect `vite.config.js` watch block**
  Line 13-15 has `watch: { usePolling: true }`.

- [ ] **Step 2: Remove `watch: { usePolling: true }`**
  Native Windows file system events (`ReadDirectoryChangesW`) work out-of-the-box in Vite without polling when running directly in Windows/Laragon.

- [ ] **Step 3: Verify build and dev server**
  Run: `npm run build`
  Expected: Build completes in < 2 seconds.

- [ ] **Step 4: Commit**
  ```bash
  git add vite.config.js
  git commit -m "perf: remove cpu-intensive vite polling on windows"
  ```

---

### Task 4: Fix Undefined `$nomorTiket` in `FonnteService` to Prevent Log/Exception Overhead

**Root Cause:** In `app/Services/FonnteService.php` line 332 (`sendTicketCompletedNotification`), when the completed ticket is a `ServiceRequest`, `$nomorTiket` is never assigned. PHP logs an `Undefined variable $nomorTiket` warning with a full trace on every completed request, triggering disk I/O and slowing down ticket resolution requests.

**Files:**
- Modify: `app/Services/FonnteService.php:332-354`
- Test: `tests/Unit/FonnteServiceTest.php` or artisan tinker test.

- [ ] **Step 1: Write verification test for `sendTicketCompletedNotification` with ServiceRequest**
  Verify `$nomorTiket` resolves to `$ticket->nomor_tiket ?? $ticket->ticket_number ?? 'REQ-' . $ticket->id`.

- [ ] **Step 2: Add `$nomorTiket = $ticket->nomor_tiket ?? ('SR-' . $ticket->id);` inside the ServiceRequest branch in `FonnteService.php`**

- [ ] **Step 3: Run test suite**
  Run: `php artisan test --filter=Fonnte` (or run unit tests).
  Expected: No undefined variable warnings in `storage/logs/laravel.log`.

- [ ] **Step 4: Commit**
  ```bash
  git add app/Services/FonnteService.php
  git commit -m "fix: resolve undefined nomorTiket in ServiceRequest completion notification"
  ```

---

### Task 5: Optimize Notification Dropdown Database Queries

**Root Cause:** In `resources/views/components/header/notification-dropdown.blade.php`, on *every authenticated page load*, two separate SQL queries run against the `notifications` table (`unreadNotifications()->count()` and `notifications()->take(10)->get()`), even when the dropdown is closed.

**Files:**
- Modify: `resources/views/components/header/notification-dropdown.blade.php`
- Test: Verify notification bell still displays the count badge and opens dropdown correctly with notifications.

- [ ] **Step 1: Inspect `notification-dropdown.blade.php` lines 1-5**
  Notice eager loading of 10 notification records on every request.

- [ ] **Step 2: Optimize query execution**
  Cache/memoize `$unreadCount` for 30 seconds per user, or load notifications list only if unread count > 0 or when opened.

- [ ] **Step 3: Verify in browser**
  Ensure notifications still update and click-to-read functions normally.

- [ ] **Step 4: Commit**
  ```bash
  git add resources/views/components/header/notification-dropdown.blade.php
  git commit -m "perf: memoize notification queries in header dropdown"
  ```

---

### Task 6: Enable PHP OPcache & Laravel Route/Config Optimization (Laragon Guide & Script)

**Root Cause:** `php -m` revealed that Zend OPcache is completely disabled in PHP! In Windows, without OPcache, PHP is forced to re-read and compile thousands of Laravel files on every request from NTFS disk. Enabling OPcache typically yields a **300% to 500% speedup** for Laravel on Windows.

**Files:**
- Create: `scripts/optimize-local.bat`
- Provide step-by-step Laragon OPcache activation instructions.

- [ ] **Step 1: Create local speedup batch script (`scripts/optimize-local.bat`)**
- [ ] **Step 2: Document Laragon OPcache activation in 2 clicks**
- [ ] **Step 3: Verify OPcache status**
- [ ] **Step 4: Commit script**
