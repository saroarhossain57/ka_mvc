<?php

namespace App\Providers;

use App\Abstraction\ServiceProviders;

class AppServiceProvider extends ServiceProviders
{
    public function boot()
    {
        echo "<pre>";
        echo var_dump(class_exists(AppServiceProvider::class));
        echo "<pre>";
    }
}