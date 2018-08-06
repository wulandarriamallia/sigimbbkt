<?php

namespace sigimbbkt\Http\Middleware;

use Closure;
use Sentinel;

class VisitorsMiddleware
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
      if (!Sentinel::check())
        return $next($request);
      else
        $notification = ['message' => 'Anda telah login...', 'alert-type' => 'info'];

        return redirect('/')->with($notification);
    }
}
