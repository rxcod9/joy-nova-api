<?php

declare(strict_types=1);

namespace Joy\NovaApi;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Joy\NovaApi\Http\Resources\Json;
use Joy\NovaApi\Http\Resources\JsonCollection;

/**
 * Class NovaApiServiceProvider
 *
 * @category  Package
 * @package   JoyNovaApi
 * @author    Ramakant Gangwar <gangwar.ramakant@gmail.com>
 * @copyright 2021 Copyright (c) Ramakant Gangwar (https://github.com/rxcod9)
 * @license   http://github.com/rxcod9/joy-nova-api/blob/main/LICENSE New BSD License
 * @link      https://github.com/rxcod9/joy-nova-api
 */
class ResourcesServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('joy-nova-api.json', function ($app) {
            return new Json(null);
        });

        $this->app->bind('joy-nova-api.json-collection', function ($app) {
            return new JsonCollection([]);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['joy-nova-api.json', 'joy-nova-api.json-collection'];
    }
}
