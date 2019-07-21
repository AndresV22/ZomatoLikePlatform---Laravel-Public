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
        $tables = Table::where('place_id', $id)->get();
       
        return view('reservation', compact('place', 'tables'));
    }


    public function store(Request $request)
    {
      $possible_user = User::find($request->get('user_id'));
      if ($possible_user != null)
      {
        $reservation = new Reservation([
          'user_id' => $request->get('user_id'),
          'place_id' => $request->get('place_id'),
          'date' => $request->get('date'),
          'time' => $request->get('time'),
          'table_code' => $request->get('table_code'),
          'allow' => $request->get('allow')
        ]);

        $reservation->save();


        $table = Table::where('place_id', $request->get('place_id'))->get()->where('code', $request->get('table_code'))->first();

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
            'table_code' => $request->get('table_code')
            ]);


        return redirect()->route('mail.reservationVerification', $mailParameters);
      }

      else
      {
        return back();
      }
    }
}
