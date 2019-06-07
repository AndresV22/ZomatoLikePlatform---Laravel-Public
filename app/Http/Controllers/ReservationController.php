<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reservation = Reservation::all();
      return $reservation;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $possible_user = User::find($request->get('users_id'));
      if ($possible_user != null)
      {
        $reservation = new Reservation([
          'users_id' => $request->get('users_id'),
          'date' => $request->get('date'),
          'time' => $request->get('time'),
          'allow' => $request->get('allow')
      ]);
      $reservation->save();
      return "Created successfully!";
      }
      else
      {
        return "Could not create new reservation.";
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
        return Reservation::find($id);
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
      $reservation = Reservation::find($id);
      $reservation->update($data);
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
      $reservation = Reservation::find($id);
      $reservation->delete();
      return "Deleted successfully!";
    }
}
