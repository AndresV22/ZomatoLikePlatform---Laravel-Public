@extends('layouts.app')
@section('content')

@if(Session::has('cart'))
<div class="container">
   <div class="row justify-content-center">
      <div class ="col-md-6 align-self-center">
         <h1 align="center">My Cart</h1>
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               @foreach($products as $product)
               <tr>
                  <td>{{$product['item']['name']}}</td>
                  <td>$ {{$product['item']['price']}}</td>
                  <td align="center">x{{$product['quantity']}}</td>
                  <td>$ {{$product['price']}}</td>
                  <td>
                     <a role="button" class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash-alt"></i>
                     </a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
         <h5 align="right">You Pay $ {{$totalPrice}}</h5>
         <div align="center">
            <a class="btn btn-success btn-lg" href="/checkout" role="button">Checkout</a>
         </div>
         
      </div>
   </div>
</div>
@endif
@endsection

