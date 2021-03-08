<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expedientes extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha', 'hora'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'datetime:Y-m-d',
        'hora' => 'datetime:H:i:s'
    ];
}
