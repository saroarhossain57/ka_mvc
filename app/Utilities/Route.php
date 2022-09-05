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

        // Return 404 page if there is no route found
        if(!$callback){
            return '404 page';
        }

        // Execute function from route file
        if(is_callable($callback)){
            return $callback();
        }

        // Execute the method from controller function
        if(is_array($callback)){
            if(isset($callback['route'])){
                $routeCallbackObj = new $callback['route'][0];
                $routeCallbackMethod = $callback['route'][1];
            } else {
                $routeCallbackObj = new $callback[0];
                $routeCallbackMethod = $callback[1];
            }

            if(isset($callback['params'])){
                return call_user_func_array([$routeCallbackObj, $routeCallbackMethod], array());
            } else {
                return call_user_func_array([$routeCallbackObj, $routeCallbackMethod], array());
            }
        }

        return false;
    }

    private function getMatchedCallback($path, $method){

        // Check if there any routes by the given path and method
        if(isset($this->routes[$method]) && !empty($this->routes[$method])){

            foreach ($this->routes[$method] as $key => $route){

                $is_correct_route = false;

                // Find the route
                if($this->get_path_count($path) === $this->get_path_count($key)){
                    // Check if there any dynamic parameters in the path
                    $is_correct_route = true;
                    // If there is dynamic parameter in the $key
                    if(preg_match('/\{\w+\}/', $key)){

                        $keys_array = explode('/', ltrim($key, '/'));
                        $paths_array = explode('/', ltrim($path, '/'));
                        $query_params = [];
                        foreach ($keys_array as $index => $item){
                            // Check if it is dynamic param
                            if($item[0] == '{' && $item[strlen($item) - 1] == '}') {
                                $query_params[substr($item, 1, -1)] = $paths_array[$index];
                            } else {
                                if($item !== $paths_array[$index]){
                                    $is_correct_route = false;
                                }
                            }
                        }

                        if($is_correct_route){
                            return [
                                'route' => $route,
                                'params' => $query_params
                            ];
                        }

                    } else {
                        // There is no dynamic parameter
                        if($path === $key){
                            return $route;
                        }
                    }
                }
            }

        }

        return false;
    }

    private function get_path_count($path): int {
        return count(explode('/', ltrim($path, '/')));
    }

}