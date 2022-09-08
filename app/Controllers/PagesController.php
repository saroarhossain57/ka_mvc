<?php

namespace App\Controllers;

use App\Abstraction\Controller;
use App\Http\Request;
use App\Http\Response;

class PagesController extends Controller
{
    public function index()
    {
        return 'Hello From Page Controller Index method';
    }

    public function productShirt()
    {
        return 'Hello From Page Controller productShirt method';
    }

    public function productWithId()
    {
        return 'Hello From Page Controller ProductWithId method';
    }

    public function productWithIdBottom($id, Request $request, Response $response)
    {
        return 'Hello From Page Controller productWithIdBottom method';
    }

    public function contact()
    {
        return 'Hello From Page Controller Contact method';
    }

    public function tumpaLimon()
    {
        return 'Hello From Page Controller tumpaLimon method';
    }
}