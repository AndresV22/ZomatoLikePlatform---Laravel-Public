<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Dish;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredient = Ingredient::all();
        return $ingredient;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $possible_dish = Dish::find($request->get('dish_id'));
      if ($possible_dish != null)
      {
        $ingredient = new Ingredient([
          'dish_id' => $request->get('dish_id'),
          'name' => $request->get('name'),
          'type' => $request->get('type'),
          'category' => $request->get('category')
        ]);
      $ingredient->save();
      return "Created successfully!";
      }
      else
      {
        return "Could not create new ingredient.";
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
        return Ingredient::find($id);
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
      $ingredient = Ingredient::find($id);
      $ingredient->update($data);
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
      $ingredient = Ingredient::find($id);
      $ingredient->delete();
      return "Deleted successfully!";
    }
}
