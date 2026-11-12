<?php

namespace App\Services\Sibob;

class SibobAuthResult
{
    public const STATUS_AUTHENTICATED = 'authenticated';
    public const STATUS_INVALID_CREDENTIALS = 'invalid_credentials';
    public const STATUS_UNAVAILABLE = 'unavailable';

    public function __construct(
        public readonly string $status,
        public readonly ?string $token = null,
        public readonly ?array $profile = null,
        public readonly ?string $message = null,
    ) {}

    public static function authenticated(string $token, array $profile): self
    {
        return new self(self::STATUS_AUTHENTICATED, $token, $profile);
    }

    public static function invalidCredentials(?string $message = null): self
    {
        return new self(self::STATUS_INVALID_CREDENTIALS, message: $message);
    }

    public static function unavailable(?string $message = null): self
    {
        return new self(self::STATUS_UNAVAILABLE, message: $message);
    }

    public function isAuthenticated(): bool
    {
        return $this->status === self::STATUS_AUTHENTICATED;
    }

    public function isInvalidCredentials(): bool
    {
        return $this->status === self::STATUS_INVALID_CREDENTIALS;
    }

    public function isUnavailable(): bool
    {
        return $this->status === self::STATUS_UNAVAILABLE;
    }
}
