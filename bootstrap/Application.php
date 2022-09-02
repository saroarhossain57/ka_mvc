<?php
namespace Bootstrap;

use App\Providers\RouteServiceProvider;

class Application {

    private static $instance;
    public static Application $app;
    public static $rootPath;

    public function __construct() {
        self::$app = $this;
        self::$rootPath = dirname(__DIR__);
    }

    // Run the application
    public function run(){

        // List of service providers
        $serviceProviders = [
            RouteServiceProvider::class
        ];

        // Run all listed service providers
        foreach ($serviceProviders as $serviceProvider){
            $serviceInstance = new $serviceProvider();
            $serviceInstance->boot();
        }
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Application();
        }

        return self::$instance;
    }
}