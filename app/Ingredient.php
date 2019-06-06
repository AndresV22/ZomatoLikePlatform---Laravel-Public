<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dish_id',
        'name',
        'type', 
        'category',
    ];

    /**********************   Relations   **********************/
    // An ingredient belongs to one dish
    public function dishes()
    {
        return $this->belongsTo('App\Dish');
    }
    
}
