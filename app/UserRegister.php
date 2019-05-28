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
        'actions',
    ];

    /**********************   Relaciones   **********************/
    // Una tabla de registro usuario tiene un usuario
    public function users()
    {
    	return $this->hasOne('App\User');
    }
}
