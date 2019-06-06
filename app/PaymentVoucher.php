<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentVoucher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_method_id',
        'amount',
        'date',
        'detail'
        'status',
        'delivery', 
    ];

    /**********************   Relations   **********************/

    // A payment voucher belongs to one payment method
    public function paymentMethod()
    {
    	return $this->belongsTo('App\PaymentMethod');
    }

    // A payment method has one purchase
    public function purchase()
    {
        return $this->hasOne('App\Purchase');
    }
}
