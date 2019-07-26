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
        'purchase_id',
        'menu_id',
        'place_id',
        'name',
        'price',
        'description',
        'category',
        'discount',
    ];

    /**********************   Relations   **********************/
    // A dish belongs to one place
    public function places()
    {
        return $this->belongsTo('App\Place');
    }

    // A dish belongs to one purchase
    public function purchases()
    {
        return $this->belongsTo('App\Purchase');
    }

    // A dish belongs to one menu.
    public function menus()
    {
        return $this->belongsTo('App\Menu');
    }
}
