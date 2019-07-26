<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;

class WelcomeController extends Controller
{
    public function show()
    {
        if(!Session::has('cart')){
            return view('welcome');
        }
        $items = Session::get('cart');
        $items->myDeleteAll();
        Session::remove('cart');
        return view('welcome');
    }
}
