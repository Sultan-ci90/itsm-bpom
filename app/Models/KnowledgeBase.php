<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class KnowledgeBase extends Model
{
    use HasFactory;

    protected $table = 'knowledge_bases';

    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'ringkasan',
        'solusi',
        'gambar',
        'is_published',
        'helpful_yes',
        'helpful_no',
        'views',
        'created_by',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'helpful_yes'  => 'integer',
        'helpful_no'   => 'integer',
        'views'        => 'integer',
    ];

    public const KATEGORI_LIST = [
        'Hardware & Printer'  => 'Hardware & Printer',
        'Jaringan & Internet' => 'Jaringan & Internet',
        'Akun & Akses'        => 'Akun & Akses',
        'Aplikasi BPOM'       => 'Aplikasi BPOM',
        'Lainnya'             => 'Lainnya',
    ];

    /**
     * Relasi ke pembuat artikel (Staf IT / Admin).
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope artikel yang aktif dipublikasikan.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope pencarian judul, ringkasan, atau solusi.
     */
    public function scopeSearch($query, ?string $term)
    {
        if (empty($term)) {
            return $query;
        }

        return $query->where(function ($q) use ($term) {
            $q->where('judul', 'like', "%{$term}%")
              ->orWhere('ringkasan', 'like', "%{$term}%")
              ->orWhere('solusi', 'like', "%{$term}%");
        });
    }

    /**
     * Generate unique slug otomatis.
     */
    public static function generateSlug(string $judul, ?int $ignoreId = null): string
    {
        $slug = Str::slug($judul);
        $original = $slug;
        $count = 1;

        while (static::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = "{$original}-{$count}";
            $count++;
        }

        return $slug;
    }

    /**
     * Tambah hit views artikel.
     */
    public function incrementViews(): void
    {
        $this->increment('views');
    }

    /**
     * Tambah vote helpfulness artikel.
     */
    public function rateHelpful(bool $isYes): void
    {
        if ($isYes) {
            $this->increment('helpful_yes');
        } else {
            $this->increment('helpful_no');
        }
    }

    /**
     * Warna badge kategori.
     */
    public function getKategoriBadgeAttribute(): string
    {
        return match ($this->kategori) {
            'Hardware & Printer'  => 'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300 border-amber-200 dark:border-amber-800/40',
            'Jaringan & Internet' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 border-blue-200 dark:border-blue-800/40',
            'Akun & Akses'        => 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300 border-purple-200 dark:border-purple-800/40',
            'Aplikasi BPOM'       => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300 border-emerald-200 dark:border-emerald-800/40',
            default               => 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-300 border-gray-200 dark:border-gray-700',
        };
    }
}
