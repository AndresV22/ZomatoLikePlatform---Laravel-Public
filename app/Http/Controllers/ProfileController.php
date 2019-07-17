<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Place;
use App\UserRegister;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $comments = Comment::all();
        $places = Place::all();
        $user_registers = UserRegister::all();
        return view('profile', compact('comments', 'places', 'user_registers'));
    }
}
