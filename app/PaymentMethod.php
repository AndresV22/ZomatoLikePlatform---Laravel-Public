<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type',
        'bank', 
    ];

    /**********************   Relations   **********************/
    // A payment method belongs to one user
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // A payment method generates many payment vouchers
    public function paymentVouchers()
    {
    	return $this->hasMany('App\PaymentVoucher');
    }
}
