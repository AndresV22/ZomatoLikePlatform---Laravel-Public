<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Place;
use App\User;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::all();
        return $comment;
        //
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
            return back()->with('success',' Comentario agregado correctamente. ');
        }
        else
        {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $comment = Comment::find($id);
        $comment->update($data);
        return "Updated successfully!";
    }

    public function destroy($id)
    {
        $city = Comment::find($id);
        $city->delete();
        return "Deleted successfully!";
    }
}
