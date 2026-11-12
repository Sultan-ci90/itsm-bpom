<?php

use App\Support\WitaTime;
use Carbon\Carbon;

afterEach(function () {
    Carbon::setTestNow();
});

test('formats timestamps in Asia/Makassar WITA timezone with full Indonesian month names', function () {
    $mayUtc = Carbon::create(2026, 5, 1, 17, 30, 0, 'UTC');
    $augUtc = Carbon::create(2026, 8, 17, 2, 0, 0, 'UTC');
    $octUtc = Carbon::create(2026, 10, 29, 16, 5, 0, 'UTC');

    expect(WitaTime::format($mayUtc))->toBe('02 Mei 2026, 01:30 WITA');
    expect(WitaTime::format($augUtc))->toBe('17 Agustus 2026, 10:00 WITA');
    expect(WitaTime::format($octUtc))->toBe('30 Oktober 2026, 00:05 WITA');
    expect(WitaTime::format(null))->toBe('-');
});

test('calculates remaining confirmation duration in full Indonesian', function () {
    $now = Carbon::create(2026, 11, 11, 3, 15, 0, 'UTC');
    Carbon::setTestNow($now);

    expect(WitaTime::remaining($now->copy()->addHours(35)->addMinutes(20)))->toBe('1 hari 11 jam');
    expect(WitaTime::remaining($now->copy()->addHours(5)->addMinutes(40)))->toBe('5 jam 40 menit');
    expect(WitaTime::remaining($now->copy()->subMinute()))->toBe('0 detik');
    expect(WitaTime::remaining(null))->toBe('0 detik');
});
