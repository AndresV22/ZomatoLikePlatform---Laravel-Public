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

    /**********************   Relations   **********************/
    // A comment belongs to one user
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // A comment belongs to one place
    public function place()
    {
    	return $this->belongsTo('App\Place');
    }
}
