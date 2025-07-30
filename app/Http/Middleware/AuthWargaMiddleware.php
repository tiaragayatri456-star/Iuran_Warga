<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthWargaMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->level == 'Warga') {
                return $next($request);
            } else {
                return redirect()->route('login')->with('pesan', 'Access denied. You are not Warga.');
            }
        }

        return redirect('/login');
    }
}
