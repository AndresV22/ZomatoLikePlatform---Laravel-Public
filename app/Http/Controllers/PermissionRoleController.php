<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PermissionRole;

class PermissionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $permissionRole = PermissionRole::all();
      return $permissionRole;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $permissionRole = new PermissionRole([
          'permissions_id' => $request->get('permissions_id'),
          'roles_id' => $request->get('roles_id')
      ]);

      $permissionRole->save();

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
        return PermissionRole::find($id);
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
      $permissionRole = PermissionRole::find($id);
      $permissionRole->update($data);
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
      $permissionRole = PermissionRole::find($id);
      $permissionRole->delete();
      return "Deleted successfully!";
    }
}
