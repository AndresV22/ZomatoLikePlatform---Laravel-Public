<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**********************   Relaciones   **********************/
    // Un usuario puede estar en vaias ciudades 
    public function cities()
    {
        return $this->belongsToMany('App\City');
    }

    // Un usuario tiene muchos roles
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    // Un usuario tiene un registro de usuario
    public function userRegister()
    {
        return $this->belongsTo('App\UserRegister');
    }

    //Un usuario realiza muchos comentarios
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


}
































