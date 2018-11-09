<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;

class AuthJWT
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

      try{
        $user = JWTAuth::toUser($request->token);
      }
      catch(Exception $e){
        if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                 return response()->json(['error'=>'Token es Invalido']);
             }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                 return response()->json(['error'=>'Token ha Expirado']);
             }else{
                 return response()->json(['error'=>'algo malo ha pasado']);
             }
      }
        return $next($request);
    }
}
