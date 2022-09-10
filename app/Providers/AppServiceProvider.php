<?php

namespace App\Providers;

use App\Abstraction\ServiceProviders;
use Bootstrap\Application;
use Symfony\Component\Dotenv\Dotenv;

class AppServiceProvider extends ServiceProviders
{
    public function boot()
    {
        // Load Env
        $this->loadEnv();
    }

    private function loadEnv(){
        $dotenv = new Dotenv();
        $dotenv->load(Application::$rootPath . DIRECTORY_SEPARATOR . '.env');
    }
}