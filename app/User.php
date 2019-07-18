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
        'phone_number',
        'address',
        'role_id',
        'avatar',
        'last_login_at',
        'last_logout_at'
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
        'last_login_at' => 'datetime',
        'last_logout_at' => 'datetime'
    ];

    /**********************   Relations   **********************/
    // A user has many UserCities table models
    public function userCities()
    {
    return $this->hasMany('App\UserCity');
    }

    // A user has one Role table models
    public function roles()
    {
        return $this->hasMany('App\Role');
    }

    // A user belongs to one UserRegister
    public function userRegister()
    {
        return $this->belongsTo('App\UserRegister');
    }

    // A user has many comments
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // A user has many reservations
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    // A user can have many places
    public function places()
    {
        return $this->hasMany('App\Place');
    }

    // A user can have many purchases
    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }

    // A user has many payment methods
    public function paymentMethods()
    {
        return $this->hasMany('App\PaymentMethod');
    }

}