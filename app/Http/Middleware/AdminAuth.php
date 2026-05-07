<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Check if admin is authenticated
        $isAuthenticated = $request->session()->get('admin_authenticated') === true;

        // If not authenticated, explicitly clear admin session and redirect to survey with login modal
        if (!$isAuthenticated) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/survey')->with('show_login_modal', true);
        }

        return $next($request);
    }
}
