<?php

namespace App\Services;

use App\Models\User;
use App\Models\BanUser;
use App\Models\UserDevice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;

class AuthService
{
    // ==============================
    // 🔐 LOGIN FLOW
    // ==============================

    public function findUser($loginInput)
    {
        Log::info('🔍 Finding user', ['input' => $loginInput]);

        $field = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($field, $loginInput)->first();

        Log::info('👤 User result', ['found' => !!$user, 'field' => $field]);

        return $user;
    }

    public function checkMaintenance($user)
    {
        Log::info('🛠 Checking maintenance mode');

        $globalMaintenance = User::where('is_maintenance', 1)->first();

        if ($globalMaintenance && (!$user || !$user->hasRole('admin'))) {
            Log::warning('🚫 Maintenance active', [
                'user' => $user?->id
            ]);

            return back()->with('maintenance', $globalMaintenance->maintenance_message);
        }

        return null;
    }

    public function failedLogin()
    {
        Log::warning('❌ Login failed');

        return back()->withErrors([
            'login' => trans('auth.failed'),
        ]);
    }

    public function checkUserBan($user)
    {
        Log::info('🚫 Checking user ban', ['user_id' => $user->id]);

        if ($user->is_banned) {
            $ban = BanUser::where('user_id', $user->id)
                ->where('is_banned', true)
                ->latest('banned_at')
                ->first();

            Log::warning('⛔ User is banned', [
                'reason' => $ban?->ban_reason
            ]);

            return back()->with(
                'banned',
                $ban?->ban_reason ?? 'Your account has been banned.'
            );
        }

        return null;
    }

    public function validatePassword($password, $user)
    {
        $valid = Hash::check($password, $user->password);

        Log::info('🔑 Password validation', [
            'user_id' => $user->id,
            'valid' => $valid
        ]);

        return $valid;
    }

    public function performLogin($request, $user)
    {
        Log::info('✅ Performing login', ['user_id' => $user->id]);

        // ⚠️ Check device ban BEFORE login
        $this->checkDeviceBan($request, $user);

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        Log::info('🔐 Auth::login success');

        // Activity log
        activity()
            ->causedBy($user)
            ->performedOn($user)
            ->event('login')
            ->log('User logged in');

        $this->handleAuthenticated($request, $user);
    }

    // ==============================
    // ✅ AFTER LOGIN
    // ==============================

    public function handleAuthenticated($request, $user)
    {
        Log::info('🎯 Post-login handler');

        $this->trackUserDevice($request, $user);
        $this->setLoginSuccessMessage($user);
    }

    private function checkDeviceBan($request, $user)
    {
        Log::info('📱 Checking device ban', [
            'ip' => $request->ip(),
        ]);

        $banned = UserDevice::where('user_id', $user->id)
            ->where('ip_address', $request->ip())
            ->where('user_agent', $request->userAgent())
            ->where('is_banned', true)
            ->first();

        if ($banned) {
            Log::error('🚫 Device banned', [
                'user_id' => $user->id
            ]);

            abort(403, 'Your device is banned. Contact admin.');
        }
    }

    private function trackUserDevice($request, $user)
    {
        Log::info('📊 Tracking device');

        $agent = new Agent();

        UserDevice::updateOrCreate(
            [
                'user_id'    => $user->id,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ],
            [
                'device_name'   => $agent->device() ?: 'Desktop',
                'device_type'   => $agent->platform() . ' - ' . $agent->browser(),
                'last_login_at' => now(),
            ]
        );
    }

    private function setLoginSuccessMessage($user)
    {
        Log::info('💬 Setting success message');

        session()->flash('login_success', 'Welcome back, ' . $user->name . '!');
    }
}
