<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuDish;

class MenuDishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menuDish = MenuDish::all();
      return $menuDish;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $menuDish = new MenuDish([
          'menus_id' => $request->get('menus_id'),
          'dishes_id' => $request->get('dishes_id')
      ]);
      $menuDish->save();
      return "Created successfully!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return MenuDish::find($id);
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
      $menuDish = MenuDish::find($id);
      $menuDish->update($data);
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
      $menuDish = MenuDish::find($id);
      $menuDish->delete();
      return "Deleted successfully!";
    }
}
