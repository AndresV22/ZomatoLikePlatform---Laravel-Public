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

    /**********************   Relations   **********************/
    // A reservation belongs to one user
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // A reservation has many tables
	public function tables()
    {
        return $this->belongsToMany(tables::class, 'tables_reservations', 'id' /*/ Reservations /*/, 'id' /*/ Tables /*/);
    }    
}
