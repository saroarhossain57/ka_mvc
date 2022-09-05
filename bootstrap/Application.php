<?php
namespace Bootstrap;

use App\Http\Request;
use App\Http\Response;
use App\Providers\RouteServiceProvider;
use App\Providers\AppServiceProvider;

class Application {

    private static $instance;
    public static Application $app;
    public static $rootPath;
    public Request $request;
    public Response $response;

    public function __construct() {
        self::$app = $this;
        self::$rootPath = dirname(__DIR__);

        $this->request = new Request();
        $this->response = new Response();
    }

    // Run the application
    public function run(){

        // List of service providers
        $serviceProviders = [
            AppServiceProvider::class,
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