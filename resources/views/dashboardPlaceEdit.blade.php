@extends('layouts.app')
@section('content')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
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
      <li class="nav-item">
        <a class="nav-link" href="/admin/submitPlace">Create New Place</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/admin/allPlaces">List All Places<span class="sr-only">(current)</span></a>
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
            <div class="col-md-6 align-self-center">
                <p><font size="4"><p class="text-center">Fill the info of the place, {{Auth::user()->name}}</p></font><br>
                <div class="rating-block">
                    <form action='/admin/editPlace/{{$place->id}}' method='post'>
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <input name='user_id' type="hidden" value='{{Auth::user()->id}}'>
                        <input name='average_value' type="hidden" value='{{$place->average_value}}'>
                        <input name='is_operative' type='hidden' value='{{$place->is_operative}}'>

                         <div class="form-group row">
                            <label for="is_operative" class="col-md-4 col-form-label text-md-right"><b>{{ __('Status: ') }}</b></label>
                            <div class="form-check form-check-inline">
                                <input id="is_operative_true" class="form-check-input @error('is_operative') is-invalid @enderror" type="radio" name="is_operative" value=true required autocomplete="is_operative" autofocus>
                                <label class="form-check-label" for="is_operative_true">Operative</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input id="is_operative_false" class="form-check-input @error('is_operative') is-invalid @enderror" type="radio" name="is_operative" value=false required autocomplete="is_operative" autofocus>
                                <label class="form-check-label" for="is_operative_false">Non operative</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name"><b>Name</b></label>
                            <input type="text" name="name" placeholder="Name" value='{{$place->name}}' class="form-control" required>
                        </div>
                        <div class="form-group">
                             <label for="address"><b>Address</b></label>
                             <input type="text" name="address" placeholder="Address" value='{{$place->address}}' class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="opening_time"><b>Opening Time</b></label>
                            <input type="text" name="opening_time" placeholder="Opening Time" value='{{$place->opening_time}}' class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="closing_time"><b>Closing Time</b></label>
                            <input type="text" name="closing_time" placeholder="Closing Time" value='{{$place->closing_time}}' class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="avatar"><b>Avatar</b></label>
                            <input type="text" name="avatar" placeholder="Avatar" value='{{$place->avatar}}' class="form-control" required>
                        </div>
                        <div class="form-group mr-2">
                            <label for="countryList"><b>Country</b></label>
                            <select name="country" id="countryList" class="form-control" required>
                                <option value="None"> Select a country... </option>
                                @foreach ($countries as $country)
                                        <option value="{{$country->name}}"> {{$country->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mr-2">
                            <label for="cityList"><b>City</b></label>
                            <select name="city" id="cityList" class="form-control" required>
                                <option value="None"> Select a city... </option>
                                @foreach ($cities as $city)
                                        <option value="{{$city->name}}"> {{$city->name}} </option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="group">
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <button type="submit" class="btn btn-light">Submit Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endif
@endsection