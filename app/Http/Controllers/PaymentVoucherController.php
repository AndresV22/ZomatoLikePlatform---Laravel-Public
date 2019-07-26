<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentVoucher;
use App\PaymentMethod;
use App\Cart;
use Session;

class PaymentVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $paymentVoucher = PaymentVoucher::all();
      return $paymentVoucher;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $possible_payment_method = PaymentMethod::find($request->get('payment_method_id'));
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $products = $cart->items;
      $totalPrice = $cart->totalPrice;

      foreach($products as $product){
        $place_id = $product['item']['place_id'];
        break;
      }

      if ($possible_payment_method != null)
      {
        $paymentVoucher = new PaymentVoucher([
          'payment_method_id' => $request->get('payment_method_id'),
          'place_id' => $place_id,
          'amount' => $request->get('amount'),
          'date' => $request->get('date'),
          'detail' => $request->get('detail'),
          'status' => $request->get('status'),
          'delivery' => $request->get('delivery')
      ]);
      $paymentVoucher->save();

      $items = Session::get('cart');
      $items->myDeleteAll();
      Session::remove('cart');
      $use_email = $request->get('email');

    
      
      $pyVoucherId = $paymentVoucher->id;
      $totalPrice = $paymentVoucher->amount;
      return view('paymentVoucher', compact('products', 'pyVoucherId', 'totalPrice'));
      }
      else
      {
        return "Could not create new payment voucher.";
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
        return PaymentVoucher::find($id);
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
      $paymentVoucher = PaymentVoucher::find($id);
      $paymentVoucher->update($data);
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
      $paymentVoucher = PaymentVoucher::find($id);
      $paymentVoucher->delete();
      return "Deleted successfully!";
    }
}