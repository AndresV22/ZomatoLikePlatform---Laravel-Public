<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentMethod;

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
      $paymentMethod = new PaymentMethod([
          'users_id' => $request->get('users_id'),
          'type' => $request->get('type'),
          'bank' => $request->get('bank')
      ]);

      $paymentMethod->save();

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
}
