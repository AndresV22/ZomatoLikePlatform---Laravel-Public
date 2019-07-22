<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>


@extends('layouts.app')
@section('content')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@if (Auth::guest() || Auth::user()-> id == 2)
	<font size="7"><p class="text-center">You cannot comment.</p></font>
	<font size="4"><p class="text-center">Please log in to continue.</p></font>
@else
	<div class='container'>
		<div class='row justify-content-center'>
			<div class="col-md-10 align-self-center">
				<p><font size="4"><p class="text-center">Fill your info, {{$user->name}}</p></font><br>
				<div class="rating-block">
					<form action='comment' method='post'>
						{{csrf_field()}}
						<input name='user_id' type="hidden" value='{{Auth::user()->id}}'>
						<input name='name' type="hidden" value='{{$user->id}}'>
						<input name='value' type="hidden" value=0>
						<div class="form-group">
							<label for="name"><b>Name</b></label>
							<input type="text" placeholder="Name" name="name" required>
						</div>
						<div class="form-group">
   							 <label for="address"><b>Adress</b></label>
   							 <input type="text" placeholder="Address" name="address" required>
   							 </div>
   						<div class="form-group">
    						<label for="opening_time"><b>Opening Time</b></label>
    						<input type="text" placeholder="Opening time" name="opening_time" required>
    						</div>
						<div class="form-group">
    						<label for="closing_time"><b>Closing Time</b></label>
    						<input type="text" placeholder="Closing Time" name="closing_time" required>
    						</div>
						</div>

						<div class="btn-toolbar justify-content-center" role="toolbar" aria-label="group">
  							
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<button type="submit" class="btn btn-default">Submit Comment</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endif

@endsection