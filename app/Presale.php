<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Presale extends Model
{
	use SoftDeletes;
    use RecordsActivity;

    public function Event()
    {
    	return $this->belongsTo('App\Event');
    }

    public function Tickets()
    {
    	return $this->hasMany('App\Ticket');
    }
}
