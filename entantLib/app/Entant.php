<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entant extends Model
{
    protected $table = 'entant';
    protected $guarded = [];

    public function information(){
    	return $this->hasOne('App\ContactInfo', 'entant_id', 'entant_id');
    }

    public function direction(){
    	return $this->hasMany('App\DirectionOfEntant', 'entant_id', 'entant_id');
    }
}
