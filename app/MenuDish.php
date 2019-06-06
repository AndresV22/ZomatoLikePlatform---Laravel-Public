<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuDish extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menus_id',
        'dishes_id',
    ];

    /**********************   Relations   **********************/
    // A MenuDish intermediate model belongs to a Menu
    public function menu()
    {
    	return $this->belongsTo('App\Menu');
    }

    // A MenuDish intermediate model belongs to a Dish
    public function dish()
    {
    	return $this->belongsTo('App\Dish');
    }
}
