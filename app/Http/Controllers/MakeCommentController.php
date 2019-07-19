<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Place;
use App\Comment;

class MakeCommentController extends Controller
{
    public function show($id)
    {
        $comments = Comment::all();
        $place = Place::find($id);
        return view('comment', compact('place', 'comments'));
    }

    public function store(Request $request)
    {
        $possible_place = Place::find($request->get('place_id'));
        $possible_user = User::find($request->get('user_id'));
        if ($possible_user != null && $possible_place != null)
        {
            $comment = new Comment([
                'place_id' => $request->get('place_id'),
                'user_id' => $request->get('user_id'),
                'content' => $request->get('content'),
                'value' => $request->get('value')
            ]);
            $comment->save();
            return back();
        }
        else
        {
            return back();;
        }
    }
}
