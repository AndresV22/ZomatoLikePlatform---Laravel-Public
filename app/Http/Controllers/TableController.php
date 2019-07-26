<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use App\Place;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $table = Table::all();
      return $table;
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
      if ($possible_place != null)
      {
        $table = new Table([
          'place_id' => $request->get('place_id'),
          'capacity' => $request->get('capacity'),
          'code' => $request->get('code'),
          'taken' => $request->get('taken')
        ]);
        $table->save();
        return "Created successfully!";
      }
      else
      {
          return "Could not create new table.";
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
        return Table::find($id);
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
      $table = Table::find($id);
      $table->update($data);
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
      $table = Table::find($id);
      $table->delete();
      return "Deleted successfully!";
    }

    public function addTable(Request $request){
      $place => Place::find($request->get('place_id')),
      $table = new Table([
        'place_id' => $place->get('id'),
        'capacity' => $request->get('capacity'),
        'code' => $request->get('code'),
        'taken' => false,
      ]);
      $table->save();
      return back()->with('success', 'Table added successfully.');
    }
}
