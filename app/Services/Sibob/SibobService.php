<?php

namespace App\Services\Sibob;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SibobService
{
    private const SERVICE_TOKEN_CACHE_KEY = 'sibob_service_api_token';

    public function isEnabled(): bool
    {
        return (bool) config('sibob.enabled', true) && $this->baseUrl() !== '';
    }

    public function baseUrl(): string
    {
        return rtrim((string) config('sibob.base_url', ''), '/');
    }

    /**
     * Autentikasi pegawai melalui POST /api/v1/login (tanpa retry agresif).
     */
    public function authenticate(string $email, string $password): SibobAuthResult
    {
        try {
            $response = $this->client()
                ->asForm()
                ->post($this->endpoint('login'), [
                    'email' => $email,
                    'password' => $password,
                ]);
        } catch (ConnectionException $e) {
            Log::warning('SIBOB login endpoint unreachable', [
                'message' => $e->getMessage(),
            ]);
            return SibobAuthResult::unavailable('Server SIBOB tidak dapat dijangkau.');
        } catch (\Throwable $e) {
            Log::warning('SIBOB login unexpected failure', [
                'message' => $e->getMessage(),
            ]);
            return SibobAuthResult::unavailable('Terjadi gangguan saat menghubungi SIBOB.');
        }

        if (in_array($response->status(), [401, 403, 422], true)) {
            return SibobAuthResult::invalidCredentials('Email atau password ditolak oleh SIBOB.');
        }

        if ($response->serverError() || !$response->successful()) {
            Log::warning('SIBOB login returned unexpected HTTP status', [
                'status' => $response->status(),
            ]);
            return SibobAuthResult::unavailable('Server SIBOB sedang mengalami gangguan.');
        }

        $json = $response->json();
        if (!is_array($json)) {
            return SibobAuthResult::unavailable('Format respons login SIBOB tidak valid.');
        }

        $token = $this->extractToken($json);
        $profile = $this->extractUser($json);

        // Gabungkan dengan GET /api/v1/profile agar field seperti divisi, jabasn, dan URL foto penuh ikut terbawa
        if ($token) {
            $fetchedProfile = $this->fetchProfile($token);
            if (is_array($fetchedProfile)) {
                $profile = $this->mergeProfiles($profile ?? [], $fetchedProfile);
            }
        }

        if (!$profile) {
            if ($token) {
                $profile = ['email' => $email];
            } else {
                Log::warning('SIBOB login response missing token and user payload');
                return SibobAuthResult::unavailable('Respons login SIBOB tidak memuat data pengguna.');
            }
        }

        $profile['email'] ??= $email;

        return SibobAuthResult::authenticated((string) $token, $profile);
    }

    /**
     * Ambil detail profil user aktif via GET /api/v1/profile.
     */
    public function fetchProfile(string $token): ?array
    {
        if (trim($token) === '') {
            return null;
        }

        try {
            $response = $this->client()
                ->withToken($token)
                ->get($this->endpoint('profile'));

            if (!$response->successful()) {
                return null;
            }

            $json = $response->json();
            return is_array($json) ? $this->extractUser($json) : null;
        } catch (\Throwable $e) {
            Log::warning('SIBOB fetchProfile failed', ['message' => $e->getMessage()]);
            return null;
        }
    }

    /**
     * Tarik seluruh daftar pegawai dari GET /api/v1/users (mendukung paginasi & auto-refresh 1x).
     *
     * @return array<int, array<string, mixed>>
     */
    public function fetchAllUsers(?string $sessionToken = null): array
    {
        [$token, $source] = $this->resolveSyncToken($sessionToken);
        $allowRefresh = ($source === 'cache' || $source === 'service') && $this->hasServiceCredentials();

        $allUsers = [];
        $nextTarget = $this->endpoint('users');
        $visited = [];
        $pageCount = 0;
        $maxPages = max(1, (int) config('sibob.max_pages', 50));
        $refreshed = false;

        while ($nextTarget !== null && $pageCount < $maxPages) {
            if (in_array($nextTarget, $visited, true)) {
                break;
            }
            $visited[] = $nextTarget;
            $pageCount++;

            try {
                $response = $this->requestWithToken($token, $nextTarget);
            } catch (ConnectionException $e) {
                throw new \RuntimeException('Koneksi ke server SIBOB gagal: ' . $e->getMessage(), 0, $e);
            }

            if ($response->status() === 401 && $allowRefresh && !$refreshed) {
                $refreshed = true;
                Cache::forget(self::SERVICE_TOKEN_CACHE_KEY);
                $token = $this->authenticateServiceAccount();
                $response = $this->requestWithToken($token, $nextTarget);
            }

            if (!$response->successful()) {
                throw new \RuntimeException("Gagal mengambil daftar pegawai SIBOB (HTTP {$response->status()}).");
            }

            $json = $response->json();
            if (!is_array($json)) {
                throw new \RuntimeException('Format respons daftar pegawai SIBOB tidak valid.');
            }

            $items = $this->extractList($json);
            foreach ($items as $item) {
                if (is_array($item)) {
                    $allUsers[] = $item;
                }
            }

            $nextTarget = $this->resolveNextPageTarget($json, $pageCount);
        }

        return $allUsers;
    }

    private function client(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl())
            ->acceptJson()
            ->timeout((int) config('sibob.timeout', 10));
    }

    private function endpoint(string $key): string
    {
        return '/' . ltrim((string) config("sibob.endpoints.{$key}", "/api/v1/{$key}"), '/');
    }

    private function requestWithToken(string $token, string $target): Response
    {
        // URL absolut hanya diizinkan bila host-nya persis sama dengan SIBOB base_url
        if (str_starts_with($target, 'http://') || str_starts_with($target, 'https://')) {
            return Http::acceptJson()
                ->timeout((int) config('sibob.timeout', 10))
                ->withToken($token)
                ->get($target);
        }

        return $this->client()->withToken($token)->get($target);
    }

    /**
     * @return array{0: string, 1: string} [token, source]
     */
    private function resolveSyncToken(?string $sessionToken): array
    {
        if (is_string($sessionToken) && trim($sessionToken) !== '') {
            return [trim($sessionToken), 'session'];
        }

        $staticToken = trim((string) config('sibob.service_token', ''));
        if ($staticToken !== '') {
            return [$staticToken, 'env_token'];
        }

        $cachedEncrypted = Cache::get(self::SERVICE_TOKEN_CACHE_KEY);
        if (is_string($cachedEncrypted) && $cachedEncrypted !== '') {
            try {
                return [Crypt::decryptString($cachedEncrypted), 'cache'];
            } catch (\Throwable) {
                Cache::forget(self::SERVICE_TOKEN_CACHE_KEY);
            }
        }

        if ($this->hasServiceCredentials()) {
            return [$this->authenticateServiceAccount(), 'service'];
        }

        throw new \RuntimeException('Token/akun sinkronisasi SIBOB belum dikonfigurasi di .env (SIBOB_SYNC_TOKEN atau SIBOB_SYNC_EMAIL/SIBOB_SYNC_PASSWORD).');
    }

    private function hasServiceCredentials(): bool
    {
        return trim((string) config('sibob.service_email', '')) !== ''
            && trim((string) config('sibob.service_password', '')) !== '';
    }

    private function authenticateServiceAccount(): string
    {
        $result = $this->authenticate(
            (string) config('sibob.service_email'),
            (string) config('sibob.service_password')
        );

        if (!$result->isAuthenticated() || !$result->token) {
            $reason = $result->message ? " ({$result->message})" : '';
            throw new \RuntimeException("Gagal autentikasi akun service SIBOB untuk sinkronisasi pegawai{$reason}.");
        }

        Cache::put(
            self::SERVICE_TOKEN_CACHE_KEY,
            Crypt::encryptString($result->token),
            now()->addMinutes(50)
        );

        return $result->token;
    }

    private function extractToken(array $json): ?string
    {
        foreach ((array) config('sibob.token_paths', []) as $path) {
            $value = data_get($json, $path);
            if (is_string($value) && trim($value) !== '') {
                return trim($value);
            }
        }

        return null;
    }

    private function extractUser(array $json): ?array
    {
        foreach ((array) config('sibob.user_paths', []) as $path) {
            $value = data_get($json, $path);
            if (is_array($value) && !array_is_list($value) && $value !== []) {
                // Pastikan bukan wrapper paginasi
                if (!isset($value['data']) || !is_array($value['data']) || isset($value['email']) || isset($value['nama']) || isset($value['name'])) {
                    return $value;
                }
            }
        }

        if (!array_is_list($json) && (isset($json['email']) || isset($json['nama']) || isset($json['name']) || isset($json['nip']))) {
            return $json;
        }

        return null;
    }

    /**
     * @return array<int, mixed>
     */
    private function extractList(array $json): array
    {
        if (array_is_list($json)) {
            return $json;
        }

        foreach ((array) config('sibob.list_paths', []) as $path) {
            $value = data_get($json, $path);
            if (is_array($value) && array_is_list($value)) {
                return $value;
            }
        }

        return [];
    }

    private function resolveNextPageTarget(array $json, int $currentLoopPage): ?string
    {
        $nextUrl = data_get($json, 'next_page_url')
            ?? data_get($json, 'links.next')
            ?? data_get($json, 'data.next_page_url');

        if (is_string($nextUrl) && trim($nextUrl) !== '') {
            $nextUrl = trim($nextUrl);
            if (str_starts_with($nextUrl, '/')) {
                return $nextUrl;
            }

            $baseHost = parse_url($this->baseUrl(), PHP_URL_HOST);
            $nextHost = parse_url($nextUrl, PHP_URL_HOST);
            if ($baseHost && $nextHost && strcasecmp($baseHost, $nextHost) === 0) {
                return $nextUrl;
            }
        }

        $currentPage = (int) (data_get($json, 'meta.current_page') ?? data_get($json, 'current_page') ?? 0);
        $lastPage = (int) (data_get($json, 'meta.last_page') ?? data_get($json, 'last_page') ?? 0);

        if ($lastPage > 1 && $currentPage > 0 && $currentPage < $lastPage) {
            $nextPage = max($currentPage + 1, $currentLoopPage + 1);
            return $this->endpoint('users') . '?page=' . $nextPage;
        }

        return null;
    }

    /**
     * Gabungkan payload profil login dan /profile tanpa menimpa field non-kosong dengan nilai null/kosong.
     *
     * @param array<string, mixed> $base
     * @param array<string, mixed> $overlay
     * @return array<string, mixed>
     */
    private function mergeProfiles(array $base, array $overlay): array
    {
        foreach ($overlay as $key => $value) {
            if ($value !== null && $value !== '') {
                $base[$key] = $value;
            } elseif (!array_key_exists($key, $base)) {
                $base[$key] = $value;
            }
        }

        return $base;
    }
}
