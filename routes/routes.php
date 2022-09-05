<?php

use App\Utilities\Route;
use \App\Controllers\PagesController;

/** @var Route $route */

$route->get('/', function (){
    return 'Welcome';
});

$route->get('/home', [PagesController::class, 'index']);

$route->get('/product/shirt', [PagesController::class, 'productShirt']);

$route->get('/post/{id}/bottom', [PagesController::class, 'productWithIdBottom']);

$route->get('/post/{id}', [PagesController::class, 'productWithId']);

$route->get('/home/limon/tumpa', [PagesController::class, 'tumpaLimon']);

$route->post('/contact', [PagesController::class, 'contact']);