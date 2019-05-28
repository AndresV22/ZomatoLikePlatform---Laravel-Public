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
        'status',
    ];

    /**********************   Relaciones   **********************/
    // Una compra le pertenece a un usuario
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // Una compra pertenece a un comprobante de vago
    public function paymentVoucher()
    {
    	return $this->belongsTo('App\PaymentVoucher');
    } 

    // Una compra tiene  muchos platos
    public function dishes()
    {
    	return $this->hasMany('App\Dish');
    }

    // Una compra tiene muchos menus
    public function menus()
    {
    	return $this->belongsTo('App\Menu');
    }


}
