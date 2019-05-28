<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 
        'discount',
        'category',
    ];

    /**********************   Relaciones   **********************/
    // Un menu pertenece a un local
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    // Un menu pertenece a una compra
    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }

    // Un menu tiene muchos platos
    public function dishes()
    {
        return $this->belongsToMany('App\Dish');
    }
}
