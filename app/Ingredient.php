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
        'name',
        'type', 
        'category',
    ];

    /**********************   Relaciones   **********************/
    // Una ingrediente pertenece a un plato
    public function dishes()
    {
        return $this->belongsTo('App\Dish');
    }
    
}
