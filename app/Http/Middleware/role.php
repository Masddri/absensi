<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (auth()->check()) {
        //     if (auth()->user()->role == 1) {
        //         return $next($request);
        //     } else {
        //         return to_route('karyawan');
        //     }
        // }
        if (Auth::user()->role) {
            return $next($request);
           }

           return abort(403);
    }
}
