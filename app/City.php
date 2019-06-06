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
        'countries_id',
        'name',
        'code', 
    ];

    /**********************   Relations   **********************/
    // A city belongs to a country
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

}