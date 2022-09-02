<?php
use Bootstrap;

class Application {

    private static $instance;
    public static Application $app;
    public static $rootPath;

    public function __construct($rootPath) {
        self::$app = $this;
        self::$rootPath = $rootPath;
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Application();
        }

        return self::$instance;
    }
}