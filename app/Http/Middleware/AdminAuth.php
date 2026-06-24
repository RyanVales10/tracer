<?php

namespace App\Http\Middleware;

use App\Models\AdminAccount;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Allow middleware to protect admin routes; if not authenticated, redirect to the admin login page
        $adminAccountId = $request->session()->get('admin_account_id');

        if ($request->session()->get('admin_authenticated') !== true || ! $adminAccountId) {
            $request->session()->forget(['admin_authenticated', 'admin_account_id']);
            return redirect('/admin');
        }

        if (! AdminAccount::whereKey($adminAccountId)->exists()) {
            $request->session()->forget(['admin_authenticated', 'admin_account_id']);
            return redirect('/admin');
        }

        return $next($request);
    }
}
