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
    public function dishes()
    {
        return $this->belongsToMany(dishes::class, 'menus_dishes', 'id' /*/ Menus /*/, 'id' /*/ Dishes /*/);
    }
}
