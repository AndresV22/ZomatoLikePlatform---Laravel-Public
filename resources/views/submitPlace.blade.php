<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('content')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@if (Auth::guest() || Auth::user()-> role_id != 3)
	<font size="7"><p class="text-center">You cannot submit places.</p></font>
	<font size="4"><p class="text-center">Please log in to continue.</p></font>
@else
	<div class='container'>
		<div class='row justify-content-center'>
			<div class="col-md-6 align-self-center">
				<p><font size="4"><p class="text-center">Fill the info of your new place, {{Auth::user()->name}}</p></font><br>
				<div class="rating-block">
					<form action='newPlace' method='post'>
						{{csrf_field()}}
						<input name='user_id' type="hidden" value='{{Auth::user()->id}}'>
						<input name='average_value' type="hidden" value=0>
						<input name='is_operative' type='hidden' value=false>
						<div class="form-group">
							<label for="name"><b>Name</b></label>
							<input type="text" name="name" placeholder="Name" class="form-control" required>
						</div>
						<div class="form-group">
							 <label for="address"><b>Address</b></label>
							 <input type="text" name="address" placeholder="Address" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="opening_time"><b>Opening Time</b></label>
							<input type="text" name="opening_time" placeholder="Opening Time" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="closing_time"><b>Closing Time</b></label>
							<input type="text" name="closing_time" placeholder="Closing Time" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="avatar"><b>Avatar</b></label>
							<input type="text" name="avatar" placeholder="Avatar" class="form-control" required>
						</div>
						<div class="form-group mr-2">
							<label for="countryList"><b>Country</b></label>
							<select name="country" id="countryList" class="form-control" required>
								<option value="None"> Select a country... </option>
								@foreach ($countries as $country)
										<option value="{{$country->name}}"> {{$country->name}} </option>
								@endforeach
							</select>
						</div>
						<div class="form-group mr-2">
							<label for="cityList"><b>City</b></label>
							<select name="city" id="cityList" class="form-control" required>
								<option value="None"> Select a city... </option>
								@foreach ($cities as $city)
										<option value="{{$city->name}}"> {{$city->name}} </option>
								@endforeach
							</select>
						</div> 
						<div class="btn-toolbar justify-content-center" role="toolbar" aria-label="group">
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<button type="submit" class="btn btn-default">Submit New Place</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endif

@endsection