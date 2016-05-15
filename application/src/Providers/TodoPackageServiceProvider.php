<?php

/**
 * An example Service Provider for the package.
 * Feel free to add more service providers as per your requirement.
 * 
 * @author Neelkanth Kaushik
 * @since 1.0.0
 */

namespace TodoPackage\Application\Providers;

use Illuminate\Support\ServiceProvider;

class TodoPackageServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind(
                'TodoPackage\Application\Interfaces\TodoInterface', 'TodoPackage\Application\Repositories\TodoRepository'
        );
    }

    public function boot() {

        //Publishes the configuration file to the application's config directory
        $this->publishes([
            __DIR__ . '/../config/todopackage_config.php' => config_path('todopackage_config.php'),
        ]);

        //Load the routes.php file of the package present inside the src/Http Folder
        require __DIR__ . '/../Http/routes.php';

        //Loading views"
        $this->loadViewsFrom(__DIR__ . '/../resources/views/todopackage', 'todopackage');

        //Publish views and assets
        $this->publishes([
            __DIR__ . '/../resources/views/todopackage' => base_path('resources/views/vendor/todopackage'),
            __DIR__ . '/../resources/assets' => base_path('public/vendor/todopackage'),
        ]);

        //Adding the custom middleware to the application's IoC container
        $this->app['router'];
        $this->app['router']->middleware('todopackage_auth', 'TodoPackage\Application\Http\Middlewares\TodoAuthMiddleware');
        $this->app['router']->middleware('todopackage_install', 'TodoPackage\Application\Http\Middlewares\TodoPackageInstallMiddleware');
    }

}
