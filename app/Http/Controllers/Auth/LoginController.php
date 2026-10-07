<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Support\CaptchaImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.auth.signin', [
            'title' => 'Sign In',
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'captcha' => ['required', 'string', 'max:50'],
        ], [
            'captcha.required' => 'Ketik kata yang tampil pada gambar.',
        ]);

        // Captcha sekali pakai: jawaban langsung dihapus dari session begitu dicek,
        // jadi setiap percobaan login (benar/salah) butuh gambar baru.
        $expected = $request->session()->pull('captcha_answer');
        $given    = CaptchaImage::normalize($credentials['captcha']);

        if (!$expected || !hash_equals($expected, $given)) {
            return back()
                ->withErrors(['captcha' => 'Kata pada gambar salah. Silakan coba lagi.'])
                ->onlyInput('email');
        }

        $remember = $request->boolean('remember');

        if (Auth::attempt(
            [
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ],
            $remember
        )) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('signin')
            ->with('success', 'Berhasil logout.');
    }
}