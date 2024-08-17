<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            if (!Auth::user()->hasRole(['User', 'user'])) {
                return $next($request);
            }
        }
        return redirect()->back()->with('error', 'عفوا ليس لديك الصلاحية');
    }
}
