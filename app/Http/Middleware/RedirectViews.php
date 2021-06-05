<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectViews
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return 'estas logeado';
        } else {
            return 'no estas logeado';
        }
        return $next($request);
    }
}
