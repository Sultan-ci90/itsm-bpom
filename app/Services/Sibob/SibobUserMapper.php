<?php

namespace App\Services\Sibob;

use App\Models\Bidang;
use App\Models\Jabatan;
use App\Models\Panggol;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SibobUserMapper
{
    /** @var array<string, int> */
    private array $bidangCache = [];

    /** @var array<string, int> */
    private array $jabatanCache = [];

    /** @var array<string, int> */
    private array $panggolCache = [];

    /**
     * Sinkronkan satu payload user dari SIBOB ke tabel users lokal.
     * Menimpa field yang dikirim SIBOB sambil mempertahankan role ITSM lokal
     * serta tidak menghapus data lokal ketika endpoint ringkas (/users) tidak mengirim field tersebut.
     */
    public function upsertUser(array $payload, ?string $plainPasswordOnLogin = null): User
    {
        return DB::transaction(function () use ($payload, $plainPasswordOnLogin) {
            $sibobId = $this->cleanString($this->extractField($payload, 'sibob_id'));
            $rawEmail = strtolower($this->cleanString($this->extractField($payload, 'email')));
            $rawNip = $this->cleanString($this->extractField($payload, 'nip'));

            if ($sibobId === '' && $rawEmail === '') {
                throw new \InvalidArgumentException('Payload pengguna SIBOB tidak memiliki id maupun email.');
            }

            $user = $this->findExistingUser($sibobId, $rawEmail, $rawNip);

            $email = $rawEmail !== ''
                ? Str::limit($rawEmail, 150, '')
                : ($user?->email ?: "sibob-{$sibobId}@sibob.local");

            $nip = $rawNip !== ''
                ? Str::limit($rawNip, 30, '')
                : (($user && $user->nip && !str_starts_with($user->nip, 'SIBOB-')) ? $user->nip : null);

            $nama = $this->cleanString($this->extractField($payload, 'nama'));
            if ($nama === '') {
                $nama = $user?->nama ?: (strstr($email, '@', true) ?: $email);
            }
            $nama = Str::limit($nama, 150, '');

            $hasBidangKey = $this->payloadHasKey($payload, 'bidang');
            $hasJabatanKey = $this->payloadHasKey($payload, 'jabatan');
            $hasPanggolKey = $this->payloadHasKey($payload, 'pangkat') || $this->payloadHasKey($payload, 'golongan') || array_key_exists('panggol', $payload);

            $bidangText = $this->extractTextValue($payload, 'bidang');
            $jabatanText = $this->extractTextValue($payload, 'jabatan');
            $pangkatText = $this->extractTextValue($payload, 'pangkat');
            $golonganText = $this->extractTextValue($payload, 'golongan');

            $bidangId = $bidangText !== ''
                ? $this->resolveBidangId($bidangText)
                : ($hasBidangKey ? null : $user?->bidang_id);

            $jabatanId = $jabatanText !== ''
                ? $this->resolveJabatanId($jabatanText)
                : ($hasJabatanKey ? null : $user?->jabatan_id);

            $panggolId = ($pangkatText !== '' || $golonganText !== '' || !empty($payload['panggol']))
                ? $this->resolvePanggolId($pangkatText, $golonganText, data_get($payload, 'panggol'))
                : ($hasPanggolKey ? null : $user?->panggol_id);

            $hasPhotoKey = $this->payloadHasKey($payload, 'foto_profil');
            $parsedPhoto = $this->normalizePhotoPath($this->cleanString($this->extractField($payload, 'foto_profil')));
            $fotoProfil = $hasPhotoKey ? $parsedPhoto : $user?->foto_profil;
            $oldFoto = $user?->foto_profil;

            $hasTempatLahir = $this->payloadHasKey($payload, 'tempat_lahir');
            $hasTglLahir = $this->payloadHasKey($payload, 'tanggal_lahir');
            $hasJenkel = $this->payloadHasKey($payload, 'jenkel');
            $hasKepegawaian = $this->payloadHasKey($payload, 'status_kepegawaian');
            $hasPernikahan = $this->payloadHasKey($payload, 'status_pernikahan');
            $hasTelp = $this->payloadHasKey($payload, 'no_telp');
            $hasAlamat = $this->payloadHasKey($payload, 'alamat');
            $hasJafung = $this->payloadHasKey($payload, 'jabatan_fungsional');

            $tempatLahirVal = $this->cleanString($this->extractField($payload, 'tempat_lahir'));
            $noTelpVal = $this->cleanString($this->extractField($payload, 'no_telp'));
            $alamatVal = $this->cleanString($this->extractField($payload, 'alamat'));

            $attributes = [
                'sibob_id' => $sibobId !== '' ? Str::limit($sibobId, 64, '') : ($user?->sibob_id),
                'nip' => $nip,
                'nama' => $nama,
                'email' => $email,
                'foto_profil' => $fotoProfil,
                'tempat_lahir' => Str::limit($hasTempatLahir ? ($tempatLahirVal !== '' ? $tempatLahirVal : '-') : ($user?->tempat_lahir ?: '-'), 100, ''),
                'tanggal_lahir' => $hasTglLahir
                    ? $this->normalizeDate($this->extractField($payload, 'tanggal_lahir'))
                    : ($user?->tanggal_lahir ?: '1990-01-01'),
                'jenkel' => $hasJenkel
                    ? $this->normalizeGender($this->extractField($payload, 'jenkel'))
                    : ($user?->jenkel ?: 'L'),
                'status_kepegawaian' => $hasKepegawaian
                    ? $this->normalizeKepegawaian($this->extractField($payload, 'status_kepegawaian'))
                    : ($user?->status_kepegawaian ?: 'Lainnya'),
                'status_pernikahan' => $hasPernikahan
                    ? $this->normalizePernikahan($this->extractField($payload, 'status_pernikahan'))
                    : ($user?->status_pernikahan ?: 'Belum Menikah'),
                'no_telp' => Str::limit($hasTelp ? ($noTelpVal !== '' ? $noTelpVal : '-') : ($user?->no_telp ?: '-'), 20, ''),
                'alamat' => $hasAlamat ? ($alamatVal !== '' ? $alamatVal : '-') : ($user?->alamat ?: '-'),
                'jabatan_fungsional' => $hasJafung
                    ? Str::limit((string) $this->cleanNullableString($this->extractField($payload, 'jabatan_fungsional')), 150, '') ?: null
                    : $user?->jabatan_fungsional,
                'bidang_id' => $bidangId,
                'jabatan_id' => $jabatanId,
                'panggol_id' => $panggolId,
                'sibob_synced_at' => now(),
            ];

            if ($user) {
                if ($plainPasswordOnLogin !== null && $plainPasswordOnLogin !== '') {
                    $attributes['password'] = Hash::make($plainPasswordOnLogin);
                }

                $user->update($attributes);

                if (
                    $oldFoto
                    && $oldFoto !== $fotoProfil
                    && !preg_match('/^https?:\/\//i', $oldFoto)
                    && Storage::disk('public')->exists($oldFoto)
                ) {
                    Storage::disk('public')->delete($oldFoto);
                }

                return $user->fresh();
            }

            $attributes['role'] = 'pelapor';
            $attributes['password'] = Hash::make(
                ($plainPasswordOnLogin !== null && $plainPasswordOnLogin !== '')
                    ? $plainPasswordOnLogin
                    : Str::random(40)
            );

            return User::create($attributes);
        });
    }

    /**
     * Sinkronisasi massal daftar pegawai SIBOB.
     *
     * @param array<int, array<string, mixed>> $rawUsers
     * @return array{created: int, updated: int, skipped: int}
     */
    public function syncMany(array $rawUsers): array
    {
        $summary = ['created' => 0, 'updated' => 0, 'skipped' => 0];

        foreach ($rawUsers as $payload) {
            if (!is_array($payload)) {
                $summary['skipped']++;
                continue;
            }

            $sibobId = $this->cleanString($this->extractField($payload, 'sibob_id'));
            $email = strtolower($this->cleanString($this->extractField($payload, 'email')));
            $nip = $this->cleanString($this->extractField($payload, 'nip'));

            if ($sibobId === '' && $email === '') {
                $summary['skipped']++;
                continue;
            }

            $existed = $this->findExistingUser($sibobId, $email, $nip) !== null;
            $this->upsertUser($payload);

            if ($existed) {
                $summary['updated']++;
            } else {
                $summary['created']++;
            }
        }

        return $summary;
    }

    private function findExistingUser(string $sibobId, string $email, string $nip): ?User
    {
        if ($sibobId !== '') {
            $bySibob = User::where('sibob_id', $sibobId)->first();
            if ($bySibob) {
                return $bySibob;
            }
        }

        if ($email !== '') {
            $byEmail = User::whereRaw('LOWER(email) = ?', [$email])->first();
            if ($byEmail) {
                return $byEmail;
            }
        }

        if ($nip !== '') {
            return User::where('nip', $nip)->first();
        }

        return null;
    }

    private function payloadHasKey(array $payload, string $key): bool
    {
        $sentinel = new \stdClass();
        foreach ((array) config("sibob.field_aliases.{$key}", [$key]) as $alias) {
            if (data_get($payload, $alias, $sentinel) !== $sentinel) {
                return true;
            }
        }

        return false;
    }

    private function extractField(array $payload, string $key): mixed
    {
        foreach ((array) config("sibob.field_aliases.{$key}", [$key]) as $alias) {
            $value = data_get($payload, $alias);
            if ($value !== null && $value !== '') {
                return $value;
            }
        }

        return null;
    }

    private function extractTextValue(array $payload, string $key): string
    {
        $value = $this->extractField($payload, $key);
        if (is_array($value)) {
            $nested = $value['nama'] ?? $value['name'] ?? $value['nama_bidang'] ?? $value['nama_jabatan'] ?? '';
            return $this->cleanString($nested);
        }

        return $this->cleanString($value);
    }

    private function resolveBidangId(string $namaBidang): ?int
    {
        if ($namaBidang === '') {
            return null;
        }

        $cacheKey = mb_strtolower($namaBidang);
        if (isset($this->bidangCache[$cacheKey])) {
            return $this->bidangCache[$cacheKey];
        }

        $bidang = Bidang::whereRaw('LOWER(nama_bidang) = ?', [$cacheKey])->first()
            ?? Bidang::create(['nama_bidang' => Str::limit($namaBidang, 100, '')]);

        return $this->bidangCache[$cacheKey] = $bidang->id;
    }

    private function resolveJabatanId(string $namaJabatan): ?int
    {
        if ($namaJabatan === '') {
            return null;
        }

        $cacheKey = mb_strtolower($namaJabatan);
        if (isset($this->jabatanCache[$cacheKey])) {
            return $this->jabatanCache[$cacheKey];
        }

        $jabatan = Jabatan::whereRaw('LOWER(nama_jabatan) = ?', [$cacheKey])->first()
            ?? Jabatan::create(['nama_jabatan' => Str::limit($namaJabatan, 150, '')]);

        return $this->jabatanCache[$cacheKey] = $jabatan->id;
    }

    private function resolvePanggolId(string $pangkat, string $golongan, mixed $rawPanggol): ?int
    {
        if ($pangkat === '' && $golongan === '' && is_string($rawPanggol) && trim($rawPanggol) !== '') {
            $raw = trim($rawPanggol);
            if (preg_match('/^(.+?)\s*\(([^)]+)\)$/', $raw, $m)) {
                $pangkat = trim($m[1]);
                $golongan = trim($m[2]);
            } elseif (preg_match('/^(I|II|III|IV|IX|X)\/[a-e]?$/i', $raw)) {
                $golongan = $raw;
            } else {
                $pangkat = $raw;
                $golongan = '-';
            }
        }

        if ($pangkat === '' && $golongan === '') {
            return null;
        }

        // Jika SIBOB hanya kirim golongan (mis. III/c, IV/a), cari dulu di referensi panggol eksisting
        if ($pangkat === '' && $golongan !== '') {
            $golKey = mb_strtolower($golongan);
            if (isset($this->panggolCache['gol:' . $golKey])) {
                return $this->panggolCache['gol:' . $golKey];
            }

            $existingByGol = Panggol::whereRaw('LOWER(golongan) = ?', [$golKey])->first();
            if ($existingByGol) {
                return $this->panggolCache['gol:' . $golKey] = $existingByGol->id;
            }
        }

        $pangkatVal = Str::limit($pangkat !== '' ? $pangkat : $golongan, 100, '');
        $golonganVal = Str::limit($golongan !== '' ? $golongan : '-', 20, '');
        $cacheKey = mb_strtolower("{$pangkatVal}|{$golonganVal}");

        if (isset($this->panggolCache[$cacheKey])) {
            return $this->panggolCache[$cacheKey];
        }

        $panggol = Panggol::whereRaw('LOWER(pangkat) = ? AND LOWER(golongan) = ?', [
            mb_strtolower($pangkatVal),
            mb_strtolower($golonganVal),
        ])->first() ?? Panggol::create([
            'pangkat' => $pangkatVal,
            'golongan' => $golonganVal,
        ]);

        if ($golongan !== '' && $pangkat === '') {
            $this->panggolCache['gol:' . mb_strtolower($golongan)] = $panggol->id;
        }

        return $this->panggolCache[$cacheKey] = $panggol->id;
    }

    private function normalizePhotoPath(string $photo): ?string
    {
        if ($photo === '') {
            return null;
        }

        if (preg_match('/^https?:\/\//i', $photo)) {
            return Str::limit($photo, 255, '');
        }

        $baseUrl = rtrim((string) config('sibob.base_url', ''), '/');
        if ($baseUrl !== '') {
            $trimmed = ltrim($photo, '/');
            if (!str_starts_with($trimmed, 'profiles/')) {
                return Str::limit($baseUrl . '/' . $trimmed, 255, '');
            }
        }

        return Str::limit(ltrim($photo, '/'), 255, '');
    }

    private function normalizeDate(mixed $raw): string
    {
        $str = $this->cleanString($raw);
        if ($str === '') {
            return '1990-01-01';
        }

        try {
            return Carbon::parse($str)->format('Y-m-d');
        } catch (\Throwable) {
            return '1990-01-01';
        }
    }

    private function normalizeGender(mixed $raw): string
    {
        $val = mb_strtolower($this->cleanString($raw));
        if (in_array($val, ['p', 'perempuan', 'female', 'f', 'wanita', '2'], true)) {
            return 'P';
        }

        return 'L';
    }

    private function normalizeKepegawaian(mixed $raw): string
    {
        $val = mb_strtolower($this->cleanString($raw));
        return match (true) {
            str_contains($val, 'pns') || str_contains($val, 'cpns') => 'PNS',
            str_contains($val, 'pppk') || str_contains($val, 'p3k') => 'PPPK',
            str_contains($val, 'honorer') || str_contains($val, 'ppnpn') || str_contains($val, 'kontrak') => 'Honorer',
            default => 'Lainnya',
        };
    }

    private function normalizePernikahan(mixed $raw): string
    {
        $val = mb_strtolower($this->cleanString($raw));
        return match (true) {
            in_array($val, ['n', 'no', 't', 'tidak', '0', 'false'], true) || str_contains($val, 'belum') || str_contains($val, 'single') || str_contains($val, 'lajang') => 'Belum Menikah',
            str_contains($val, 'janda') => 'Janda',
            str_contains($val, 'duda') => 'Duda',
            in_array($val, ['y', 'yes', 'ya', '1', 'true'], true) || str_contains($val, 'menikah') || str_contains($val, 'kawin') => 'Menikah',
            default => 'Belum Menikah',
        };
    }

    private function cleanString(mixed $value): string
    {
        if (is_scalar($value)) {
            return trim((string) $value);
        }

        return '';
    }

    private function cleanNullableString(mixed $value): ?string
    {
        $clean = $this->cleanString($value);
        return $clean === '' ? null : $clean;
    }
}
