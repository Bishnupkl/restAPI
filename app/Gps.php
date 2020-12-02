<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gps extends Model
{
    protected $fillable = ['user_id', 'lat', 'lon', 'battery', 'time',
    ];

    public  function user(){
        $this->belongsTo(User::class, 'user_id');
    }
}
