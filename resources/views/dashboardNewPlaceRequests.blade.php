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
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.1</a></li>
                        <li><a href="admin/allPlaces"><i class="fa fa-angle-double-right"></i> List all places</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.3</a></li>
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


        <h2>New place requests</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Address</th>
              <th>Opening Time</th>
              <th>Closing Time</th>
              <th>Avatar</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($places as $place)
            <tr>
              <td>{{$place->id}}</td>
              <td>{{$place->name}}</td>
              <td>{{$place->address}}</td>
              <td>{{$place->opening_time}}</td>
              <td>{{$place->closing_time}}</td>
              <td><img src="{{$place->avatar}}" width="40" height="40" style="border-radius:60%"></td>            
              <th> 

              <div style="width:105px;">
              	<div style="float: left; width: 50px"> 
    			<form action="/admin/dashboardManagePlaceRequests/accept/{{$place->id}}" method="POST">
                    
                   		 <input type="hidden" name="_method" value="POST"> 
                    	<button type="submit" class="btn btn-link" onclick="if (!confirm('Are you sure you want to accept this place?')) { return false }"> <i class="fas fa-check"></i></button>
              	  </form>  
              	</div>

       			<div style="float: right; width: 50px"> 
               	    <form action="/admin/dashboardManagePlaceRequests/reject/{{$place->id}}" method="POST">
                    
                   		 <input type="hidden" name="_method" value="POST"> 
                    	<button type="submit" class="btn btn-link" onclick="if (!confirm('Are you sure you want to reject this place?')) { return false }"> <i class="fas fa-times"></i></button>
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