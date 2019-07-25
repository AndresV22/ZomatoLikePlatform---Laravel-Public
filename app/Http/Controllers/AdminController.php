<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Place;
use App\Comment;
use App\Country;
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

    public function connectToUserHistory()
    {
    	$registry = UserRegister::orderBy('id')->get();
    	$users = User::all();
    	return view('dashboardUserRegistry', compact('registry', 'users'));
    }
}
