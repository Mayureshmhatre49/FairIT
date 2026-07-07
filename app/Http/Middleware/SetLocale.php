<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $supported = ['en', 'de', 'fr', 'es', 'ar'];

        $locale = $request->query('lang');
        if ($locale && in_array($locale, $supported)) {
            session(['locale' => $locale]);
        } else {
            $locale = session('locale', config('app.locale'));
        }

        if (! in_array($locale, $supported)) {
            $locale = 'en';
        }
        app()->setLocale($locale);

        return $next($request);
    }
}
