@extends('layouts.app')
@section('content')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><font size="6"><p class="text-center">Create Table</p></font><br>
                <div class="rating-block">
                    <form action='/table/submit' method='post'>
                        <input name='place_id' type="hidden" value="{{$place_id}}">
                        <input name='taken' type="hidden" value="false">


                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Capacity</label>
                           <div class="col-md-6">
                              <input id="price" name="capacity" class="form-control" type="text" value="gg" required>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Codde</label>
                           <div class="col-md-6">
                              <input id="price" name="code" class="form-control" type="text" value="gg" required>
                           </div>
                        </div>


                        <div class="row mt-5 mb-10" >
                           <div class="col" align="right">
                              <a class="btn btn-danger" href="/place/{{$place_id}}" role="button">Cancel</a>
                           </div>

                           <div class="col" align="left">
                              <button class="btn btn-success" type="submit">Confirm</button>
                           </div> 
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
