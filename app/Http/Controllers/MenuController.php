<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Place;
use App\Purchase;
use App\Dish;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menu = Menu::all();
      return $menu;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $possible_place = Place::find($request->get('place_id'));
      $possible_purchase = Purchase::find($request->get('purchase_id'));
      if ($possible_place != null && $possible_purchase != null)
      {
        $menu = new Menu([
          'place_id' => $request->get('place_id'),
          'purchase_id' => $request->get('purchase_id'),
          'name' => $request->get('name'),
          'price' => $request->get('price'),
          'category' => $request->get('category'),
          'discount' => $request->get('discount')
        ]);
        $menu->save();
        return "Created successfully!";
      }
      else if ($possible_purchase == null && $possible_place != null)
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
        return "Created successfully!";
      }
      else
      {
        return "Could not create new menu.";
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show()
     {
         $places = Place::all();
         $dishes = Dish::all();
         return view('submitMenu', compact('places', 'dishes'))->with('warning', 'When you create a menu, it shows in all the places you have.');
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
      $menu = Menu::find($id);
      $menu->update($data);
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
      $menu = Menu::find($id);
      $menu->delete();
      return "Deleted successfully!";
    }

    public function submitMenu(Request $request)
    {
      $possible_place = Place::find($request->get('place_id'));
      $possible_purchase = Purchase::find($request->get('purchase_id'));
      if ($possible_purchase == null && $possible_place != null)
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
        return view('profile')->with('success','Added menu successfully.');
      }
      else
      {
        return view('profile')->with('error', 'Could not create menu. Please verify input.');
      }
    }
}
