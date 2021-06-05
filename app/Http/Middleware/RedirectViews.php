<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectViews
{
    public function handle(Request $request, Closure $next)
    {
        return redirect('/');
//        return $next($request);
    }
}
