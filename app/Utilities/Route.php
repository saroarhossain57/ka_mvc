<?php

namespace App\Utilities;

class Route
{
    protected array $routes = [];
    // Handle get routes
    public function get($uri, $callback){
        $this->routes['get'][$uri] = $callback;
    }

    // Handle post routes
    public function post($uri, $callback){

    }

    // Handle put routes
    public function put($uri, $callback){

    }

    // Handle put routes
    public function delete($uri, $callback){

    }

    // Dispatch the route
    public function dispatchRoute(){
        echo "<pre>";
        echo var_dump($this->routes);
        echo "<pre>";
    }

}