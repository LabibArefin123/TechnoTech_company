<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Services\AuthService;

class LoginController extends Controller
{
    protected string $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request, AuthService $authService)
    {
        Log::info('🚀 Login attempt started', [
            'login' => $request->input('login'),
            'ip' => $request->ip()
        ]);

        $request->ensureIsNotRateLimited();

        try {
            $user = $authService->findUser($request->input('login'));

            if ($response = $authService->checkMaintenance($user)) {
                Log::warning('🛠 Blocked by maintenance');
                return $response;
            }

            if (!$user) {
                Log::warning('❌ User not found');
                return $authService->failedLogin();
            }

            if ($response = $authService->checkUserBan($user)) {
                Log::warning('🚫 User banned');
                return $response;
            }

            if (!$authService->validatePassword($request->input('password'), $user)) {
                Log::warning('🔑 Wrong password');
                return $authService->failedLogin();
            }

            $authService->performLogin($request, $user);

            Log::info('🎉 Login successful', ['user_id' => $user->id]);

            return redirect()->intended($this->redirectTo);
        } catch (\Exception $e) {
            Log::error('🔥 Login error', [
                'message' => $e->getMessage()
            ]);

            return back()->withErrors([
                'login' => 'Something went wrong. Check logs.'
            ]);
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        Log::info('👋 Logout attempt', [
            'user_id' => $user?->id
        ]);

        if ($user) {
            activity('User')
                ->causedBy($user)
                ->log('User logged out');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info('✅ Logout success');

        return redirect('/');
    }
}
