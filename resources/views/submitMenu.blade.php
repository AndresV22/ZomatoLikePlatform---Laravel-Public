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

@if (Auth::guest() || Auth::user()-> role_id != 3)
	<font size="7"><p class="text-center">You cannot submit menus.</p></font>
	<font size="4"><p class="text-center">Please log in to continue.</p></font>
@else
<div class="content">
<div class="container">
  <form action='submitMenu' method='post'>

      <div class="row">

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <h4 class="tour-form-title">Creating a menu</h4>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                  <label class="control-label" for="name">Name</label>
                  <div class="input-group">
                      <input name="name" type="text" placeholder="Enter a name" class="form-control" required>
                    </div>
              </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                  <label class="control-label required" for="place_id">Choose a place</label>
                  <div class="select">
                      <select multiple="multiple" name="place_id" class="form-control">
                        @foreach ($places as $place)
                          @if ($place->user_id == Auth::user()->id)
                            <option value="{{$place->id}}">{{$place->name}}</option>
													@endif
												@endforeach
                      </select>
                  </div>
              </div>
          </div>



          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                  <label class="control-label" for="price">Price</label>
                  <div class="input-group">
                      <input name="price" type="integer" placeholder="Enter a price" class="form-control" required>
                    </div>
              </div>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                  <label class="control-label" for="category">Category</label>
                  <div class="input-group">
                      <input name="category" type="text" placeholder="Write a category" class="form-control" required>
                    </div>
              </div>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                  <label class="control-label" for="discount">Discount</label>
                  <div class="input-group">
                      <input name="discount" type="integer" placeholder="Enter a discount price" class="form-control" required>
                    </div>
              </div>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <button type="submit" name="singlebutton" class="btn btn-primary">send</button>
          </div>

      </div>
      </form>

</div>
</div>
@endif
@endsection
