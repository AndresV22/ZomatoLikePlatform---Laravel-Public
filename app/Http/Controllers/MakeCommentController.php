<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class MakeCommentController extends Controller
{
    public function show($id)
    {
        $place = Place::find($id);
        return view('comment', compact('place'));
    }
}
