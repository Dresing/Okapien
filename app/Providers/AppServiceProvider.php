<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Okapien\Conditionals\PrivilegeConditional;
use App\Okapien\StringFunctions\PrivilegeLookup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('privilege', function ($app) {
            return new PrivilegeConditional(new PrivilegeLookup());
        });        
    }
}
