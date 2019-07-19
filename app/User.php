<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
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

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'last_logout_at' => 'datetime'
    ];

    // A user has many UserCities table models
    public function userCities()
    {
    return $this->hasMany('App\UserCity');
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