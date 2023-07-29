<?php

namespace ConfrariaWeb\Property\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class PropertyServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__ . '/../../databases/Migrations');

    }

    public function register()
    {

    }

}
