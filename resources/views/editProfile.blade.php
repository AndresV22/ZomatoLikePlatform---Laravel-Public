<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('content')
<link href="{{ asset('css/editProfile.css') }}" rel="stylesheet">
@if (Auth::guest())
	<font size="7"><p class="text-center">You're not logged in.</p></font>
	<font size="4"><p class="text-center">Please log in to continue.</p></font>
@else
	<div class='container'>
		<div class='row justify-content-center'>
			<div class="col-md-6 align-self-center">
				<p><font size="6"><p class="text-center">Edit your profile information</p></font><br>
				<div class="rating-block">
					<form action='/profile/edit' method='post'>
						{{csrf_field()}}
    					{{method_field('patch')}}
    					<div class="form-group">
        					<label for="name" class="control-label"><b>Name:</b></label>
        					<input type="text" name="name" maxlength="20" placeholder="Please enter your name here" class="form-control" value="{{ Auth::user()->name }}"/>
    					</div>
    					<div class="form-group">
        					<label for="email" class="control-label"><b>Email:</b></label>
        					<input type="text" name="email" placeholder="Please enter your email here" class="form-control" value="{{ Auth::user()->email }}"/>
						</div>
    					<div class="form-group">
        					<label for="phone_number" class="control-label"><b>Phone:</b></label>
        					<input type="text" name="phone_number" placeholder="Please enter your phone here" class="form-control" value="{{ Auth::user()->phone_number }}"/>
    					</div>
    					<div class="form-group">
        					<label for="address" class="control-label"><b>Address:</b></label>
        					<input type="text" name="address" placeholder="Please enter your address here" class="form-control" value="{{ Auth::user()->address }}"/>
    					</div>
    					<div class="form-group">
        					<label for="avatar" class="control-label"><b>Avatar:</b></label>
        					<input type="text" name="avatar" placeholder="Please enter your avatar link here" class="form-control" value="{{ Auth::user()->avatar }}"/>
    					</div>
    					<div class="form-group">
        					<button type="submit" class="btn btn-default"> Submit </button>
    					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endif

@endsection