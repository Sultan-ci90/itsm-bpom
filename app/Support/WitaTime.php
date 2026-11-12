<?php

namespace App\Support;

use Carbon\Carbon;
use Carbon\CarbonInterface;

class WitaTime
{
    public const TIMEZONE = 'Asia/Makassar';

    /**
     * Format timestamp ke zona waktu WITA dalam Bahasa Indonesia penuh.
     */
    public static function format(?CarbonInterface $dt, string $pattern = 'd F Y, H:i'): string
    {
        return $dt
            ? $dt->copy()->timezone(self::TIMEZONE)->locale('id')->translatedFormat($pattern) . ' WITA'
            : '-';
    }

    /**
     * Hitung sisa waktu menuju batas konfirmasi dalam Bahasa Indonesia penuh.
     */
    public static function remaining(?CarbonInterface $deadline): string
    {
        if (!$deadline || $deadline->isPast()) {
            return '0 detik';
        }

        return Carbon::now()->locale('id')->diffForHumans($deadline, [
            'parts' => 2,
            'join' => ' ',
            'syntax' => CarbonInterface::DIFF_ABSOLUTE,
        ]);
    }
}
