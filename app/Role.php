<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description', 
    ];

    /**********************   Relations   **********************/
    // A role has many permissions
    public function permits()
    {
    	return $this->belongsToMany('App\Permission');
    }

    // A role belongs to many users
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
