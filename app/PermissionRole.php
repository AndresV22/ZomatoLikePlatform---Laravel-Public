<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_id',
        'role_id',
    ];

    /**********************   Relations   **********************/
    // A PermissionRole table belongs to a Permission
    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }

    // A permissionRoles table belogs to a Role
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
