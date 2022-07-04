<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $autorizacion = $request->header('Authorization');
            $jwt = substr($autorizacion, 7);
            $key = env('JWT_SECRET', '');
            
            $datos = JWT::decode($jwt,  new Key($key, 'HS256'));
            
            $request->attributes->add(['usuario' => $datos]);
        }
        catch (\Exception $e) {

            return response()->json(['status' => 'No autorizado'.$e->getMessage()], 401);   
            
        } 
        return $next($request);
    
    }
}
