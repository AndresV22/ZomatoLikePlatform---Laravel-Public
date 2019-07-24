<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
use App\Country;
use App\Place;

class SubmitPlacesController extends Controller
{
    public function show()
    {
        $countries = Country::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        return view('submitPlace', compact('countries', 'cities'));
    }


    public function store(Request $request)
    {

        $possible_country = Country::where('name', $request->get('country'))->first();
        $possible_city = City::where('name', $request->get('city'))->first();
        $possible_user = User::find($request->get('user_id'));
        if ($possible_user != null && $possible_country != null && $possible_city != null)
        {
            $place = new Place([
                'user_id' => $request->get('user_id'),
                'city_id' => $possible_city->id,
                'country_id' => $possible_country->id,
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'opening_time' => $request->get('opening_time'),
                'closing_time' => $request->get('closing_time'),
                'avatar' => $request->get('avatar'),
                'is_operative' => false
            ]);
            $place->save();
            return back();
        }
        else
        {
            return back();;
        }
    }
}
