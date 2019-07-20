<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Place;
use App\Comment;
use App\Reservation;

class ReservationMakerController extends Controller
{
    public function show($id)
    {
        $comments = Comment::all();
        $place = Place::find($id);
        return view('reservation', compact('place', 'comments'));
    }

    public function store(Request $request)
    {
      $possible_user = User::find($request->get('user_id'));
      if ($possible_user != null)
      {
        $reservation = new Reservation([
          'user_id' => $request->get('user_id'),
          'date' => $request->get('date'),
          'time' => $request->get('time'),
          'allow' => $request->get('allow')
        ]);

        $reservation->save();


        $parameters = ([
            'name' => $request->get('name'),
            'address' => $request->get('address')
            ]);


        return redirect()->route('mail.reservationVerification', $parameters);
      }

      else
      {
        return back();
      }
    }
}
