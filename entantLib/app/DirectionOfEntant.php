<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectionOfEntant extends Model
{
    protected $table = 'directionOfEntant';
    protected $guarded = [];

    return $this->belongsTo('App\Entant', 'entant_id', 'entant_id');
}
