<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

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
      /*/
      Validation code here?
      /*/

      //$name = $request->input('name');
      //$code = $request->input('code');

      $dish = new Dish([
          'purchases_id' => $request->get('purchases_id'),
          'name' => $request->get('name'),
          'price' => $request->get('price')
          'description' => $request->get('description')
          'category' => $request->get('category')
          'discount' => $request->get('discount')
      ]);

      $dish->save();

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
        return Dish::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      /*/
      Validation code here
      /*/

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
