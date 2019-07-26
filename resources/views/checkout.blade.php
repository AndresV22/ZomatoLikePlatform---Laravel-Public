@extends('layouts.app')
@section('content')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><font size="6"><p class="text-center">Confirm Payment</p></font><br>
                <div class="rating-block">
                    <form action='/newPaymentMethod' method='post'>
                        <input name='user_id' type="hidden" value="{{ Auth::user() ? Auth::user()->id : '0' }}">
                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Total</label>
                           <div class="col-md-6">
                              <input id="price" name="price" class="form-control" type="text" value="{{$total}}" readonly>
                           </div>
                        </div>


                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                           <div class="col-md-6">
                              <input id="user_name" name="user_name" type="text" class="form-control"
                              value="{{ Auth::user() ? Auth::user()->name : '' }}" required>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                           <div class="col-md-6">
                              <input id="address" name="address" type="text" class="form-control"
                              value="{{ Auth::user() ? Auth::user()->address : '' }}" required>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="mail" class="col-md-4 col-form-label text-md-right">Email</label>

                           <div class="col-md-6">
                              <input id="email" name="email" type="mail" class="form-control"
                              value="{{ Auth::user() ? Auth::user()->email : '' }}" required>
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Payment Method</label>

                            <div class="col-md-6">
                              <select class="custom-select" id="paymentMethod" name="type" require>
                                 <option selected disabled>-- Select one --</option>
                                 <option value="Cash">Cash</option>
                                 <option value="Credit Card">Credit Card</option>
                                 <option value="Debit Card">Debit Card</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Card Holder Name</label>
                              <div class="col-md-6">
                                 <input id="bank" name="bank" type="text" class="form-control text-muted" value="none">
                                 <small id="emailHelp" class="form-text text-muted"><font color="white">If you are paying in cash leave this field empty.</font></small>
                              </div>
                        </div>

                        <div class="row mt-5 mb-10" >
                           <div class="col" align="right">
                              <a class="btn btn-danger" href="/" role="button">Cancel</a>
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
