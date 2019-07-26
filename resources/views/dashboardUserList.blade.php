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
	  <li class="nav-item active">
        <a class="nav-link" href="/admin/allUsers">List All Users<span class="sr-only">(current)</span></a>
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
        <h2>User Dashboard</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>Avatar</th>
              <th>Role</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->phone_number}}</td>
              <td>{{$user->address}}</td>
              <td><img src="{{$user->avatar}}" width="40" height="40" style="border-radius:60%"></td>
              @if ($user->role_id == 1)
                <td>Admin</td>
              @elseif ($user->role_id == 2)
                <td>User</td>
              @elseif ($user->role_id == 3)
                 <td>Manager</td>
              @endif
              
              <th> 

                <div style="width:105px;">
    <div style="float: left; width: 50px"> 
                
                <a href="/admin/dashboardProfileEdit/{{$user->id}}"> <button class="btn"> <i class="fas fa-edit"></i> </button> </a>
        </div>
        <div style="float: right; width: 50px"> 
                <form action="/admin/dashboardProfileDelete/{{$user->id}}" method="POST">
                    
                    <input type="hidden" name="_method" value="DELETE"> 
                    <button type="submit" class="btn btn-link" onclick="if (!confirm('Are you sure you want to delete this user?')) { return false }"> <i class="fas fa-trash-alt"></i></button>
                </form>  
        </div>
    </div>
            </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection