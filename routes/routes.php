<?php

use App\Utilities\Route;
use \App\Controllers\PagesController;

/** @var Route $route */

$route->get('/', function (){
    return view('hello', ['variable1' => 'Saroar Hossain']);
});

$route->get('/home', [PagesController::class, 'index']);

$route->get('/product/shirt', [PagesController::class, 'productShirt']);

$route->get('/post/{id}/bottom', [PagesController::class, 'productWithIdBottom']);

$route->get('/post/{id}', [PagesController::class, 'productWithId']);

$route->get('/home/limon/tumpa', [PagesController::class, 'tumpaLimon']);

$route->get('/contact', [PagesController::class, 'contact']);
$route->post('/contact', [PagesController::class, 'contact']);