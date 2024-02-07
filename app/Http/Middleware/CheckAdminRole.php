<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle($request, Closure $next)
    {
        
        if (Auth::check()) {
            if (Auth::user()->hasRole(['المدير', 'ادمن'])) {
                return $next($request);
            }
        }
        return redirect()->back()->with('error', 'Sorry, you do not have the required permissions.');
    }
}
