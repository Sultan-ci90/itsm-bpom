<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BanjarCaptcha;
use App\Support\CaptchaImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CaptchaController extends Controller
{
    /**
     * Pilih satu kata Banjar secara acak, simpan jawabannya di session
     * (bukan di gambar/HTML), lalu kirim gambar PNG-nya.
     * Jika gagal, penyebabnya dicatat di storage/logs/laravel.log.
     */
    public function image(Request $request)
    {
        $word = BanjarCaptcha::inRandomOrder()->value('kata_banjar');

        if (!$word) {
            Log::warning('Captcha: tabel banjar_captchas kosong.');
            abort(503, 'Data captcha belum tersedia.');
        }

        try {
            $png = CaptchaImage::render($word, resource_path('fonts/captcha.ttf'));
        } catch (\Throwable $e) {
            Log::error('Captcha gagal dibuat: ' . $e->getMessage(), [
                'at' => $e->getFile() . ':' . $e->getLine(),
            ]);
            abort(500, 'Captcha gagal dibuat: ' . $e->getMessage());
        }

        // Jawaban baru disimpan hanya jika gambar berhasil dibuat
        $request->session()->put('captcha_answer', CaptchaImage::normalize($word));

        return response($png, 200, [
            'Content-Type'  => 'image/png',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma'        => 'no-cache',
        ]);
    }
}