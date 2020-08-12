<?php

namespace App\Providers;

use App\Services\SpiderService;
use Illuminate\Support\ServiceProvider;

class SpiderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SpiderService::class,function ($app){
            return new SpiderService();
        });
        $this->app->alias(SpiderService::class,'spider');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
