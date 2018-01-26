<?php
namespace LaraView\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use LaraView\Console\Commands\DownloadTheme;

class LaraViewServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../../config/lara_view.php';
        $this->mergeConfigFrom($configPath, 'lara_view');


        $path = __DIR__.'/../../resources/views';
        $this->loadViewsFrom($path, 'lara-view');

        $this->publishes([
            $path => resource_path('views/vendor/lara-view'),
            $configPath => config_path('lara_view.php')
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                DownloadTheme::class,
            ]);
        }
    }

    public function register()
    {
        // TODO check it need
        require_once(__DIR__ . '/../functions.php');
    }
}
