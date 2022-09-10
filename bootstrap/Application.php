<?php
namespace Bootstrap;

use App\Classes\Database;
use App\Http\Request;
use App\Http\Response;
use App\Providers\RouteServiceProvider;
use App\Providers\AppServiceProvider;
use Symfony\Component\Dotenv\Dotenv;

class Application {

    private static $instance;
    public static Application $app;
    public static $rootPath;
    public Request $request;
    public Response $response;
    public Database $database;

    public function __construct() {
        self::$app = $this;
        self::$rootPath = dirname(__DIR__);

        // Load Env
        $this->loadEnv();

        $this->request = new Request();
        $this->response = new Response();
        $this->database = new Database();
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

    private function loadEnv(){
        $dotenv = new Dotenv();
        $dotenv->load(Application::$rootPath . DIRECTORY_SEPARATOR . '.env');
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Application();
        }

        return self::$instance;
    }
}