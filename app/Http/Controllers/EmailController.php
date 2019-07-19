<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
use App\Mail\OrderNotifier;
use App\Mail\ReservationNotifier;
class EmailController extends Controller
{
    public function sendOrderConfirmation(Request $request)
    {
      $user = ([
            'name' => $request->get('name'),
            'address' => $request->get('address')
            ]);

      Mail::to($request->get('address'))->send(new OrderNotifier($user));
 
      if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
      }
    }

    public function sendReservationConfirmation(Request $request)
    {
      $user = ([
            'name' => $request->get('name'),
            'address' => $request->get('address')
            ]);

      Mail::to($request->get('address'))->send(new ReservationNotifier($user));
 
      if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
      }
    }
}