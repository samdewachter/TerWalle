<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPhoto extends Model
{
    public function Album() {
    	return $this->belongsTo('App\Album');
    }
}
