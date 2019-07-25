<?php

namespace App\Http\Controllers;

use App\User;
use App\Place;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	function queryResults() 
	{
		$place = DB::table('places')
		->join('menus', 'menus.place_id', '=', 'places.id')
		->join('cities', 'places.city_id', '=', 'cities.id')
		->join('countries', 'cities.country_id', '=', 'countries.id')
		->select('places.id', 'places.name', 'places.address', 'places.average_value')
		->where('places.is_operative', true)
		->where(function ($query) {
			$q = Input::get('query');
			$query->where('countries.name', 'LIKE', '%'.$q.'%')
			->orWhere('cities.name', 'LIKE', '%'.$q.'%')
			->orWhere('places.name', 'LIKE', '%'.$q.'%')
			->orWhere('address', 'LIKE', '%'.$q.'%')
			->orWhere('category', 'LIKE', '%'.$q.'%');
		})
		->orderBy('places.average_value', 'desc')
		->get();
		if (count($place) > 0)
			return view('welcome')->withDetails($place);
		else
			return redirect('/')->with('error', 'No places found.');
	}
}
