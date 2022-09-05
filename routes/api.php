<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Nova API Routes
|--------------------------------------------------------------------------
|
| This file is where you may override any of the routes that are included
| with NovaApi.
|
*/

Route::group(['as' => 'joy-nova-api.'], function () {

    $namespacePrefix = '\\' . config('joy-nova-api.controllers.namespace') . '\\';

    Route::group(['middleware' => 'auth:api'], function () use ($namespacePrefix) {
        //
    });
});
