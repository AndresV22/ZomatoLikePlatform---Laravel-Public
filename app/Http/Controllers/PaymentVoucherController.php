<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentVoucher;

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
      /*/
      Validation code here?
      /*/

      $paymentVoucher = new PaymentVoucher([
          'payment_methods_id' => $request->get('payment_methods_id'),
          'amount' => $request->get('amount'),
          'date' => $request->get('date'),
          'detail' => $request->get('detail'),
          'status' => $request->get('status'),
          'delivery' => $request->get('delivery')
      ]);

      $paymentVoucher->save();

      return "Created successfully!";
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