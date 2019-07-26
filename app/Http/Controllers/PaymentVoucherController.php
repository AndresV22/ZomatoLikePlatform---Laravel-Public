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
      $items  = Session::get('cart');
      $menu_id = null;
      
      foreach($items->items as $item){
          if(array_key_exists("menu_id", $item)){
            $menu_id = $item->place_id;
          }
      }

      if($menu_id != null){
        $menu = Menu::find($menu_id);
        $place_id = $menu->place_id;
      }


      foreach($items- as $item){
        if(array_key_exists("place_id", $item)){
          $place_id = $item->place_id;
        }
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
      return "Created successfully!";
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