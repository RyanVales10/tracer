<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Allow middleware to protect admin routes; if not authenticated, redirect to the admin login page
        if ($request->session()->get('admin_authenticated') !== true) {
            return redirect('/admin');
        }

        return $next($request);
    }
}
