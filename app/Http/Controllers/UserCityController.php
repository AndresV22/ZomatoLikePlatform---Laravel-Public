<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserCity;

class UserCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userCity = UserCity::all();
      return $userCity;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $userCity = new UserCity([
          'cities_id' => $request->get('cities_id'),
          'users_id' => $request->get('users_id')
      ]);

      $userCity->save();

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
        return UserCity::find($id);
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
      $userCity = UserCity::find($id);
      $userCity->update($data);
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
      $userCity = UserCity::find($id);
      $userCity->delete();
      return "Deleted successfully!";
    }
}
