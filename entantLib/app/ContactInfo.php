<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contactInfo';
    protected $guarded = [];

    public function entant(){
    	return $this->belongsTo('App\Entant', 'entant_id', 'entant_id');
    }

}
