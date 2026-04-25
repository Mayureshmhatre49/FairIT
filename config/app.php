<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [
    'name'              => env('APP_NAME', 'FairIT Solutions'),
    'env'               => env('APP_ENV', 'production'),
    'debug'             => (bool) env('APP_DEBUG', false),
    'url'               => env('APP_URL', 'https://fairitsolutions.ch'),
    'asset_url'         => env('ASSET_URL'),
    'timezone'          => env('APP_TIMEZONE', 'UTC'),
    'locale'            => env('APP_LOCALE', 'en'),
    'fallback_locale'   => env('APP_FALLBACK_LOCALE', 'en'),
    'faker_locale'      => env('APP_FAKER_LOCALE', 'en_US'),
    'key'               => env('APP_KEY'),
    'cipher'            => 'AES-256-CBC',
    'maintenance'       => ['driver' => 'file'],
    'providers'         => ServiceProvider::defaultProviders()->toArray(),
    'aliases'           => Facade::defaultAliases()->toArray(),
];
