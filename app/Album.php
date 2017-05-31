<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function Events() {
        return $this->belongsToMany('App\Event');
    }

    public function Photos() {
    	return $this->hasMany('App\EventPhoto');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($album) { // before delete() method call this
             $album->photos()->delete();
        });
    }
}
