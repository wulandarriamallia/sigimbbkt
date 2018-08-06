<?php

namespace sigimbbkt\Http\Middleware;

use Closure;
use Sentinel;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Sentinel::check())
        return $next($request);
      else
        return response()->json('Anda tidak memiliki hak akses terhadap API ini...', 200);
    }
}
