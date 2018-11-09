<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Admin
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

      $user = Auth::guard()->authenticate();

      if(!$user->tipo == 0 ){
        return response()->json(['usted no esta autorizado'],403);
      }

        return $next($request);
    }
}
