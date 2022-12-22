<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ContactRepository;
use App\Repositories\ContactRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


       //$this->app->register(RepositoryServiceProvider::class);

        $this->app->bind(
            'App\Repositories\ContactRepositoryInterface',
            'App\Repositories\ContactRepository'
           //ContactRepositoryInterface::class,
           //ContactRepository::class
        );

        $this->app->bind(
            'App\Repositories\CountryrepInterface',
            'App\Repositories\Countryrep'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
