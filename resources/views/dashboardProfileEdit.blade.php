@extends('layouts.app')
@section('content')
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
	  <li class="nav-item">
        <a class="nav-link" href="/admin/submitPlace">Create New Place</a>
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
			<div class="col-md-6 align-self-center">
				<p><font size="6"><p class="text-center">Edit your profile information</p></font><br>
				<div class="rating-block">
					<form action='/admin/dashboardProfileEdit/{{$user->id}}' method='post'>
						{{csrf_field()}}
    					{{method_field('patch')}}

    					<div class="form-group">
        					<label for="name" class="control-label"><b>Name:</b></label>
        					<input type="text" name="name" maxlength="20" placeholder="Please enter your name here" class="form-control" value="{{ $user->name }}"/>
    					</div>
    					<div class="form-group">
        					<label for="email" class="control-label"><b>Email:</b></label>
        					<input type="text" name="email" placeholder="Please enter your email here" class="form-control" value="{{ $user->email }}"/>
						</div>
    					<div class="form-group">
        					<label for="phone_number" class="control-label"><b>Phone:</b></label>
        					<input type="text" name="phone_number" placeholder="Please enter your phone here" class="form-control" value="{{ $user->phone_number }}"/>
    					</div>
    					<div class="form-group">
        					<label for="address" class="control-label"><b>Address:</b></label>
        					<input type="text" name="address" placeholder="Please enter your address here" class="form-control" value="{{ $user->address }}"/>
    					</div>
    					<div class="form-group">
        					<label for="avatar" class="control-label"><b>Avatar:</b></label>
        					<input type="text" name="avatar" placeholder="Please enter your avatar link here" class="form-control" value="{{ $user->avatar }}"/>
    					</div>
    					<div class="form-group">
        					<button type="submit" class="btn btn-default"> Submit </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@endsection