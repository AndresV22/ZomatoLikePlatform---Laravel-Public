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
	<font size="7"><p class="text-center">You cannot comment.</p></font>
	<font size="4"><p class="text-center">Please log in to continue.</p></font>
@else
	<div class='container'>
		<div class='row justify-content-center'>
			<div class="col-md-6 align-self-center">
				<p><font size="4"><p class="text-center">Comment about {{$place->name}}</p></font><br>
				<div class="rating-block">
					<form action='/profile/edit' method='post'>
						{{csrf_field()}}
    					{{method_field('patch')}}
						<div class="form-group">
							<textarea maxlength="180" class="form-control" id="comment" rows="3"></textarea>
						</div>
						<div class="btn-toolbar justify-content-center" role="toolbar" aria-label="group">
  							<div class="btn-group mr-2" role="group" aria-label="First group">
								<button type="button" class="btn btn-default">0</button>
    							<button type="button" class="btn btn-default">1</button>
    							<button type="button" class="btn btn-default">2</button>
    							<button type="button" class="btn btn-default">3</button>
								<button type="button" class="btn btn-default">4</button>
								<button type="button" class="btn btn-default">5</button>
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