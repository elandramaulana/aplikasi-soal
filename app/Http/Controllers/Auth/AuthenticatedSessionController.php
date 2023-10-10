<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('login.loginadmin');
//        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
//        $request->authenticate();
//
//        $request->session()->regenerate();
//
//        return redirect()->intended(RouteServiceProvider::HOME);
        try {
            $request->authenticate();

            $request->session()->regenerate();

            $user = Auth::user();
//            dd($user);
            if ($user->role === 'member') {
                return redirect()->route('dashboardmhs')->with('success', 'Selamat Anda Berhasil Login');
            } elseif ($user->role === 'admin') {
                return redirect()->route('dashboard')->with('success', 'Selamat Anda Berhasil Login');
            } else {
                return redirect()->route('/');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Oops! Terjadi kesalahan saat login. Silakan coba lagi.');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
