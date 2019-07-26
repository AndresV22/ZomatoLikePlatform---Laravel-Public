<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Place;
use App\Purchase;
use App\Dish;

class SubmitMenuController extends Controller
{

  public function show()
  {
      $places = Place::all();
      $dishes = Dish::all();
      return view('submitMenu', compact('places','dishes'));
  }


  public function store(Request $request)
  {
    $possible_place = Place::find($request->get('place_id'));
    if ($possible_place != null)
    {
      $menu = new Menu([
        'place_id' => $request->get('place_id'),
        'purchase_id' => null,
        'name' => $request->get('name'),
        'price' => $request->get('price'),
        'category' => $request->get('category'),
        'discount' => $request->get('discount')
      ]);
      $menu->save();
      return back()->with('success','Added menu successfully.');
    }
    else
    {
      return back()->with('error', 'Could not create menu. Please add a place before submiting.');
    }
  }
}
