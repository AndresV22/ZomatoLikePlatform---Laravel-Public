<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('content')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@if (Auth::guest())
	<font size="7"><p class="text-center">You're not logged in.</p></font>
	<font size="4"><p class="text-center">Please log in to continue.</p></font>
@else
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				@if (Auth::user()->role_id == 2)
					<p><font size="6">User Profile</font><br><hr>
				@elseif (Auth::user()->role_id == 3)
					<p><font size="6">Manager Profile</font><br><hr>
				@endif
				<img src="{{Auth::user()->avatar}}" class="img-responsive img-thumbnail"><hr>
				Name: {{Auth::user()->name}}<br>
				Phone: {{Auth::user()->phone_number}}<br>
				Address: {{Auth::user()->address}}<br>
				Mail: {{Auth::user()->email}}<br></p>
				<Form method="get" action="{{"profile/edit"}}">
					<button type="submit" class="btn btn-default btn-lg btn-block">Edit Profile</button>
				</Form><hr>
			</div>
			<div class="col-md-4">
				@if (Auth::user()->role_id == 2)
				<p><font size="6">Comments</font><br><hr>
				@if ($comments->where('user_id', Auth::user()->id)->count() == 0)
				You have no comments.
				@else
				@foreach($comments as $comment)
				@if($comment->user_id == Auth::user()->id)
				@foreach($places as $place)
				@if($comment->place_id == $place->id)
				<div class="head">
					<small><strong>Comment in {{$place->name}}</strong> - {{$comment->created_at}}  - {{$comment->value}}/5</small>
					<p>{{$comment->content}}</p>
				</div>
				@endif
				@endforeach
				@endif
				@endforeach
				@endif
				@elseif (Auth::user()->role_id == 3)
				<p><font size="6">Places</font><br><hr>
				@foreach($places as $place)
				@if($place->user_id == Auth::user()->id)
				{{$place->name}}<br>
				@endif
				@endforeach
				@endif
				<hr>
			</div>
			<div class="col-md-4">
				<p><font size="6">Order History</font><br><hr>
				@if ($orders->where('user_id', Auth::user()->id)->count() == 0)
				You haven't made any orders.
				@else
				@foreach ($orders as $order)
				@if (Auth::user()->id == $order->user_id)
				<small>
					@if ($order->delivery)
					<strong>Delivery</strong>
					@else
					<strong>Retail</strong>
					@endif
					- {{$order->name}} (ID Number: {{$order->id}})</small>
					<p>${{$order->amount}} - Status:
					@if ($order->status == 0)
						Cooking
					@elseif ($order->status == 1)
						Ready For Dispatch
					@elseif ($order->status == 2)
						Delivered
					@endif
					 - {{$order->detail}}</p>
				@endif
				@endforeach
				@endif
				</p>
				<hr>
				<p><font size="6">Reservation History</font><br><hr>
				@if ($reservations->where('user_id', Auth::user()->id)->count() == 0)
				You haven't made any reservations.
				@else
				@foreach ($reservations as $reservation)
				@if (Auth::user()->id == $reservation->user_id)
				<small><strong>{{$reservation->name}}</strong> - Table #{{$reservation->code}} (ID Number: {{$reservation->id}})</small>
				<p>Capacity: {{$reservation->capacity}} - {{$reservation->date}} at {{$reservation->time}}</p>
				@endif
				@endforeach
				@endif
				</p><hr>
			</div>
		</div>
	</div>
@endif
@endsection