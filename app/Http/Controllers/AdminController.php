<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Place;
use App\Comment;
use App\Country;
use App\City;
use App\UserRegister;

class AdminController extends Controller
{
    public function show()
    {
        $comments = Comment::all();
        $countries = Country::all();
        $places = Place::all();
        $users = User::all();
        return view('dashboard', compact('places', 'users', 'comments', 'countries'));
    }

    public function connectToNewRegister()
    {
    	return view('dashboardRegister');
    }

    public function connectToUserList()
    {
    	$users = User::orderBy('id')->get();
    	return view('dashboardUserList', compact('users'));
    }

    public function connectToDashboardProfileEdit($id)
    {
    	$user = User::find($id);
    	return view('dashboardProfileEdit', compact('user'));
    }

    public function connectToSubmitPlace()
    {
    	$users = User::all();
    	$countries = Country::all();
    	$cities = City::all();

    	return view('dashboardSubmitPlace', compact('users', 'countries', 'cities'));
    }

    public function connectToNewPlaceRequests()
    {
    	$places = Place::where('is_operative', false)->orderBy('id')->get();
    	return view('dashboardNewPlaceRequests', compact('places'));
    }

    public function connectToPlaceList()
    {
    	$places = Place::where('is_operative', true)->orderBy('id')->get();
    	return view('dashboardPlaceList', compact('places'));
    }

    public function connectToEditPlace($id)
    {
        $place = Place::find($id);
        $cities = City::all();
        $countries = Country::all();
        return view('dashboardPlaceEdit', compact('place', 'cities', 'countries'));

    }

    public function connectToStats()
    {
    	$places = Place::all();
    	$users = User::all();
    	$comments = Comment::all();
    	return view('dashboardStats', compact('places', 'users', 'comments'));
    }

    public function connectToUserHistory()
    {
    	$registry = UserRegister::orderBy('id')->get();
    	$users = User::all();
    	return view('dashboardUserRegistry', compact('registry', 'users'));
    }
}
