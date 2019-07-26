@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@if (Auth::guest() || Auth::user()->role_id != 1)
    <font size="7" color="white"><p class="text-center">You don't have admin privileges.</p></font>
    <font size="4" color="white"><p class="text-center">Please log in with admin credentials to continue.</p></font>
@else
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
<div class="contained-fluid">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> Users <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="/admin/register"><i class="fa fa-angle-double-right"></i> Create new user</a></li>
                        <li><a href="/admin/allUsers"><i class="fa fa-angle-double-right"></i> List all users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  Places <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="/admin/submitPlace"><i class="fa fa-angle-double-right"></i> Create new place</a></li>
                        <li><a href="/admin/allPlaces"><i class="fa fa-angle-double-right"></i> List all places</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/admin/dashboardManagePlaceRequests"><i class="fa fa-fw fa-user-plus"></i> New place requests</a>
                </li>
                <li>
                    <a href="statistics"><i class="fa fa-fw fa-paper-plane-o"></i> Statistics</a>
                </li>
                <li>
                    <a href="userHistory"><i class="fa fa-fw fa-paper-plane-o"></i> User History</a>
                </li>
            </ul>
        </div>

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
                        <div class="form-group">
                            <label for="opening_time"><b>Opening Time</b></label>
                            <input type="text" name="opening_time" placeholder="Opening Time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="closing_time"><b>Closing Time</b></label>
                            <input type="text" name="closing_time" placeholder="Closing Time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="avatar"><b>Avatar</b></label>
                            <input type="text" name="avatar" placeholder="Avatar" class="form-control" required>
                        </div>
                        <div class="form-group mr-2">
                            <label for="countryList"><b>Country</b></label>
                            <select name="country_id" id="countryList" class="form-control" required>
                                <option value="None"> Select a country... </option>
                                @foreach ($countries as $country)
                                        <option value="{{$country->id}}"> {{$country->name}} </option>
                                @endforeach
                            </select>
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