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

    /**********************   Relations   **********************/
    // Una city belongs to a country
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

    // In one city there are many users
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}