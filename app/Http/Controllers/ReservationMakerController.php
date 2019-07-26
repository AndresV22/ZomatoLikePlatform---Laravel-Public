<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Place;
use App\Comment;
use App\Reservation;
use App\Table;
use App\TableReservation;

class ReservationMakerController extends Controller
{
    public function show($id)
    { 
        $place = Place::find($id);
        $tables = Table::where('place_id', $id)
        ->where('taken', false)
        ->get();
        return view('reservation', compact('place', 'tables'));
    }

    public function store(Request $request)
    {
      $possible_user = User::find($request->get('user_id'));
      $table = Table::find($request->get('table_id'));

      if ($possible_user != null)
      {
        $reservation = new Reservation([
          'user_id' => $request->get('user_id'),
          'place_id' => $request->get('place_id'),
          'date' => $request->get('date'),
          'time' => $request->get('time'),
          'table_code' => $table->code,
          'allow' => $request->get('allow')
        ]);

        $reservation->save();

        $newTableData = ([
          'taken' => 'true']);

        $table->update($newTableData);

        $tableReservation = new TableReservation([
          'reservation_id' => $reservation->id,
          'table_id' => $table->id
      ]);

      $tableReservation->save();

        $mailParameters = ([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'place_name' => $request->get('place_name'),
            'table_code' => $table->code,
            'date' => $request->get('date'),
            'time' => $request->get('time')
            ]);


        return redirect()->route('mail.reservationVerification', $mailParameters);
      }

      else
      {
        return back();
      }
    }
}
