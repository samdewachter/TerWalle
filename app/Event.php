<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function Albums() {
        return $this->belongsToMany('App\Album');
    }
}
