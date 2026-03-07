<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DeveloperModeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('developer_mode')) {
            abort(404); // hide login page
        }

        return $next($request);
    }
}
