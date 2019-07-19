<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Place;
use App\Purchase;

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
    public function show($id)
    {
        return Menu::find($id);
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
}
