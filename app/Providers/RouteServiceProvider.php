<?php 
namespace App\Providers;

use App\Abstraction\ServiceProviders;
use App\Utilities\Route;
use Bootstrap\Application;

class RouteServiceProvider extends ServiceProviders
{
    public function boot()
    {
        $this->handleRoute();
    }

    private function handleRoute(){
        // Initialize the Route Class with routes array
        $route = new Route();

        include_once Application::$rootPath . '/routes/routes.php';

        try {
            echo $route->dispatchRoute();
        } catch (\Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
        // Dispatch the route

    }
}