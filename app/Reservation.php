<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'time',
        'allow', 
    ];

    /**********************   Relaciones   **********************/
    // Una reserva le pertenece a un usuario
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // Una reserva tiene muchas mesas
	public function tables()
    {
    	return $this->belongsToMany('App\Table');
    }    
}
