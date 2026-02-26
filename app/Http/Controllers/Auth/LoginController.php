<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Validate the user login request (override).
     */
    protected function validateLogin(Request $request): void
    {
        // Önce normal login validasyonu
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',

            // ✅ reCAPTCHA (anhskohbo/no-captcha paketi ile)
            'g-recaptcha-response' => ['required', 'captcha'],
        ], [
            'g-recaptcha-response.required' => 'Lütfen reCAPTCHA doğrulamasını yapın.',
            'g-recaptcha-response.captcha'  => 'reCAPTCHA doğrulaması başarısız. Tekrar deneyin.',
        ]);
    }
}
