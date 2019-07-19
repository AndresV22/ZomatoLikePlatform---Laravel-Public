<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\Comment;
use App\Table;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return $places;
    }
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
                'average_value' => $request->get('average_value'),
                'avatar' => $request->get('avatar')
            ]);
            $place->save();
            return "Created successfully!";
        }
        else
        {
            return "Could not create new restaurant.";
        }
    }
    public function show($id)
    {
        $place = Place::find($id);
        $comments = Comment::where('place_id', $id)->get();
        $users = User::all();
        $tables = Table::where('place_id', $id)->get();
        return view('place', compact('comments', 'place', 'users', 'tables'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $place = Place::find($id);
        $place->update($data);
        return "Updated successfully!";
    }
}
