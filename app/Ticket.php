<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function User()
    {
    	return $this->belongsTo('App\User');
    }

    public function Presale(){
    	return $this->belongsTo('App\Presale');
    }
}
