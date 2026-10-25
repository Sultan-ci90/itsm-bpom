<?php

namespace App\Support;

/**
 * Membuat gambar captcha (PNG) dari sebuah kata memakai ekstensi GD:
 * huruf berwarna hijau dengan garis dasar rata dan stabil, sedikit kemiringan halus,
 * serta garis & titik pengganggu untuk keamanan.
 */
class CaptchaImage
{
    /** Samakan format kata (huruf kecil, spasi rapi) sebelum dibandingkan. */
    public static function normalize(string $text): string
    {
        return preg_replace('/\s+/u', ' ', mb_strtolower(trim($text)));
    }

    public static function render(string $text, string $fontPath, int $width = 240, int $height = 80): string
    {
        if (!function_exists('imagecreatetruecolor') || !function_exists('imagettftext')) {
            throw new \RuntimeException('Ekstensi PHP GD (dengan FreeType) belum aktif.');
        }
        if (!is_file($fontPath)) {
            throw new \RuntimeException("Font captcha tidak ditemukan: {$fontPath}");
        }

        $chars = mb_str_split(mb_strtolower(trim($text)));

        // 1. Kanvas
        $img = imagecreatetruecolor($width, $height);
        $bg  = imagecolorallocate($img, 244, 245, 247);
        imagefilledrectangle($img, 0, 0, $width, $height, $bg);

        // 2. Garis pengganggu (di belakang teks)
        for ($i = 0; $i < 5; $i++) {
            $c = imagecolorallocate($img, random_int(165, 205), random_int(205, 232), random_int(165, 205));
            imagesetthickness($img, random_int(1, 2));
            imageline($img, random_int(0, $width), random_int(0, $height), random_int(0, $width), random_int(0, $height), $c);
        }
        imagesetthickness($img, 1);

        // 3. Ukuran huruf disesuaikan agar kata panjang tetap muat
        $size = 38;
        do {
            $advances = [];
            foreach ($chars as $ch) {
                $box = imagettfbbox($size, 0, $fontPath, $ch);
                $advances[] = max(6, abs($box[2] - $box[0])) + 1;
            }
            $total = array_sum($advances);
            $size -= 2;
        } while ($total > $width - 36 && $size > 16);
        $size += 2;

        // 4. Gambar huruf satu per satu (sudut, posisi, dan warna acak)
        $greens = [
            imagecolorallocate($img, 28, 165, 40),
            imagecolorallocate($img, 18, 135, 34),
            imagecolorallocate($img, 44, 185, 62),
        ];

        $x = (int) (($width - $total) / 2);
        foreach ($chars as $i => $ch) {
            $box   = imagettfbbox($size, 0, $fontPath, $ch);
            $base  = (int) ($height * 0.5 + $size * 0.36);
            $angle = random_int(-6, 6);

            imagettftext($img, $size, $angle, $x - $box[0], $base, $greens[array_rand($greens)], $fontPath, $ch);
            $x += $advances[$i];
        }

        // 5. Titik pengganggu
        for ($i = 0; $i < 120; $i++) {
            $c = imagecolorallocate($img, random_int(170, 220), random_int(200, 235), random_int(170, 220));
            imagesetpixel($img, random_int(0, $width - 1), random_int(0, $height - 1), $c);
        }

        ob_start();
        imagepng($img, null, 6);
        $png = ob_get_clean();
        imagedestroy($img);

        return $png;
    }
}