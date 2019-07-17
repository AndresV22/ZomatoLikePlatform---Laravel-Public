<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\Comment;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $place = Place::all();
        return $place;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $possible_user = User::find($request->get('user_id'));
        if ($possible_user != null)
        {
            $place = new Place([
                'user_id' => $request->get('user_id'),
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'opening_time' => $request->get('opening_time'),
                'closing_time' => $request->get('closing_time'),
                'average_value' => $request->get('average_value')
            ]);
            $place->save();
            return "Created successfully!";
        }
        else
        {
            return "Could not create new restaurant.";
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
        $place = Place::find($id);
        $comments = Comment::all();
        return view('place', compact('comments', 'place'));
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
        $place = Place::find($id);
        $place->update($data);
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
        $place = Place::find($id);
        $place->delete();
        return "Deleted successfully!";
    }
}
