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
                        <li><a href="submitPlace"><i class="fa fa-angle-double-right"></i> Create new place</a></li>
                        <li><a href="admin/allPlaces"><i class="fa fa-angle-double-right"></i> List all places</a></li>
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