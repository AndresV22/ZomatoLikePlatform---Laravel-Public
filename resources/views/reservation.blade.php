<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>


@extends('layouts.app')
@section('content')
<link href="{{ asset('css/editProfile.css') }}" rel="stylesheet">
@if (Auth::guest() || Auth::user()-> id == 2)
	<font size="7"><p class="text-center">You cannot reserve.</p></font>
	<font size="4"><p class="text-center">Please log in to continue.</p></font>
@else
	<div class='container'>
		<div class='row justify-content-center'>
			<div class="col-md-6 align-self-center">
				<p><font size="4"><p class="text-center">Make your reservation at {{$place->name}}</p></font><br>
				<div class="rating-block">
					<form action='reserve' method='post'>
						{{csrf_field()}}
						<input name='user_id' type="hidden" value='{{Auth::user()->id}}'>
						<input name='allow' type="hidden" value='true'>
						<div class="form-group">
							<label for="date"><b>Reservation date</b></label>
							<input type="text" placeholder="Reservation date" name="date" required>
						</div>
						<div class="form-group">
   							 <label for="time"><b>Reservation time</b></label>
   							 <input type="text" placeholder="Reservation time" name="time" required>
   							 </div>
						<div class="btn-toolbar justify-content-center" role="toolbar" aria-label="group">
  							
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<button type="submit" class="btn btn-default">Submit Reservation</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endif

@endsection