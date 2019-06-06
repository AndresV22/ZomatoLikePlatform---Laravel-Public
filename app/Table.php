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
        'place_id',
        'capacity',
        'code',
        'taken', 
    ];

    /**********************   Relations   **********************/
    // A table belongs to one place
    public function place()
    {
    	return $this->belongsTo('App\Place');
    }

    // A table has many tableReservations models
	public function tableReservations()
    {
        return $this->hasMany('App\TableReservation');
    }    
}
