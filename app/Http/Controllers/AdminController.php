<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Place;
use App\Comment;
use App\Country;

class AdminController extends Controller
{
    public function show()
    {
        $comments = Comment::all();
        $countries = Country::all();
        $places = Place::all();
        $users = User::all();
        return view('admin', compact('places', 'users', 'comments', 'countries'));
    }
}
