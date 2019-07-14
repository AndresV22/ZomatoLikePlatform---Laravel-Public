<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TableReservation;

class TableReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tableReservation = TableReservation::all();
      return $tableReservation;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $tableReservation = new TableReservation([
          'reservation_id' => $request->get('reservation_id'),
          'table_id' => $request->get('table_id'),
      ]);

      $tableReservation->save();

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
        return TableReservation::find($id);
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
      $tableReservation = TableReservation::find($id);
      $tableReservation->update($data);
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
      $tableReservation = TableReservation::find($id);
      $tableReservation->delete();
      return "Deleted successfully!";
    }
}
