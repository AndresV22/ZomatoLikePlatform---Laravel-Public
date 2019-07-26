@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@if (Auth::guest() || Auth::user()->role_id != 1)
    <font size="7" color="white"><p class="text-center">You don't have admin privileges.</p></font>
    <font size="4" color="white"><p class="text-center">Please log in with admin credentials to continue.</p></font>
@else
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/admin/register">Create New User</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="/admin/allUsers">List All Users</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="/admin/submitPlace">Create New Place<span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="/admin/allPlaces">List All Places</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="/admin/dashboardManagePlaceRequests">Place Requests</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/statistics">Statistics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/userHistory">User History</a>
      </li>
    </ul>
  </div>
</nav>
        <div class='container'>
        <div class='row justify-content-center'>
            <div class="col-md-8 align-self-center">
                <p><font size="4"><p class="text-center">Fill the info of the new place, {{Auth::user()->name}}</p></font><br>
                <div class="rating-block">
                    <form action='/admin/submitPlace' method='post'>
                        {{csrf_field()}}
                        <input name='average_value' type="hidden" value=0>
                        <div class="row justify-content-center">

                        <div class="form-group">
                            <label for="name"><b>Name</b></label>
                            <input type="text" name="name" placeholder="Name" class="form-control" required>
                        </div>

                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                              <label class="control-label required" for="place_id"><b>Choose an owner</b></label>
                             <div class="select">
                                <select multiple="multiple" name="user_id" class="form-control">
                                 @foreach ($users as $user)
                                    @if (($user->id != 0) && ($user->role_id == 3))
                                     <option value="{{$user->id}}">{{$user->name}}   |   {{$user->email}}</option>
                                    @endif
                                  @endforeach
                                </select>
                              </div>
                         </div>
                     </div>
                 </div>
                        <div class="form-group">
                             <label for="address"><b>Address</b></label>
                             <input type="text" name="address" placeholder="Address" class="form-control" required>
                        </div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="opening_time" class="control-label"><b>Opening time:</b></label>
								<input type="time" data-time-format="hh:mm:ss" name="opening_time" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label for="closing_time" class="control-label"><b>Closing time:</b></label>
								<input type="time" data-time-format="hh:mm:ss" name="closing_time" class="form-control" required>
							</div>
						</div>
                        <div class="form-group">
                            <label for="avatar"><b>Avatar</b></label>
                            <input type="text" name="avatar" placeholder="Avatar" class="form-control" required>
                        </div>
                        <div class="form-group mr-2">
                            <label for="cityList"><b>City</b></label>
                            <select name="city_id" id="cityList" class="form-control" required>
                                <option value="None"> Select a city... </option>
                                @foreach ($cities as $city)
                                        <option value="{{$city->id}}"> {{$city->name}} </option>
                                @endforeach
                               </select>
                        </div> 

                        <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="group">
                            
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <button type="submit" class="btn btn-default">Submit New Place</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endif
@endsection