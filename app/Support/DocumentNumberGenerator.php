<?php

namespace App\Support;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class DocumentNumberGenerator
{
    /**
     * Generate nomor surat/tiket berformat {SEQ}/{CODE}/BBPOM/{MM}/{YYYY}
     * dengan urutan kontinu per tahun dan reset otomatis ke 001 saat ganti tahun.
     */
    public static function generateYearly(Builder $query, string $column, string $code, ?Carbon $date = null): string
    {
        $now = $date ?? Carbon::now();
        $month = $now->format('m');
        $year = $now->format('Y');
        $suffixPattern = "%/{$code}/BBPOM/%/{$year}";

        // Lock seluruh record tahun berjalan dengan format baru dan hitung max integer prefix di PHP
        // agar kebal terhadap pengurutan alfabetis ('999' > '1000') serta kompatibel MySQL/SQLite.
        $existingNumbers = (clone $query)
            ->where($column, 'like', $suffixPattern)
            ->lockForUpdate()
            ->pluck($column);

        $maxSequence = 0;
        foreach ($existingNumbers as $nomor) {
            $prefix = explode('/', (string) $nomor)[0] ?? '';
            if (is_numeric($prefix)) {
                $maxSequence = max($maxSequence, (int) $prefix);
            }
        }

        $nextSequence = str_pad((string) ($maxSequence + 1), 3, '0', STR_PAD_LEFT);

        return "{$nextSequence}/{$code}/BBPOM/{$month}/{$year}";
    }
}
