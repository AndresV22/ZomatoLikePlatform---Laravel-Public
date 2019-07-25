<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>

<!--
Notas:
	- Falta asociarlo con el controlador.
	- Falta agregar que una pe1rsona "invitado" pueda hacer una reserva. (Posible solucion: un if con el rol de invitado)
 -->

@extends('layouts.app')
@section('content')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
<link href="{{asset('css/reservation.css')}}" rel="stylesheet">

<!-- Bootsnipp -->
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb30 text-center">
				<h2>Table reservation for {{$place->name}}</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb30">
 				<div class="tour-booking-form">
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
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<h4 class="tour-form-title">To make a reservation, fill the next fields:</h4>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="form-group">
							<label class="control-label" for="date">When do you want to come?</label>
							<div class="input-group">
								<input name="date" type="text" placeholder="DD/MM/AAAA" class="form-control" required>
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="form-group">
							<label class="control-label required" for="select">Available Tables:</label>
							<div class="select">
								<select id="select" name="table-code" class="form-control">
									@foreach ($tables as $table)
										@if ($table->taken)
										@else
											<option value="{{$table->code}}"> Table: #{{$table->code}} - Capacity: {{$table->capacity}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>
					</div>
					@if (Auth::guest())
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt30">
						<h4 class="tour-form-title">Personal information</h4>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            <input id="name" type="text" placeholder="First Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label" for="email"> Email</label>
                            <input id="email" type="text" placeholder="xxxx@xxxx.xxx" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label" for="phone"> Phone</label>
                            <input id="phone" type="text" placeholder="(222) 222-2222" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label" for="textarea">Something to have in mind?</label>
                            <textarea class="form-control" id="textarea" name="textarea" rows="4" placeholder="Write Your Requirements"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button type="submit" name="singlebutton" class="btn btn-default">send</button>
                    </div>
                </div>
                </form>
        </div>
    </div>
	</div>
</div>
</div>
@endif
@endsection
