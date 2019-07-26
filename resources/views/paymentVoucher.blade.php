@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><font size="6"><p class="text-center">Payment Voucher</p></font><br>

            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>Product</th>
                     <th>Price</th>
                     <th>Quantity</th>
                     <th>Total</th>
                  </tr>
               </thead>
               
               <tbody>
                  @foreach($products as $product)
                  <tr>
                     <td>{{$product['item']['name']}}</td>
                     <td>$ {{$product['item']['price']}}</td>
                     <td align="center">x{{$product['quantity']}}</td>
                     <td>$ {{$product['price']}}</td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            <h5 align="right">You Pay $ {{$totalPrice}}</h5>

            <form action='newVaucher' method='post'>
						{{csrf_field()}}
						<input name='payment_voucher_id' type="hidden" value="{{$pyVoucherId}}">
						<input name='user_id' type="hidden" value="{{ Auth::user() ? Auth::user()->id : '0' }}">
						<input name='status' type='hidden' value="0">

                  <div class="col" align="center">
                     <button class="btn btn-success" type="submit">Accept</button>
                  </div>      
				</form>     
         </div>
    </div>
</div>
@endsection
