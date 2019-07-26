<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentMethod;
use App\User;
use App\Cart;
use Session;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $paymentMethod = PaymentMethod::all();
      return $paymentMethod;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $possible_user = User::find($request->get('user_id'));
      if ($possible_user != null)
      {
        $paymentMethod = new PaymentMethod([
          'user_id' => $request->get('user_id'),
          'type' => $request->get('type'),
          'bank' => $request->get('bank')
        ]);
        $paymentMethod->save();
        return $paymentMethod;
      }
      else
      {
        return "Could not create new payment method.";
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PaymentMethod::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $request->all();
      $paymentMethod = PaymentMethod::find($id);
      $paymentMethod->update($data);
      return "Updated successfully!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $paymentMethod = PaymentMethod::find($id);
      $paymentMethod->delete();
      return "Deleted successfully!";
    }

    public function storeAndRedirect(Request $request)
    {
      $price = $request->get('price');
      $name = $request->get('user_name');
      $address = $request->get('address');
      $oldCart = Session::get('cart');

      $user_email = $request->get('email');

      $cart = new Cart($oldCart);
      $detail = ""; 
      
      $pay = $this->store($request);
      
      foreach($cart->items as $item){
          $detail = $item['item']['name'] . " x" . $item['quantity'] . ", " . $detail;
      }

      return view('webpay', compact('price', 'name', 'address', 'pay', 'detail', 'user_email'));
    }


}
