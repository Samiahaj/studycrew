<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    

/**
 * Controleert of de gebruiker
 * admin rechten heeft.
 *
 * Indien de gebruiker geen admin is,
 * wordt de toegang geweigerd.
 */
    public function handle(Request $request, Closure $next): Response
    {
        /**
 * Controleert of de gebruiker
 * ingelogd is en admin rechten heeft.
 *
 * Indien niet, wordt een
 * 403 Forbidden foutmelding getoond.
 */
         if (!auth()->check() || auth()->user()->role !== 'admin') {

        abort(403);
    }
    
        return $next($request);
    }
}
