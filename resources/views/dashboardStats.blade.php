@extends('layouts.app')
@section('content')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
<link href="{{ asset('css/stats.css') }}" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->
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
	  <li class="nav-item">
        <a class="nav-link" href="/admin/allPlaces">List All Places</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="/admin/dashboardManagePlaceRequests">Place Requests</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/admin/statistics">Statistics<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/userHistory">User History</a>
      </li>
    </ul>
  </div>
</nav>
<h2>Statistics</h2>
<div class="container">
  <div class="row">
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded">Total Users</div>
          <div class="circle-tile-number text-faded ">{{$users->count()}}</div>
        </div>
      </div>
    </div>
     
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading purple"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content purple">
          <div class="circle-tile-description text-faded"> Admins </div>
          <div class="circle-tile-number text-faded ">{{$users->where('role_id', '=', 1)->count()}}</div>
        </div>
      </div>
    </div> 

    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading green"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content green">
          <div class="circle-tile-description text-faded"> Users </div>
          <div class="circle-tile-number text-faded ">{{$users->where('role_id', '=', 2)->count()}}</div>
        </div>
      </div>
    </div> 

    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content blue">
          <div class="circle-tile-description text-faded"> Managers</div>
          <div class="circle-tile-number text-faded ">{{$users->where('role_id', '=', 3)->count()}}</div>
        </div>
      </div>
    </div> 
  </div>



  <div class="row">
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded">Total Places</div>
          <div class="circle-tile-number text-faded ">{{$places->count()}}</div>
        </div>
      </div>
    </div>
     
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading purple"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content purple">
          <div class="circle-tile-description text-faded"> Operative places </div>
          <div class="circle-tile-number text-faded ">{{$places->where('is_operative', '=', true)->count()}}</div>
        </div>
      </div>
    </div> 

    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading green"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content green">
          <div class="circle-tile-description text-faded"> Non operative places </div>
          <div class="circle-tile-number text-faded ">{{$places->where('is_operative', '=', false)->count()}}</div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded">Total Comments</div>
          <div class="circle-tile-number text-faded ">{{$comments->count()}}</div>
        </div>
      </div>
    </div>
     
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading purple"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content purple">
          <div class="circle-tile-description text-faded"> Average Score </div>
          <div class="circle-tile-number text-faded ">{{number_format($comments->avg('value'), 2, '.', '')}}</div>
        </div>
      </div>
    </div> 
  </div>



</div>  
</div>

@endif
@endsection