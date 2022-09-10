<?php
use \eftec\bladeone\BladeOne;
use Bootstrap\Application;

function view($view, $data = []){
    // render and return the view
    $views = Application::$app::$rootPath . DIRECTORY_SEPARATOR . 'resourses' . DIRECTORY_SEPARATOR . 'views';
    $cache = Application::$app::$rootPath . DIRECTORY_SEPARATOR . 'resourses' . DIRECTORY_SEPARATOR . 'cache';
    $blade = new BladeOne($views,$cache,BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
    return $blade->run($view, $data); // it calls /views/hello.blade.php
}