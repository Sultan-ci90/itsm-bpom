<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Sibob\SibobService;
use App\Services\Sibob\SibobUserMapper;
use App\Support\CaptchaImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.auth.signin', [
            'title' => 'Sign In',
        ]);
    }

    public function login(Request $request, SibobService $sibob, SibobUserMapper $mapper)
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

        $email = trim($credentials['email']);
        $password = $credentials['password'];
        $remember = $request->boolean('remember');

        if ($sibob->isEnabled()) {
            $authResult = $sibob->authenticate($email, $password);

            if ($authResult->isAuthenticated() && is_array($authResult->profile)) {
                $user = $mapper->upsertUser($authResult->profile, $password);

                Auth::login($user, $remember);
                $request->session()->regenerate();
                $request->session()->forget('url.intended');

                if ($authResult->token) {
                    $request->session()->put('sibob_token', Crypt::encryptString($authResult->token));
                }

                return $this->redirectAfterLogin($user);
            }

            if ($authResult->isInvalidCredentials()) {
                $localUser = User::whereRaw('LOWER(email) = ?', [strtolower($email)])->first();

                // Akun lokal non-SIBOB (mis. akun darurat/testing) tetap bisa login lokal
                if ($localUser && !$localUser->isSibobLinked() && Auth::attempt(['email' => $localUser->email, 'password' => $password], $remember)) {
                    $request->session()->regenerate();
                    $request->session()->forget('url.intended');

                    return $this->redirectAfterLogin(Auth::user());
                }

                return back()
                    ->withErrors(['email' => 'Email atau password salah.'])
                    ->onlyInput('email');
            }

            // Server SIBOB tidak dapat dijangkau / error 5xx
            if (config('sibob.allow_local_fallback_on_outage', true)) {
                $localUser = User::whereRaw('LOWER(email) = ?', [strtolower($email)])->first();
                if ($localUser && Auth::attempt(['email' => $localUser->email, 'password' => $password], $remember)) {
                    $request->session()->regenerate();
                    $request->session()->forget('url.intended');

                    return $this->redirectAfterLogin(Auth::user());
                }

                return back()
                    ->withErrors(['email' => 'Server SIBOB sedang tidak dapat dijangkau dan autentikasi lokal tidak cocok.'])
                    ->onlyInput('email');
            }

            return back()
                ->withErrors(['email' => 'Server autentikasi SIBOB sedang tidak dapat dijangkau. Silakan coba lagi nanti.'])
                ->onlyInput('email');
        }

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            $request->session()->regenerate();
            $request->session()->forget('url.intended');

            return $this->redirectAfterLogin(Auth::user());
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

        $request->session()->forget('sibob_token');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('signin')
            ->with('success', 'Berhasil logout.');
    }

    private function redirectAfterLogin(?User $user)
    {
        if ($user && $user->isPelapor()) {
            return redirect()->route('home');
        }

        return redirect()->route('dashboard');
    }
}