<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Fonnte WhatsApp Gateway Configuration
    |--------------------------------------------------------------------------
    */

    'token' => env('FONNTE_TOKEN', ''),
    'enabled' => env('FONNTE_ENABLED', true),
    'target_admin' => env('FONNTE_TARGET_ADMIN', ''),
    'url' => env('FONNTE_URL', 'https://api.fonnte.com'),
    'country_code' => env('FONNTE_COUNTRY_CODE', '62'),
];
