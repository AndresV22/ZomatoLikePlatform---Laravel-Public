<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Purchase;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dish = Dish::all();
      return $dish;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $possible_purchase = Purchase::find($request->get('purchase_id'));
      if ($possible_purchase != null)
      {
        $dish = new Dish([
          'place_id' => $request->get('place_id'),
          'purchase_id' => $request->get('purchase_id'),
          'name' => $request->get('name'),
          'price' => $request->get('price'),
          'description' => $request->get('description'),
          'category' => $request->get('category'),
          'discount' => $request->get('discount')
      ]);
      $dish->save();
      return "Created successfully!";
      }
      else
      {
        $dish = new Dish([
          'purchase_id' => null,
          'name' => $request->get('name'),
          'price' => $request->get('price'),
          'description' => $request->get('description'),
          'category' => $request->get('category'),
          'discount' => $request->get('discount')
      ]);
      $dish->save();
      return view('profile')->with('success', 'Dish created successfully.');
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
        return Dish::find($id);
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
      $dish = Dish::find($id);
      $dish->update($data);
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
      $dish = Dish::find($id);
      $dish->delete();
      return "Deleted successfully!";
    }
}
