<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
    ];

    /**********************   Relations   **********************/
    // A permission belongs to many roles
    public function permissionRoles()
    {
        return $this->hasMany('App\PermissionRole');
    }
}
