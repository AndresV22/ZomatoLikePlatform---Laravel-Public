<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>
@extends('layouts.app')
@section('content')
@include('flash-alerts')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
@if ($tables->count() == 0)
	<font size="7" color="white"><p class="text-center">There are no available tables.</p></font>
	<font size="4" color="white"><p class="text-center">Sorry. Please come back in another time.</p></font>
@else
	<div class='container-fluid'>
		<div class='row justify-content-center'>
			<div class="col-md-4 align-self-center">
				<p><font size="6"><p class="text-center">Make a reservation</p></font><br>
				<div class="rating-block">
					<form action='reserve' method='post'>
					@csrf
						<input name='place_name' type="hidden" value='{{$place->name}}'>
						<input name='place_id' type="hidden" value='{{$place->id}}'>
						<input name='allow' type="hidden" value='true'>
						<input name='user_id' type="hidden" value=0>
						@if(Auth::user())
							<input name='user_id' type="hidden" value='{{Auth::user()->id}}'>
							<input name='name' type="hidden" value='{{Auth::user()->name}}'>
							<input name='address' type="hidden" value='{{Auth::user()->email}}'>
						@endif
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="date" class="control-label"><b>Date:</b></label>
								<input type="date" data-date-format="dd-MM-yyyy" name="date" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label for="time" class="control-label"><b>Time:</b></label>
								<input type="time" data-time-format="hh:mm:ss" name="time"class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="tableList"><b>Available tables</b></label>
							<select name="table_id" id="tableList" class="form-control" required>
								<option value="none"> Select a table... </option>
								@foreach ($tables as $table)
									@if (!$table->taken)
										<option value="{{$table->id}}"> Table: #{{$table->code}} - Capacity: {{$table->capacity}}</option>
									@endif
								@endforeach
							</select>
						</div>
						@if (Auth::guest())
							<div class="form-group">
								<h4 class="tour-form-title">Personal information</h4>
							</div>
							<div class="form-group">
								<label for="name" class="control-label"><b>Name:</b></label>
								<input type="text" name="name" maxlength="32" placeholder="Name..." class="form-control" value=""/>
							</div>
							<div class="form-group">
								<label for="time" class="control-label"><b>Email:</b></label>
								<input type="text" name="address" maxlength="50" placeholder="Email..." class="form-control" value=""/>
							</div>
						@endif
						<div class="btn-toolbar justify-content-center" role="toolbar" aria-label="group">
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<button type="submit" class="btn btn-default">Send Reservation Request</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endif
@endsection
