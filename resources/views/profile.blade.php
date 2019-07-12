<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('content')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<div class="container-profile">
<div class="row">
  	<div class="col">
	  <h1><p class="text-center">Profile</p></h1>
  	</div>
  </div>
  
  <div class="row">
    <div class="col img">
      <img src="https://www.investigacionyciencia.es/images/1499/articleImage-minimal.jpg"  alt="" class="img">
    </div>
    <div class="col-6 details">
      <blockquote>
        <h5>{{auth()->user()->name}}</h5>
        <small><cite title="Source Title">{{auth()->user()->address}}<i class="icon-map-marker"></i></cite></small>
      </blockquote>
      <p>
		{{auth()->user()->email}} <br>
      </p>
    </div>
	<div class="col-6">

	</div>
  </div>
</div>

<div class="container">
	<div class="row">
		<div class="col">
			<h1><p class="text-center">Comments</p></h1>
		</div>
  	</div>
	<hr>
	<div class="row">
	<div class="col comment">
		@foreach($comments as $comment)
		@if($comment->user_id == auth()->user()->id)
	    <div class="head">
		@foreach($places as $place)
		@if($comment->places_id == $place->id)
	        <small><strong>Comment in {{$place->name}}</strong> - {{$comment->created_at}}  - {{$comment->value}}/5</small>
		@endif
		@endforeach
		</div>
	    <p>{{$comment->content}}</p>
		@endif
		@endforeach
	</div>
	</div>
	<hr>
</div>

@endsection