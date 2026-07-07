<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cloudflare Turnstile
    |--------------------------------------------------------------------------
    |
    | Get a site key + secret at https://dash.cloudflare.com → Turnstile.
    | With no keys set, App\Rules\Turnstile fails open so local dev keeps
    | working; the <x-turnstile /> component renders nothing.
    |
    | Cloudflare's public test keys (safe local defaults, always pass):
    |   TURNSTILE_SITE_KEY=1x00000000000000000000AA
    |   TURNSTILE_SECRET_KEY=1x0000000000000000000000000000000AA
    |
    */

    'turnstile' => [
        'site_key' => env('TURNSTILE_SITE_KEY'),
        'secret'   => env('TURNSTILE_SECRET_KEY'),
    ],

];
