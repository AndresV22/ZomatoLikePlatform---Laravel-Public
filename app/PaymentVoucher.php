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
        'amount',
        'date',
        'detail'
        'status',
        'delivery', 
    ];

    /**********************   Relaciones   **********************/
    public function paymentMethod()
    {
    	return $this->belongsTo('App\PaymentMethod');
    }

    // A un comporbante de pago le pertenece una compra
    public function purchase()
    {
        return $this->hasOne('App\Purchase');
    }
}
