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
		@if (Auth::user() && Auth::user()->role_id == 3 && $place->user_id == Auth::user()->id)
			<Form method='get'>
				<button type="submit" class="btn btn-default btn-lg btn-block">Edit Place</button>
			</Form><hr>
		@endif
		</div>
		<div class="col-md-4">
		<p><font size="6">Rating</font><br><hr>
		<div class="rating-block">
			<h4>Average user rating</h4>
			<h2 class="bold padding-bottom-7">{{$place->average_value}} <small>/ 5</small></h2>
		</div><br>
		<Form method='get' action='/place/{{$place->id}}/comment'>
			<button type="submit" class="btn btn-default btn-lg btn-block">Add Review</button>
		</Form><hr>
		<p><font size="6">Comments</font><br><hr>
		@if ($comments->count() == 0)
		No one has made a comment.
		@else
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
		@endif
		<hr>
		</div>
		<div class="col-md-4">
		<p><font size="6">Menus</font><br><hr>
		@if ($menus->count() == 0)
		There are no menus.
		@else
		@foreach ($menus as $menu)
		<strong>Menu {{$menu->category}}</strong> - ${{$menu->price}} ({{$menu->discount}}% Off)<br>
		@foreach ($dishes as $dish)
		@if ($menu->id == $dish->menu_id)
		<small>{{$dish->name}} - ${{$dish->price}} ({{$dish->discount}}% Off) - Cat. {{$dish->category}}</small><br>
		@endif
		@endforeach
		@endforeach
		@endif
		<p>
		<Form method='get'>
			<button type="submit" class="btn btn-default btn-lg btn-block">Make An Order</button>
		</Form>
		<hr>
		<p><font size="6">Tables</font><br>
		<hr>
		@if ($menus->count() == 0)
		There are no tables.
		@else
		@foreach ($tables as $table)
		Table #{{$table->code}} - Capacity: {{$table->capacity}} @if($table->taken)(TAKEN)@endif<br>
		@endforeach
		@endif
		<br>
		<p>
		<Form method='get' action='/place/{{$place->id}}/reserve'>
			<button type="submit" class="btn btn-default btn-lg btn-block">Make A Reservation</button>
		</Form>
		<hr>
		</div>
	</div>
</div>
@endsection