<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('content')
<link href="{{ asset('css/place.css') }}" rel="stylesheet">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
		<p><font size="6">Place</font><br><hr>
		<img src="https://placeimg.com/640/640/arch" class="img-responsive img-thumbnail"><hr>
		Name: {{$place->name}}<br>
		Address: {{$place->address}}<br>
		Opens at: {{$place->opening_time}}<br>
		Closes at: {{$place->closing_time}}<br><hr>
		</div>
		<div class="col-md-4">
		<p><font size="6">Rating</font><br><hr>
		<div class="rating-block">
					<h4>Average user rating</h4>
					<h2 class="bold padding-bottom-7">{{$place->average_value}} <small>/ 5</small></h2>
				</div><hr>
		<p><font size="6">Comments</font><br><hr>
		@foreach($comments as $comment)
		<div class="head">
		@foreach($users as $user)
		@if ($comment->user_id == $user->id)
		<small><strong>Comment by {{$user->name}}</strong> - {{$comment->created_at}}  - {{$comment->value}}/5</small>
		@endif
		@endforeach
		<p>{{$comment->content}}</p>
		</div>
		@endforeach
		<hr>
		</div>
		<div class="col-md-4">
		<p><font size="6">Menu</font><br><hr>
		</div>
	</div>
</div>
@endsection