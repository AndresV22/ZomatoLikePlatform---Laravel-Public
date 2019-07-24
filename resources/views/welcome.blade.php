<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
@include('flash-alerts')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<div class="jumbotron">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 align-self-center">
				<font size="7" color="white"><p class="text-center">Nice food. Is that simple.</p></font>
				<font size="4" color="white"><p class="text-center">Zomato666 is the best site for finding the best food in the best places. Want some juicy empanadas de pino, a cold Antillanca beer or the tastiest completos in your area? We've got you covered.</p></font>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<font size="6" color="white"><p class="text-center">Search places by name, category, location, rating...</p></font>
			<div class="form-group">
				<form action="/search" method="POST" role="search">
					{{csrf_field()}}
					<div class="input-group mb-3">
						<input name="query" type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-outline-light" type="submit">Go</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container">
	@if(isset($details))
	<font size="6" color="white"><p class="text-center">Search Results</p></font>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Rating (Average)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($details as $place)
			<tr>
				<td>
				<form method="get" action="place/{{$place->id}}">
						<button type="submit" class="btn btn-link">{{$place->name}}</button>
				</form>
				</td>
				<td>{{$place->address}}</td>
				<td>{{$place->average_value}}/5</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>
@endsection
