<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;

class WelcomeController extends Controller
{
    public function show()
    {
        return view('welcome');
    }
}
