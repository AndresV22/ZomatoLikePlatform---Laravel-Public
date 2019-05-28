<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price', 
        'description',
        'category',
        'discount',
    ];

    /**********************   Relaciones   **********************/
    // Un plato pertenece a un local
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    // Un plato pertenece a una compra
    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }

    // Un plato pertenece a muchos menus
    public function menus()
    {
        return $this->belongsToMany('App\Menu');
    }

    // Un plato tiene muchos ingredientes
    public function ingredients()
    {
        return $this->hasMany('App\Ingredient');
    }
}
