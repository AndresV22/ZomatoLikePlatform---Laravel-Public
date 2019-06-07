<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Place;
use App\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::all();
        return $comment;
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $possible_place = Place::find($request->get('places_id'));
        $possible_user = User::find($request->get('users_id'));
        if ($possible_user != null && $possible_place != null)
        {
            $comment = new Comment([
                'places_id' => $request->get('places_id'),
                'users_id' => $request->get('users_id'),
                'content' => $request->get('content'),
                'value' => $request->get('value')
            ]);
            $comment->save();
            return "Created successfully!";
        }
        else
        {
            return "Could not create new comment.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Comment::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $comment = Comment::find($id);
        $comment->update($data);
        return "Updated successfully!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Comment::find($id);
        $city->delete();
        return "Deleted successfully!";
    }
}
