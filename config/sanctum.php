<?php

use Laravel\Sanctum\Sanctum;

return [

    /*
    |--------------------------------------------------------------------------
    | Stateful Domains
    |--------------------------------------------------------------------------
    |
    | Requests from the following domains / hosts will receive stateful API
    | authentication cookies. Typically, these should include your local
    | and production domains which access your API via a frontend SPA.
    |
    */

    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
        '%s%s',
        'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
        Sanctum::currentApplicationUrlWithPort()
    ))),

    /*
    |--------------------------------------------------------------------------
    | Sanctum Guards
    |--------------------------------------------------------------------------
    |
    | This array contains the authentication guards that will be checked when
    | Sanctum is trying to authenticate a request. If none of these guards
    | are able to authenticate the request, Sanctum will use the bearer
    | token that's present on an incoming request for authentication.
    |
    */

    'guard' => ['web', 'api'],

    /*
    |--------------------------------------------------------------------------
    | Expiration Minutes
    |--------------------------------------------------------------------------
    |
    | This value controls the number of minutes until an issued token will be
    | considered expired. If this value is null, personal access tokens do
    | not expire. This won't tweak the lifetime of first-party sessions.
    |
    */

    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Sanctum Middleware
    |--------------------------------------------------------------------------
    |
    | When authenticating your first-party SPA with Sanctum you may need to
    | customize some of the middleware Sanctum uses while processing the
    | request. You may change the middleware listed below as required.
    |
    */

    'middleware' => [
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => App\Http\Middleware\EncryptCookies::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Sanctum Prefix
    |--------------------------------------------------------------------------
    |
    | Here you may specify which prefix should be used when Sanctum routes
    | are registered. By default, the prefix is empty. You may customize
    | this as needed to match the routes used by your application.
    |
    */

    'prefix' => 'sanctum',

    /*
    |--------------------------------------------------------------------------
    | Sanctum Storage Driver
    |--------------------------------------------------------------------------
    |
    | Here you may specify the storage driver that should be used by Sanctum
    | to manage personal access tokens. This configuration allows you to
    | customize how tokens are stored and managed by Sanctum.
    |
    */

    'storage_driver' => 'database',

    /*
    |--------------------------------------------------------------------------
    | Allowed Domains
    |--------------------------------------------------------------------------
    |
    | This array contains the domains that are allowed to use Sanctum for
    | stateful authentication. You can specify which domains are allowed
    | to access your API and manage authentication using Sanctum.
    |
    */

    'allowed_domains' => explode(',', env('SANCTUM_ALLOWED_DOMAINS', '')),

    /*
    |--------------------------------------------------------------------------
    | Add Request Attributes
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify whether Sanctum should add additional
    | attributes to the request when processing the authentication. You may
    | customize this behavior to fit the needs of your application.
    |
    */

    'add_request_attributes' => true,
];
