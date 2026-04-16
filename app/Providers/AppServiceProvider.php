<?php

namespace App\Providers;

use App\Models\Organization;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\FrontendSetting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Middleware alias
        app('router')->aliasMiddleware(
            'permission',
            \App\Http\Middleware\CheckPermission::class
        );

        // Organization Info
        $org = Organization::select(
            'name',
            'organization_logo_name',
            'organization_picture'
        )->first();

        View::share('orgName', $org?->name ?? 'Organization Name');
        View::share('orgLogo', $org?->organization_logo_name ?? 'ORG');
        View::share('orgPicture', $org?->organization_picture);

        // ✅ SETTINGS (SAFE + FAST + GLOBAL)
        View::composer('*', function ($view) {

            $settings = Cache::remember('frontend_settings', 3600, function () {
                return FrontendSetting::first();
            });

            $view->with('settings', $settings);
        });

        // Debugbar toggle (good approach)
        View::composer('*', function () {
            if (Auth::check() && Auth::user()->is_debugbar) {
                if (class_exists(\Debugbar::class)) {
                    \Debugbar::enable();
                }
            } else {
                if (class_exists(\Debugbar::class)) {
                    \Debugbar::disable();
                }
            }
        });
    }
}
