<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'capacity',
        'code',
        'taken', 
    ];

    /**********************   Relaciones   **********************/
    // Una mesa le pertenece a un local
    public function place()
    {
    	return $this->belongsTo('App\Place');
    }

    // Una mesa tiene muchas reservas
	public function reservations()
    {
    	return $this->belongsToMany('App\Reservation');
    }    
}
