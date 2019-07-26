<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('content')
@include('flash-alerts')

<link href="{{ asset('css/main.css') }}" rel="stylesheet">

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
		<p><font size="6">Menu information</font><br><hr>
  		Name: {{$menu->name}}<br>
  		Precio: {{$menu->price}}<br>
  		Category at: {{$menu->category}}<br>
  		Discount at: {{$menu->discount}}<br><hr>
      <font size="5">Dishes:</font><br><hr>
      @foreach($dishes as $dish)
        @if($dish->menu_id == $menu->id)
          {{$dish->name}}<br>
        @endif
      @endforeach

      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <Form method="put" action="/dish/editMenu">
          <div class="form-group">
              <label class="control-label required" for="dish_id">Add a dish to the menu</label>
              <div class="select">
                  <select multiple="multiple" name="dish_id" class="form-control">
                    @foreach ($dishes as $dish)
                      @if ($dish->place_id == $menu->place_id)
                        <option value="{{$dish->id}}">{{$dish->name}}</option>
                      @endif
                    @endforeach
                  </select>
              </div>
          </div>

          <input name='menu_id' type="hidden" value='{{$menu->id}}'>

          <button type="submit" class="btn btn-default btn-lg btn-block">Add dish</button>
        </Form>
      </div>
      <hr>
@endsection
