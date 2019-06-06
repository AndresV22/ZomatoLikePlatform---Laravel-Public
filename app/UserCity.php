<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'user_id',
    ];

    /**********************   Relations   **********************/
    // A UserCity intermediate model belongs to a City
     public function city()
     {
     	return $this->belongsTo('App\City');
     }

     // A UserCity intermediate model belongs to a User
     public function user()
     {
     	return $this->belongsTo('App\User');
     }
}
