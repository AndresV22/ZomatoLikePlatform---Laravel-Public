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
		$q = Input::get('query');
		$place = DB::table('places')
		->join('menus', 'menus.place_id', '=', 'places.id')
		->join('cities', 'places.city_id', '=', 'cities.id')
		->join('countries', 'cities.country_id', '=', 'countries.id')
		->select('places.id', 'countries.name', 'cities.name', 'places.name', 'places.address', 'menus.category', 'places.average_value')
		->where('places.is_operative')
		->where('countries.name', 'LIKE', '%'.$q.'%')
		->orWhere('cities.name', 'LIKE', '%'.$q.'%')
		->orWhere('places.name', 'LIKE', '%'.$q.'%')
		->orWhere('address', 'LIKE', '%'.$q.'%')
		->orWhere('category', 'LIKE', '%'.$q.'%')
		->orWhere('average_value', 'LIKE', '%'.$q.'%')
		->get();
		if (count ($place) > 0)
			return view('welcome')->withDetails($place)->withQuery($q);
		else
			return redirect('/')->with('error', 'No places found.');
	}
}
