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
      <li class="nav-item active">
        <a class="nav-link" href="/admin/userHistory">User History<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
        <h2>User History</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($registry as $entry)
        <tr>
            <td>{{$entry->id}}</td>

            @foreach ($users as $user)
                 @if ($entry->user_id == $user->id)
                 <td> {{$user->name}} </td>
                 @endif
            @endforeach
            <td> {{$entry->actions}} </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>




@endif
@endsection