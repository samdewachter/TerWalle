<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Event extends Model
{
	use Searchable;
	
    public function Albums() {
        return $this->belongsToMany('App\Album');
    }
}
