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
                     <th>Quantity</th>
                     <th>Total Price</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($products as $product)
                  <tr>
                     <td>{{$product['item']['name']}}</td>
                     <td align="center">x{{$product['quantity']}}</td>
                     <td>
                        {{$product['price']}} <a href="#" class="badge badge-danger">Delete</a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            <h5>Total price: {{$totalPrice}}</h5>
            
         </div>
      </div>
   </div>
@else
@endif
@endsection

