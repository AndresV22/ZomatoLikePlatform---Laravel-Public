<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address', 
        'opening_time',
        'closing_time',
        'average_value',
    ];

    /**********************   Relaciones   **********************/
    // Un local tiene muchos comentarios
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

}
