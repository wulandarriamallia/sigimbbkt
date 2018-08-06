<?php

namespace sigimbbkt\Http\Middleware;

use Closure;

class NonsecMiddleware
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
      if ($request->secure())
      {
        return redirect($request->path());
      }

      return $next($request);
    }
}
