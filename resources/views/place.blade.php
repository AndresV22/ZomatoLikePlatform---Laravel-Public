<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('content')
<link href="{{ asset('css/place.css') }}" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-4">
		<p><font size="6">Place</font><br><hr>
		<img src="https://thispersondoesnotexist.com/image" class="img-responsive img-thumbnail"><hr>
		Name: {{$place->name}}<br>
		</div>
		<div class="col-8">
		<p><font size="6">Comments</font><br><hr>
		@foreach($comments as $comment)
		@if($comment->place_id == $place->id)
		<div class="head">
		<small><strong>Comment in {{$place->name}}</strong> - {{$comment->created_at}}  - {{$comment->value}}/5</small>
		<p>{{$comment->content}}</p>
		</div>
		@endif
		@endforeach
		</div>
	</div>
</div>
@endsection