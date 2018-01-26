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

        $configPath = __DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR
            .'config' . DIRECTORY_SEPARATOR . 'lara_view.php';
        $this->mergeConfigFrom($configPath, 'lara_view');

        $path = __DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR
            .'resources' . DIRECTORY_SEPARATOR . 'views.php';

        $this->loadViewsFrom($path, 'lara-view');

        $this->publishes([
            $path => resource_path('views' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'lara-view'),
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
        require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions.php');
    }
}
