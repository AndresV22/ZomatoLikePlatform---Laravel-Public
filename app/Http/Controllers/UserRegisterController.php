<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRegister;

class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userRegister = UserRegister::all();
      return $userRegister;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $userRegister = new UserRegister([
          'user_id' => $request->get('user_id'),
          'actions' => $request->get('actions')
      ]);
      $userRegister->save();
      return $userRegister;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return UserRegister::find($id);
    }
}
