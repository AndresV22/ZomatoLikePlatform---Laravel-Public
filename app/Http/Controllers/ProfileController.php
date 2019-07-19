<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Place;
use App\PaymentVoucher;
use App\PaymentMethod;
USE App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
        $comments = Comment::all();
        $places = Place::all();
        $orders = DB::table('payment_vouchers')
        ->join('payment_methods', 'payment_vouchers.payment_method_id', '=', 'payment_methods.id')
        ->join('users', 'payment_methods.user_id', '=', 'users.id')
        ->join('places', 'payment_vouchers.place_id', '=', 'places.id')
        ->select('payment_methods.user_id', 'payment_vouchers.id', 'payment_vouchers.delivery', 'places.name', 'payment_vouchers.amount', 'payment_vouchers.status', 'payment_vouchers.detail')
        ->get();
        $reservations = DB::table('table_reservations')
        ->join('reservations', 'table_reservations.reservation_id', '=', 'reservations.id')
        ->join('tables', 'table_reservations.table_id', '=', 'tables.id')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->join('places', 'tables.place_id', '=', 'places.id')
        ->select('reservations.id', 'reservations.user_id', 'reservations.date', 'reservations.time', 'tables.capacity', 'tables.code', 'places.name')
        ->get();
        return view('profile', compact('comments', 'places', 'orders', 'reservations'));
    }
}
