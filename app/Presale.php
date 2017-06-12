<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presale extends Model
{
    public function Event()
    {
    	return $this->belongsTo('App\Event');
    }

    public function Tickets()
    {
    	return $this->hasMany('App\Ticket');
    }
}
