@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><font size="6"><p class="text-center">Checkout</p></font><br>
                <div class="rating-block">
                    <form>
                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Total</label>
                           <div class="col-md-6">
                              <h5 align="right" class="mt-2">$ {{$total}}</h5>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                           <div class="col-md-6">
                              <input id="name" type="text" class="form-control" value="{{ Auth::user()->name }}" required>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                           <div class="col-md-6">
                              <input id="address" type="text" class="form-control" value="{{ Auth::user()->address }}" required>
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Payment Method</label>

                            <div class="col-md-6">
                              <select class="custom-select" id="inputGroupSelect01" require>
                                 <option selected disabled>-- Select one --</option>
                                 <option value="1">Cash</option>
                                 <option value="2">Credit Card</option>
                                 <option value="3">Debit Card</option>
                              </select>
                            </div>
                        </div>

                        




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-block">
                                    Buy Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
