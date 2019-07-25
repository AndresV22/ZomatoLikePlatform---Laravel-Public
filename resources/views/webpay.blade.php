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
                              <input id="price" name="price" class="form-control" type="text" value="{{$price}}" readonly>
                           </div>
                        </div>


                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                           <div class="col-md-6">
                              <input id="name" type="text" class="form-control" value="{{$name}}" readonly>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                           <div class="col-md-6">
                              <input id="address" type="text" class="form-control" value="{{$address}}" readonly>
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Payment Method</label>
                            <div class="col-md-6">
                              <input id="pay" class="form-control" type="text" value="{{$pyMethod}}" readonly>
                           </div>
                        </div>

                        @if($pyMethod == 'Cash')
                           

                        @elseif($pyMethod == 'Credit Card')
                           <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Card Holder Name</label>
                              <div class="col-md-6">
                                 <input id="holder" type="text" class="form-control" require>
                              </div>
                           </div>

                           <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Credit Card Number</label>
                              <div class="col-md-6">
                                 <input id="cardNumber" type="text" class="form-control" require>
                              </div>
                           </div>  

                           <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Expiration Month</label>
                              <div class="col-md-6">
                                 <input id="expirationM" type="text" class="form-control" require>
                              </div>
                           </div>

                           <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Expiration Year</label>
                              <div class="col-md-6">
                                 <input id="expirationY" type="text" class="form-control" require>
                              </div>
                           </div> 

                           <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">CVC</label>
                              <div class="col-md-6">
                                 <input id="cvc" type="text" class="form-control" require>
                              </div>
                           </div>

                        @else
                        <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Card Holder Name</label>
                              <div class="col-md-6">
                                 <input id="holder" type="text" class="form-control" require>
                              </div>
                           </div>

                           <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Document ID</label>
                              <div class="col-md-6">
                                 <input id="documentId" type="text" class="form-control" require>
                              </div>
                           </div>  

                           <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Card PinPass</label>
                              <div class="col-md-6">
                                 <input id="pinCard" type="text" class="form-control" require>
                              </div>
                           </div>
                        @endif
                        <div class="row mt-5 mb-10" >
                           <div class="col" align="right">
                              <a class="btn btn-danger" href="/" role="button">Cancel</a>
                           </div>

                           <div class="col" align="center">
                              <a class="btn btn-secondary" href="/checkout" role="button">Back</a>
                           </div>

                           <div class="col" align="left">
                              <a class="btn btn-success" href="#" role="button">Pay Now</a>
                           </div>          
                        </div>
                     </form>
                </div>
            </div>
    </div>
</div>
@endsection
