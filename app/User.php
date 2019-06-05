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
        'address'
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

    /**********************   Relations   **********************/
    // A user belongs to many cities 
    public function cities()
    {
    return $this->belongsToMany(cities::class, 'cities_users', 'id' /*/ Users /*/, 'id' /*/ Cities /*/);
    }

    // A user belongs to many roles
    public function roles()
    {
        return $this->belongsToMany(roles::class, 'roles_users', 'id' /*/ Users /*/, 'id' /*/ Roles /*/);
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