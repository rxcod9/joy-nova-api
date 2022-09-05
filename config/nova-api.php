<?php

return [

    /*
     * The config_key for nova-api package.
     */
    'config_key' => env('NOVA_API_CONFIG_KEY', 'joy-nova-api'),

    /*
     * The route_prefix for nova-api package.
     */
    'route_prefix' => env('NOVA_API_ROUTE_PREFIX', 'api'),

    /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify nova controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Joy\\NovaApi\\Http\\Controllers',
    ],

    /*
    |--------------------------------------------------------------------------
    | Guard config
    |--------------------------------------------------------------------------
    |
    | Here you can specify nova api guard
    |
    */

    'guard' =>  env('NOVA_API_GUARD', 'api'),
];
