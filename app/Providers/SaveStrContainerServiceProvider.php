<?php

namespace App\Providers;

use App\Helpers\SaveToFile;
use App\Helpers\SaveToLog;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

/**
 * Регестрирует реализаторов интерфейса SaveStrFacade в зависимости от среды разработки.
 * Class SaveStrContainerServiceProvider
 * @package App\Providers
 */
class SaveStrContainerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Helpers\Contracts\SaveStr', function () {
            if (App::environment('local')) {
                return new SaveToFile();
            }

            if (App::environment('production')) {
                return new SaveToLog();
            }
        });
    }
}
