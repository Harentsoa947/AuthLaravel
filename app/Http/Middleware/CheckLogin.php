<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $isLogged = false;
        // if(!$isLogged){
        //     return response("Accés refusé par middleware");
        // }

        if(!Auth::check()){
            return response("Non connecté");
        }

        return $next($request);
    }
}
