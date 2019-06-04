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

    /**********************   Relations   **********************/
    // A country has many cities
    public function cities()
    {
    	return $this->hasMany('App\City');
    }

}
