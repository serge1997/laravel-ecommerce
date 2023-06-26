<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        try {

            if(!Auth::user()->adm == 1) {

                return redirect()->route('inicio');
            }

        }catch(\Exception $e) {
            return redirect()->route('inicio');
        }

        return $next($request);
    }
}
