<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
        'description',
    ];

    /**
     * Ambil nilai setting berdasarkan key.
     * Fallback ke default jika tidak ditemukan atau null.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();
        if (!$setting || $setting->value === null) {
            return $default;
        }

        return match ($setting->type) {
            'boolean', 'bool' => filter_var($setting->value, FILTER_VALIDATE_BOOLEAN),
            'integer', 'int' => (int) $setting->value,
            'json', 'array' => json_decode($setting->value, true) ?? $default,
            default => $setting->value,
        };
    }

    /**
     * Ambil nilai boolean setting.
     */
    public static function getBool(string $key, bool $default = false): bool
    {
        $val = static::get($key, $default);
        return filter_var($val, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Simpan atau perbarui nilai setting.
     */
    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'string', ?string $description = null): self
    {
        $strValue = is_array($value) ? json_encode($value) : (string) $value;

        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $strValue,
                'group' => $group,
                'type' => $type,
                'description' => $description,
            ]
        );
    }
}
