<?php

namespace App\Http\Controllers;
use App\Dish;
use App\Place;

use Illuminate\Http\Request;

class SubmitDishController extends Controller
{

  public function show()
  {
      $places = Place::all();
      $dishes = Dish::all();
      return view('submitDish', compact('places','dishes'));
  }


  public function store(Request $request)
  {
    $possible_place = Place::find($request->get('place_id'));
    if ($possible_place != null)
    {
      $dish = new Dish([
        'place_id' => $request->get('place_id'),
        'purchase_id' => null,
        'menu_id' => null,
        'name' => $request->get('name'),
        'price' => $request->get('price'),
        'description' => $request->get('description'),
        'category' => $request->get('category'),
        'discount' => $request->get('discount')
    ]);
    $dish->save();
    return back()->with('success', 'Dish added successfully.');
    }
    else
    {
      return back()->with('error', 'Could not create a dish, please add a place before submiting.');
    }

}
}
