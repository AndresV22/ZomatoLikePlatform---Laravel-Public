<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'user_id',
    ];

    /**********************   Relations   **********************/
    // A UserRol intermediate model belongs to a Role
     public function role()
     {
     	return $this->belongsTo('App\Roll');
     }

     // A UserRol intermediate model belongs to a User
     public function user()
     {
     	return $this->belongsTo('App\User');
     }
}
