<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Vite;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        // Generate a per-request nonce for CSP — eliminates unsafe-inline for scripts
        $nonce = base64_encode(random_bytes(16));
        app()->instance('csp-nonce', $nonce);

        // Tell Vite to embed the nonce in its generated <script> tags
        app(Vite::class)->useCspNonce($nonce);

        $response = $next($request);

        $isProduction = config('app.env') === 'production' && !config('app.debug');

        // ── Fetch / framing / sniffing ────────────────────────────────────────
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
        $response->headers->set('X-XSS-Protection', '0'); // Obsolete; rely on CSP instead

        // ── Transport ─────────────────────────────────────────────────────────
        if ($isProduction) {
            $response->headers->set('Strict-Transport-Security', 'max-age=63072000; includeSubDomains; preload');
        }

        // ── Privacy / referrer ────────────────────────────────────────────────
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // ── Feature policy ────────────────────────────────────────────────────
        $response->headers->set(
            'Permissions-Policy',
            'accelerometer=(), ambient-light-sensor=(), autoplay=(), battery=(), camera=(), ' .
            'cross-origin-isolated=(), display-capture=(), document-domain=(), ' .
            'encrypted-media=(), execution-while-not-rendered=(), execution-while-out-of-viewport=(), ' .
            'fullscreen=(self), geolocation=(), gyroscope=(), keyboard-map=(), magnetometer=(), ' .
            'microphone=(), midi=(), navigation-override=(), payment=(), picture-in-picture=(), ' .
            'publickey-credentials-get=(), screen-wake-lock=(), sync-xhr=(), usb=(), web-share=(), xr-spatial-tracking=()'
        );

        // ── Cross-origin isolation ────────────────────────────────────────────
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin-allow-popups');
        $response->headers->set('Cross-Origin-Resource-Policy', 'same-origin');
        // COEP: require-corp is too strict for pages that load third-party images (og-image CDNs etc.)

        // ── Content Security Policy ───────────────────────────────────────────
        $csp = $this->buildCsp($nonce, $isProduction);
        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }

    private function buildCsp(string $nonce, bool $isProduction): string
    {
        // Vite dev server origins (only in local dev)
        $viteOrigins = '';
        if (!$isProduction) {
            $viteOrigins = ' http://localhost:5173 http://127.0.0.1:5173 http://localhost:5174 http://127.0.0.1:5174 ws://localhost:5173 ws://127.0.0.1:5173';
        }

        // Alpine.js needs unsafe-eval (uses Function() internally); scripts come from Vite bundle
        $directives = [
            // Nonce replaces unsafe-inline — only nonce-bearing scripts execute
            "script-src 'self' 'nonce-{$nonce}' 'unsafe-eval' https://www.googletagmanager.com https://cdn.jsdelivr.net{$viteOrigins}",

            // Styles: unsafe-inline kept because Tailwind emits inline style attributes on elements
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net{$viteOrigins}",

            "default-src 'self'",
            "font-src 'self' https://fonts.gstatic.com",
            "img-src 'self' data: https:",
            "connect-src 'self' https://www.google-analytics.com https://www.googletagmanager.com{$viteOrigins}",
            "frame-src 'none'",
            "frame-ancestors 'none'",
            "object-src 'none'",
            "base-uri 'self'",
            "form-action 'self'",
            "worker-src 'none'",
            "manifest-src 'self'",
            "media-src 'none'",
        ];

        if ($isProduction) {
            $directives[] = 'upgrade-insecure-requests';
        }

        return implode('; ', $directives);
    }
}
