<?php

namespace App\Utilities;

use App\Http\Request;
use App\Http\Response;
use Bootstrap\Application;

class Route
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(){
        $this->request = Application::$app->request;
        $this->response = Application::$app->response;
    }

    // Handle get routes
    public function get($uri, $callback){
        $this->routes['get'][$uri] = $callback;
    }

    // Handle post routes
    public function post($uri, $callback){
        $this->routes['post'][$uri] = $callback;
    }

    // Dispatch the route
    public function dispatchRoute(){

        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->getMatchedCallback($path, $method);

        echo "<pre>";
        echo var_dump($path);
        echo var_dump($method);
        echo var_dump($this->routes);
        echo "<pre>";
    }

    private function getMatchedCallback($path, $method){

        // Check if there any routes by the given path and method
        if(isset($this->routes[$method]) && !empty($this->routes[$method])){

            foreach ($this->routes[$method] as $key => $route){
                // Find the route
                if($this->get_path_count($path) === $this->get_path_count($key)){
                    // Check if there any dynamic parameters in the path
                    
                }
            }

        }

        return false;
    }

    private function get_path_count($path): int {
        return count(explode('/', ltrim($path, '/')));
    }

}