<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Integrasi API SIBOB BBPOM Banjarmasin
    |--------------------------------------------------------------------------
    | Konfigurasi terpusat agar seluruh kredensial dan token berada di .env,
    | tidak pernah hardcoded di kode sumber, serta memudahkan pemetaan JSON.
    */

    'enabled' => (bool) env('SIBOB_ENABLED', true),

    'base_url' => rtrim((string) env('SIBOB_BASE_URL', 'https://sibob.bbpombanjarmasin.com'), '/'),

    'timeout' => (int) env('SIBOB_TIMEOUT', 10),

    'allow_local_fallback_on_outage' => (bool) env('SIBOB_ALLOW_LOCAL_FALLBACK_ON_OUTAGE', true),

    'auto_sync' => (bool) env('SIBOB_AUTO_SYNC', false),

    // Batas maksimal halaman pagination saat menarik /api/v1/users (pengaman loop)
    'max_pages' => (int) env('SIBOB_MAX_PAGES', 50),

    // Kredensial / token service account (diisi lewat .env)
    'service_token' => env('SIBOB_SYNC_TOKEN'),
    'service_email' => env('SIBOB_SYNC_EMAIL'),
    'service_password' => env('SIBOB_SYNC_PASSWORD'),

    'endpoints' => [
        'login' => '/api/v1/login',
        'profile' => '/api/v1/profile',
        'users' => '/api/v1/users',
    ],

    // Variasi key yang umum muncul pada JSON response API SIBOB
    'token_paths' => [
        'token',
        'access_token',
        'data.token',
        'data.access_token',
        'result.token',
        'meta.token',
    ],

    'user_paths' => [
        'user',
        'data.user',
        'data',
        'profile',
        'result',
    ],

    'list_paths' => [
        'data.data',
        'data.users',
        'users',
        'data',
        'result',
    ],

    'field_aliases' => [
        'sibob_id' => ['id', 'user_id', 'pegawai_id'],
        'nip' => ['nip', 'no_pegawai', 'nip_baru', 'nip_lama', 'employee_id'],
        'nama' => ['nama', 'name', 'full_name', 'nama_lengkap'],
        'email' => ['email'],
        'no_telp' => ['no_telp', 'telp', 'no_hp', 'phone', 'telepon', 'wa', 'whatsapp'],
        'alamat' => ['alamat', 'address'],
        'tempat_lahir' => ['tempat_lahir', 'tempat_lhr', 'birth_place'],
        'tanggal_lahir' => ['tanggal_lahir', 'tgl_lhr', 'tgl_lahir', 'birth_date'],
        'jenkel' => ['jenkel', 'jkel', 'jenis_kelamin', 'gender', 'jk'],
        'status_kepegawaian' => ['status_kepegawaian', 'status_pegawai', 'status', 'kepegawaian'],
        'status_pernikahan' => ['status_pernikahan', 'nikah', 'status_nikah', 'marital_status'],
        'jabatan_fungsional' => ['jabatan_fungsional', 'jabasn_name', 'jabasn', 'deskjob', 'jabatan_fung', 'jafung'],
        'foto_profil' => ['foto_profil', 'foto', 'avatar', 'photo', 'photo_url', 'avatar_url'],
        'bidang' => ['divisi_name', 'divisi', 'bidang.nama_bidang', 'bidang.nama', 'bidang.name', 'nama_bidang', 'bidang', 'unit_kerja', 'bagian'],
        'jabatan' => ['jabasn_name', 'jabasn', 'jabatan.nama_jabatan', 'jabatan.nama', 'jabatan.name', 'nama_jabatan', 'jabatan', 'namanogelar'],
        'pangkat' => ['panggol.pangkat', 'pangkat.nama', 'pangkat'],
        'golongan' => ['panggol.golongan', 'golongan.nama', 'golongan'],
    ],
];
