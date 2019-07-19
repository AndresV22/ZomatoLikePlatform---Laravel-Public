<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Place;
use App\Comment;
use App\Reservation;

class MakeCommentController extends Controller
{
    public function show($id)
    {
        $place = Place::find($id);
        return view('comment', compact('place'));
    }
}
