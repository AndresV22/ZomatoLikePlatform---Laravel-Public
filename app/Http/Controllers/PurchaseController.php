<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        purchase = Purchase::all();
        return purchase;
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
        Validation code here
        /*/
        $purchase = new Purchase([
            'vouchers_id' => $request->get('vouchers_id'),
            'users_id' => $request->get('users_id'),
            'status' => $request->get('status')
        ]);
        $purchase->save();
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
      /*/
      Validation code here
      /*/
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
