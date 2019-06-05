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
    // A role has many permissions
    public function permissions()
    {
        return $this->belongsToMany(permissions::class, 'permissions_roles', 'id' /*/ Roles /*/, 'id' /*/ Permissions /*/);
    }

    // A role belongs to many users
    public function users()
    {
        return $this->belongsToMany(users::class, 'roles_users', 'id' /*/ Roles /*/, 'id' /*/ Users /*/);
    }
}
