<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Place;
use App\Comment;
use App\Purchases;
use App\Reservation;

class SubmitCommentController extends Controller
{
	public function show($id)
	{
		$place = Place::find($id);
		$reservationsMade = Reservation::where('place_id', $id)->where('user_id', Auth::user()->id)->get();
		$ordersMade = DB::table('purchases')->join('payment_vouchers', 'payment_vouchers.id', '=', 'purchases.payment_voucher_id')->where('place_id', $id)->where('user_id', Auth::user()->id)->get();

		return view('comment', compact('place', 'ordersMade', 'reservationsMade'));
	}
}
