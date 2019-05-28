<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code', 
    ];

    /**********************   Relaciones   **********************/
    // Una ciudad pertenece a un pais
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

    // En una ciudad hay muchos usuarios
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
