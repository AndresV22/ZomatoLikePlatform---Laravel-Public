<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Place;
use App\User;

class PlaceRequestController extends Controller
{
    public function accept($id)
    {
    	$place = Place::find($id);
    	$user = User::find($place->user_id);

    	$newPlaceData = ([ 'is_operative' => 'true']);
    	$place->update($newPlaceData);

    	// Username
    	// Email
    	// PlaceName
    	// PlaceAddress

    	$mailParameters = ([
    		'name' => $user->name,
    		'address' => $user->email,
    		'place_name' => $place->name,
    		'place_address' => $place->address]);


    	return redirect()->route('mail.placeRequestAccepted', $mailParameters);


    }

    public function reject($id)
    {

    	$place = Place::find($id);
    	$user = User::find($place->user_id);

    	$mailParameters = ([
    		'name' => $user->name,
    		'address' => $user->email,
    		'place_name' => $place->name,
    		'place_address' => $place->address]);


    	$place->delete();

    	return redirect()->route('mail.placeRequestRejected', $mailParameters);

    }
}
