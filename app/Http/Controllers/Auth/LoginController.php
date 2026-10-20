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

        // Captcha sekali pakai & memiliki batas waktu 2 menit
        $expected  = $request->session()->pull('captcha_answer');
        $expiresAt = $request->session()->pull('captcha_expires_at');
        $given     = CaptchaImage::normalize($credentials['captcha']);

        if ($expiresAt && now()->timestamp > $expiresAt) {
            return back()
                ->withErrors(['captcha' => 'Captcha telah kedaluwarsa (lebih dari 2 menit). Silakan ketik kata dari gambar baru.'])
                ->onlyInput('email');
        }

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
            $request->session()->forget('url.intended');

            $user = Auth::user();
            if ($user && $user->isPelapor()) {
                return redirect()->route('home');
            }

            return redirect()->route('dashboard');
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