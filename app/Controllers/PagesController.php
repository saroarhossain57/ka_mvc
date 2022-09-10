<?php

namespace App\Controllers;

use App\Abstraction\Controller;
use App\Http\Request;
use App\Http\Response;
use App\Models\Contact;

class PagesController extends Controller
{
    public function index()
    {
        return view('hello', ['variable1', 'Saroar Hossain']);
    }

    public function productShirt()
    {
        return view('product.tshirt');
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
        $contact = new Contact();
        $contact->save();

        return 'Hello From Page Controller Contact method';
    }

    public function tumpaLimon()
    {
        return 'Hello From Page Controller tumpaLimon method';
    }
}