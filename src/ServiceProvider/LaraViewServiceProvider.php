<?php
namespace LaraView\ServiceProvider;

use Laracasts\Flash\FlashServiceProvider;
use LaraLink\ServiceProvider\LaraLinkServiceProvider;
use LaraSupport\LaraServiceProvider;
use LaraView\Console\Commands\DownloadTheme;
use LaraView\Helpers\LaraView;
use ZanySoft\Zip\Zip;

class LaraViewServiceProvider extends LaraServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        $this->mergeConfig(__DIR__);
        $this->loadViews(__DIR__);
        $this->runningInConsole(DownloadTheme::class);
    }

    /**
     *
     */
    public function register()
    {
        $this->registerFunctions(__DIR__);
        $this->registerAliases(['LaraView' => LaraView::class]);
        $this->registerProviders([
            LaraLinkServiceProvider::class,
            FlashServiceProvider::class,
        ]);
    }
}
