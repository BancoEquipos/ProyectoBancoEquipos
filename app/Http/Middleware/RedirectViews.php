<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectViews
{
    public function handle(Request $request, Closure $next)
    {
        return dd($request->user());
//        if ($request->input('age') < 18) {
//            return redirect('home');
//        }
        return $next($request);
    }
}
