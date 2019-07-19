<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('content')
<link href="{{ asset('css/search.css') }}" rel="stylesheet">
@if (Auth::guest() || Auth::user()->role_id != 1)
    <font size="7" color="white"><p class="text-center">You don't have admin privileges.</p></font>
    <font size="4" color="white"><p class="text-center">Please log in with admin credentials to continue.</p></font>
@else
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
                <p><font size="6">Statistics</font><br><hr>
                <strong>Number of Admins</strong>: {{$users->where('role_id', '=', 1)->count()}}<br>
                <strong>Number of Users</strong>: {{$users->where('role_id', '=', 2)->count()}}<br>
                <strong>Number of Managers</strong>: {{$users->where('role_id', '=', 3)->count()}}<br>
                <br>
                <strong>Number of Places</strong>: {{$places->count()}}<br>
                <br>
                <strong>Number of Comments</strong>: {{$comments->count()}}<br>
                <strong>Average Score</strong>: {{number_format($comments->avg('value'), 2, '.', '')}}<br>
                <hr>
                <p><font size="6">Places</font><br><hr>
                    @foreach ($places as $place)
                    <a class="white-link" href="place/{{$place->id}}"><strong>{{$place->id}}</strong> - {{$place->name}}</a>
                    <br>
                    @endforeach
                <hr>
			</div>
			<div class="col-md-4">
                <p><font size="6">Users</font><br><hr>
                    @foreach ($users as $user)
                    @if ($user->role_id == 2)
                    <strong>{{$user->id}}</strong> - {{$user->name}}<br>
                    @endif
                    @endforeach
                <hr>
            </div>	
            <div class="col-md-4">
                <p><font size="6">Admins</font><br><hr>
                @foreach ($users as $user)
                    @if ($user->role_id == 1)
                    <strong>{{$user->id}}</strong> - {{$user->name}}<br>
                    @endif
                @endforeach
                <hr>
                <p><font size="6">Managers</font><br><hr>
                @foreach ($users as $user)
                    @if ($user->role_id == 3)
                    <strong>{{$user->id}}</strong> - {{$user->name}}<br>
                    @endif
                @endforeach
                <hr>
			</div>
		</div>
	</div>
@endif
@endsection