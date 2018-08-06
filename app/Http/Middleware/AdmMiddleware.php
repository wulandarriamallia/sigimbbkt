<?php

namespace sigimbbkt\Http\Middleware;

use Closure;
use Sentinel;

class AdmMiddleware
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
    if (Sentinel::check() && Sentinel::inRole('admin'))
      return $next($request);
    else
      $notification = ['message' => 'Sesi Anda telah habis, silahkan login kembali...', 'alert-type' => 'warning'];

      return redirect()->route('auth.login')->with($notification);
  }
}
