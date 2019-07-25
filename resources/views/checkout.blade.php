@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><font size="6"><p class="text-center">Checkout</p></font><br>
                <div class="rating-block">
                    <form action="/checkout/pay">
                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Total</label>
                           <div class="col-md-6">
                              <input id="price" name="price" class="form-control" type="text" value="$ {{$total}}" readonly>
                           </div>
                        </div>


                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                           <div class="col-md-6">
                              <input id="user_name" name="user_name" type="text" class="form-control" value="{{ Auth::user()->name }}" required>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                           <div class="col-md-6">
                              <input id="address" name="address" type="text" class="form-control" value="{{ Auth::user()->address }}" required>
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Payment Method</label>

                            <div class="col-md-6">
                              <select class="custom-select" onchange="this.form.submit()" id="paymentMethod" name="paymentMethod" require>
                                 <option selected disabled>-- Select one --</option>
                                 <option value="Cash">Cash</option>
                                 <option value="Credit Card">Credit Card</option>
                                 <option value="Debit Card">Debit Card</option>
                              </select>
                            </div>
                        </div>

                        <div class="row mt-5 mb-10" >
                           <div class="col" align="right">
                              <a class="btn btn-danger" href="/" role="button">Cancel</a>
                           </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
