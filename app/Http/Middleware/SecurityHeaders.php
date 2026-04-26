<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=()');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');

        $cspList = [
            "default-src 'self'",
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://www.google.com https://www.gstatic.com https://www.googletagmanager.com https://cdn.jsdelivr.net",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net",
            "font-src 'self' https://fonts.gstatic.com data:",
            "img-src 'self' data: https: blob:",
            "connect-src 'self' https://www.google-analytics.com",
            "frame-src https://www.google.com",
            "object-src 'none'",
            "base-uri 'self'",
            "form-action 'self'",
        ];

        // Allow Vite dev server and Alpine.js (unsafe-eval) in local development
        if (config('app.env') !== 'production' || config('app.debug')) {
            $cspList[1] .= " 'unsafe-eval' http://localhost:5173 http://127.0.0.1:5173 http://localhost:5174 http://127.0.0.1:5174"; // script-src
            $cspList[2] .= " http://localhost:5173 http://127.0.0.1:5173 http://localhost:5174 http://127.0.0.1:5174"; // style-src
            $cspList[5] .= " ws://localhost:5173 ws://127.0.0.1:5173 ws://localhost:5174 ws://127.0.0.1:5174 http://localhost:5173 http://127.0.0.1:5173 http://localhost:5174 http://127.0.0.1:5174"; // connect-src
        }

        $csp = implode('; ', $cspList);
        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
