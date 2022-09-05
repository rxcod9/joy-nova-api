<?php

declare(strict_types=1);

namespace Joy\NovaApi;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Joy\NovaApi\Console\Commands;

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
class NovaApiServiceProvider extends ServiceProvider
{
    /**
     * Boot
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublishables();

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'joy-nova-api');

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'joy-nova-api');
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../routes/web.php');
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix(config('joy-nova-api.route_prefix', 'api'))
            ->middleware('api')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/nova-api.php', 'joy-nova-api');

        $this->registerCommands();
    }

    /**
     * Register publishables.
     *
     * @return void
     */
    protected function registerPublishables(): void
    {
        $this->publishes([
            __DIR__ . '/../config/nova-api.php' => config_path('joy-nova-api.php'),
            __DIR__ . '/../config/l5-swagger.php'  => config_path('l5-swagger.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/joy-nova-api'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/joy-nova-api'),
        ], 'translations');
    }

    protected function registerCommands(): void
    {
        $this->commands(Commands\GenerateDocsCommand::class);
    }
}
