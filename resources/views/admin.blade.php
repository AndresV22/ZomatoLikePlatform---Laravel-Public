<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('content')
<link href="{{ asset('css/search.css') }}" rel="stylesheet">
@if (Auth::guest() || Auth::user()->role_id != 0)
<font size="7" color="white"><p class="text-center">You don't have admin privileges.</p></font>
<font size="4" color="white"><p class="text-center">Please log in with admin credentials to continue.</p></font>
@else
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
                <p><font size="6">Statistics</font><br><hr>
                <hr>
			</div>
			<div class="col-md-4">
                <p><font size="6">Users</font><br><hr>
                <hr>
            </div>	
            <div class="col-md-4">
                <p><font size="6">Managers</font><br><hr>
                <hr>
			</div>
		</div>
	</div>
@endif
@endsection