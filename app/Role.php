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

    /**********************   Relaciones   **********************/
    // Un rol tiene muchos permisos
    public function permits()
    {
    	return $this->belongsToMany('App\Permission');
    }

    // Un rol le pertenece a muchos usuarios
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
