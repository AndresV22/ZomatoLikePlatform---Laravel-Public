<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
use App\Mail\OrderNotifier;
use App\Mail\ReservationNotifier;
use App\Mail\RequestApprovedNotifier;
use App\Mail\RequestRejectedNotifier;
class EmailController extends Controller
{
	public function sendOrderConfirmation(Request $request)
	{
		$user = ([
		'name' => $request->get('name'),
		'address' => $request->get('address')
		]);
		Mail::to($request->get('address'))->send(new OrderNotifier($user));
		return view('welcome');
	}

	public function sendReservationConfirmation(Request $request)
	{
		$user = ([
			'name' => $request->get('name'),
			'address' => $request->get('address')
		]);
		Mail::to($user['address'])->send(new ReservationNotifier($user));
		return back()->with('success', 'Reservation added. Please check your email for details.');
	}

	public function sendRequestApproval(Request $request)
	{
		$user = ([
			'name' => $request->get('name'),
			'address' => $request->get('address')
		]);
		Mail::to($user['address'])->send(new RequestApprovedNotifier($user));
		return back();
	}

	public function sendRequestRejection(Request $request)
	{
		$user = ([
			'name' => $request->get('name'),
			'address' => $request->get('address')
		]);
		Mail::to($user['address'])->send(new RequestRejectedNotifier($user));
		return back();
	}
}
