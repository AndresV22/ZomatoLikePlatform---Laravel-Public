@extends('layouts.app')
@section('content')
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