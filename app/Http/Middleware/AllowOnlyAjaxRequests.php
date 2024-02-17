<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllowOnlyAjaxRequests
{

    public function handle($request, Closure $next)
    {
        if($request->ajax()) {
            return $next($request);
        }
        return response('not sinin', 405);

    }

}
