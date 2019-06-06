<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'payment_voucher_id',
        'status',
    ];

    /**********************   Relations   **********************/
    // A purchase belongs to one user
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // A purchase belongs to one payment voucher
    public function paymentVoucher()
    {
    	return $this->belongsTo('App\PaymentVoucher');
    } 

    // A purchase has many dishes
    public function dishes()
    {
    	return $this->hasMany('App\Dish');
    }

    // A purchase has many menus
    public function menus()
    {
    	return $this->belongsTo('App\Menu');
    }


}
