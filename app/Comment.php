<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'value', 
    ];

    /**********************   Relaciones   **********************/
    // Un comentario le pertenece a un usuario
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // Un comentario le pertenece a un local
    public function place()
    {
    	return $this->belongsTo('App\Place');
    }
}
