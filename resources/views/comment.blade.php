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
	<font size="7"><p class="text-center">You cannot comment.</p></font>
	<font size="4"><p class="text-center">Please log in to continue.</p></font>
@else
	<div class='container'>
		<div class='row justify-content-center'>
			<div class="col-md-6 align-self-center">
				<p><font size="4"><p class="text-center">Comment about {{$place->name}}</p></font><br>
				<div class="rating-block">
					<form action='comment' method='post'>
						{{csrf_field()}}
						<input name='user_id' type="hidden" value='{{Auth::user()->id}}'>
						<input name='place_id' type="hidden" value='{{$place->id}}'>
						<input name='value' type="hidden" value=0>
						<div class="form-group">
							<textarea name='content' maxlength="180" class="form-control" id="content" required autocomplete="role_id" rows="3"></textarea>
						</div>
						<div class="btn-toolbar justify-content-center" role="toolbar" aria-label="group">
  							<div class="btn-group mr-2" role="group" aria-label="First group">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="value" id="inlineRadio1" value=0>
									<label class="form-check-label" for="inlineRadio1">0</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="value" id="inlineRadio2" value=1>
									<label class="form-check-label" for="inlineRadio2">1</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="value" id="inlineRadio1" value=2>
									<label class="form-check-label" for="inlineRadio1">2</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="value" id="inlineRadio2" value=3>
									<label class="form-check-label" for="inlineRadio2">3</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="value" id="inlineRadio1" value=4>
									<label class="form-check-label" for="inlineRadio1">4</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="value" id="inlineRadio2" value=5>
									<label class="form-check-label" for="inlineRadio2">5</label>
								</div>
							</div>
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