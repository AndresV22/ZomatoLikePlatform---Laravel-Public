<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description', 
    ];

    /**********************   Relations   **********************/
    // A permissionRole has many permissions
    public function permissionRoles()
    {
        return $this->hasMany('App\PermissionRole');
    }

    // A role belongs to many users
    public function userRoles()
    {
        return $this->hasMany('App\UserRole');
    }
}
