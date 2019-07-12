<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableReservation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reservation_id',
        'table_id',
    ];

    /**********************   Relations   **********************/
    // A UserRol intermediate model belongs to a Role
     public function reservation()
     {
     	return $this->belongsTo('App\Reservation');
     }

     // A UserRol intermediate model belongs to a User
     public function table()
     {
     	return $this->belongsTo('App\Table');
     }

}
