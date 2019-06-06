<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegister extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'actions',
    ];

    /**********************   Relations   **********************/
    // A UserRegister has one user
    public function users()
    {
    	return $this->hasOne('App\User');
    }
}
