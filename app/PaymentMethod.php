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
        'type',
        'bank', 
    ];

    /**********************   Relaciones   **********************/
    // Un metodo de pago le pertenece a un usuario
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // Un metodo de pago genera muchos comprobantes de pago
    public function paymentVouchers()
    {
    	return $this->hasMany('App\PaymentVoucher');
    }
}
