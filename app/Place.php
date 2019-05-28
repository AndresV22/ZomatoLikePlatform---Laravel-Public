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
    // Un local le pertenece a un usuario
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Un local tiene muchas mesas
    public function tables()
    {
        return $this->hasMany('App\Table');
    }

    // Un local tiene muchos menus
    public function menus()
    {
        return $this->hasMany('App\Menu');
    }

    // Un local tiene muchos comentarios
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

}
