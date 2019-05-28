<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
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
    // Un pais tiene muchas ciudades
    public function cities()
    {
    	return $this->hasMany('App\City');
    }

}
