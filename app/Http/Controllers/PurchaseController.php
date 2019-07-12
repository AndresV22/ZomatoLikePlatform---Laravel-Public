<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\User;
use App\PaymentVoucher;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = Purchase::all();
        return $purchase;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $possible_payment_voucher = PaymentVoucher::find($request->get('payment_vouchers_id'));
        $possible_user = User::find($request->get('user_id'));
        if ($possible_payment_voucher != null && $possible_user != null)
        {
            $purchase = new Purchase([
                'payment_vouchers_id' => $request->get('payment_vouchers_id'),
                'user_id' => $request->get('user_id'),
                'status' => $request->get('status')
            ]);
            $purchase->save();
            return "Created successfully!";
        }
        else
        {
            return "Could not create new purchase.";
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
        return Purchase::find($id);
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
      $purchase = Purchase::find($id);
      $purchase->update($data);
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
      $purchase = Purchase::find($id);
      $purchase->delete();
      return "Deleted successfully!";
    }
}
