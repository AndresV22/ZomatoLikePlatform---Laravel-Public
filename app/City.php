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
        'country_id',
        'name',
        'code', 
    ];

    /**********************   Relations   **********************/
    // A city belongs to a country
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

    // A city has many UserCities table
    public function userCities()
    {
    return $this->hasMany(UserCity::class, 'cities_users', 'id' /*/ Cities /*/, 'id' /*/ Users /*/);
    }

}