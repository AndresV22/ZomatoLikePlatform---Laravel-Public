@extends('layouts.app')
@section('content')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><font size="6"><p class="text-center">Payment Data</p></font><br>
                <div class="rating-block">
                    <form action='/newPaymentVoucher' method='post'>
                        {{csrf_field()}}
                        <input name='payment_method_id' type="hidden" value="{{ $pay['id'] }}">
                        <input name='date' type="hidden" value="2019-07-26">
                        <input name='detail' type="hidden" value="{{$detail}}">
                        <input name='status' type="hidden" value="0">
                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Total</label>
                           <div class="col-md-6">
                              <input id="price" name="amount" class="form-control" type="text" value="{{$price}}" readonly>
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
                           <label for="mail" class="col-md-4 col-form-label text-md-right">Email</label>

                           <div class="col-md-6">
                              <input id="email" name="email" type="mail" class="form-control"value="{{$user_email}}" readonly>
                           </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Payment Method</label>
                            <div class="col-md-6">
                              <input id="type" name="type" class="form-control" type="text" value="{{$pay['type']}}" readonly>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Card Holder Name</label>
                           <div class="col-md-6">
                              <input id="bank" name="bank" type="text" class="form-control" value="{{$pay['bank']}}" readonly>
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Delivery</label>

                            <div class="col-md-6">
                              <select class="custom-select" id="paymentMethod" name="delivery" require>
                                 <option selected disabled>-- Select one --</option>
                                 <option value="true">Yes</option>
                                 <option value="false">No</option>
                              </select>
                            </div>
                        </div>

                        @if($pay['type'] == 'Cash')
                        
                        
                        @elseif($pay['type'] == 'Credit Card')
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
                                 <input id="holder" name="bank" type="text" class="form-control" require>
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
                              <button class="btn btn-success" type="submit">Pay Now</button>
                           </div>          
                        </div>
                     </form>
                </div>
            </div>
    </div>
</div>
@endsection
