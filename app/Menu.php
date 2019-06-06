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
        'places_id',
        'purchases_id',
        'price', 
        'discount',
        'category',
    ];

    /**********************   Relations   **********************/
    // A menu belongs to one place
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    // A menu belongs to one purchase
    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }

    // A menu has many dishes
    public function menuDishes()
    {
        return $this->hasMany('App\MenuDish');
    }
}
