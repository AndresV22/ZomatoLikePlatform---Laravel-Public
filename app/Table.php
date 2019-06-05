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

    /**********************   Relations   **********************/
    // A table belongs to one place
    public function place()
    {
    	return $this->belongsTo('App\Place');
    }

    // A table belongs to many reservations
	public function reservations()
    {
        return $this->belongsToMany(reservations::class, 'tables_reservations', 'id' /*/ Tables /*/, 'id' /*/ Reservations /*/);
    }    
}
