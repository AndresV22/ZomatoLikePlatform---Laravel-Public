<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'opening_time',
        'closing_time',
        'average_value',
        'avatar',
    ];

    /**********************   Relations   **********************/
    // A place belongs to one user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // A place has many tables
    public function tables()
    {
        return $this->hasMany('App\Table');
    }

    // A place has many menus
    public function menus()
    {
        return $this->hasMany('App\Menu');
    }

    // A place has many comments
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    // A place has many payment vouchers
    public function payment_vouchers()
    {
        return $this->hasMany('App\PaymentVoucher');
    }

}
